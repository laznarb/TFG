<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web's Architecture</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<main>
    <body>
        <header>
            <h1>Web's Architecture</h1>
        </header>
        <div id="principal">
            <form action="genera.php" method="POST">
                <article class="global">
                    <h3>Valores globales de configuración de su aplicación</h3>
                        <label for="puerto">Indique su puerto base</label><br>
                        <input type="number" id="puerto" name="puerto"><br>
                        <label for="ruta">Indique la ruta de su código fuente (dónde se encuentra el código de su aplicación)</label><br>
                        <input type="text" id="ruta" name="ruta"><br>
                        <label for="contenedores">Indique el directorio donde trabajaran los contenedores (dónde se ejecutará el código de su aplicación ej: /var/www/html)</label><br>
                        <input type="text" id="contenedores" name="contenedores"><br>
                </article>
                <article class="php">
                    <h3>Configuración de PHP</h3>
                        <label for="version">Indique la versión que desea establecer de PHP</label><br>
                        <select name="version" id="version">
                            <option value="seleccione">--Seleccione una opción--</option>
                            <option value="8.3">8.3</option>
                            <option value="8.2">8.2</option>
                            <option value="8.1">8.1</option>
                        </select><br>
                        <label for="controlador">Indique la ruta de su controlador frontal (ej: de /var/www/html sería public/index.html)</label><br>
                        <input type="text" id="controlador" name="controlador"><br>
                </article>
                <article class="bbdd" id="bbdd">
                    <h3>Elija el tipo o tipos de bases de datos que desea</h3>
                        <label for="mysql" class="container">MySQL
                            <input type="checkbox" id="mysql" name="bbdd" value="MySQL">
                            <span class="checkmark"></span>
                        </label><br>    
                        <div id="base1"></div>
                        <label for="mariadb" class="container">MariaDB
                            <input type="checkbox" id="mariadb" name="bbdd" value="MariaDB">
                            <span class="checkmark"></span>
                        </label><br>
                        <div id="base2"></div>
                        <label for="postgres" class="container">Postgres
                            <input type="checkbox" id="postgres" name="bbdd" value="Postgres">
                            <span class="checkmark"></span>
                        </label><br>
                        <div id="base3"></div>
                </article>
                <input type="submit" name="enviar" value="Solicitar fichero">
            </form>
        </div>
    </body>
</main>
<script defer src="script.js"></script>
</html>

