<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $puerto = $_POST['puerto'];
        $versionPhp = $_POST['version'];
        $ruta = $_POST['ruta'];
        $contenedores = $_POST['contenedores'];
        $bbdd = $_POST['bbdd'];

        $services = [];

        if (in_array('MySQL', $bbdd)) {
            $services['mysql'] = [
                'image' => 'mysql:' . $_POST['version_mysql'],
                'working_dir' => "$ruta",
                'volumes' => [
                    $_POST['mysql_rutabase'] . ":/docker-entrypoint-initdb.d",
                    "mysql_data:/var/lib/mysql"
                ],
                'environment' => [
                    'MYSQL_ROOT_PASSWORD=' . $_POST['mysql_contraRoot'],
                    'MYSQL_DATABASE=' . $_POST['mysql_nombrebase'],
                    'MYSQL_USER=' . $_POST['mysql_nombreuser'],
                    'MYSQL_PASSWORD=' . $_POST['mysql_contraUsuario']
                ],
                'ports' => [
                    "$puerto:3306"
                ]
            ];
        }

        if (in_array('MariaDB', $bbdd)) {
            $services['mariadb'] = [
                'image' => 'mariadb:' . $_POST['version_mariadb'],
                'working_dir' => "$ruta",
                'volumes' => [
                    $_POST['mariadb_rutabase'] . ":$contenedores"
                ],
                'environment' => [
                    'MYSQL_ROOT_PASSWORD=' . $_POST['mariadb_contraRoot'],
                    'MYSQL_DATABASE=' . $_POST['mariadb_nombrebase'],
                    'MYSQL_USER=' . $_POST['mariadb_nombreuser'],
                    'MYSQL_PASSWORD=' . $_POST['mariadb_contraUsuario']
                ],
                'ports' => [
                    "$puerto:3306"
                ]
            ];
        }

        if (in_array('Postgres', $bbdd)) {
            $services['postgres'] = [
                'image' => 'postgres:' . $_POST['version_postgres'],
                'working_dir' => "$ruta",
                'volumes' => [
                    $_POST['postgres_rutabase'] . ":$contenedores"
                ],
                'environment' => [
                    'POSTGRES_PASSWORD=' . $_POST['postgres_contraRoot'],
                    'POSTGRES_DB=' . $_POST['postgres_nombrebase'],
                    'POSTGRES_USER=' . $_POST['postgres_nombreuser']
                ],
                'ports' => [
                    "$puerto:5432"
                ]
            ];
        }

        $services['www'] = [
            'build' => '.',
            'ports' => [
                "$puerto:80"
            ],
            'volumes' => [
                "$ruta:$contenedores",
                '/etc/apache2/apache2.conf:/etc/apache2/sites-available/000-default.conf'
            ],
            'links' => [
                "$bbdd"
            ],
            'networks' => [
                "default"
            ],
            'depends_on' => [
                "$bbdd"
            ]
            
        ];

        $services['php-fpm'] = [
            'image' => 'php:' . $versionPhp . '-fpm',
            'working_dir' => "$ruta",
            'volumes' => [
                "$ruta:$contenedores",
                "/etc/php/{$versionPhp}/fpm/conf.d/99-overrides.ini:/etc/php/{$versionPhp}/fpm/conf.d/99-overrides.ini"
            ],
            'depends_on' => [
                "$bbdd"
            ]
        ];

        $dockerCompose = "version: '3.1'\nservices:\n";
        foreach ($services as $serviceName => $serviceConfig) {
            $dockerCompose .= "  {$serviceName}:\n";
            foreach ($serviceConfig as $key => $value) {
                if (is_array($value)) {
                    $dockerCompose .= "    {$key}:\n";
                    foreach ($value as $subKey => $subValue) {
                        $dockerCompose .= "      - {$subValue}\n";
                    }
                } else {
                    $dockerCompose .= "    {$key}: '{$value}'\n";
                }
            }
        }

        header('Content-Type: application/x-yaml');
        header('Content-Disposition: attachment; filename="docker-compose.yml"');
        echo $dockerCompose;
    }
?>