const Article = document.querySelector('.bbdd');
const MySQL = document.getElementById("mysql");
const MariaDB = document.getElementById("mariadb");
const Postgres = document.getElementById("postgres");
const Base1 = document.getElementById("base1");
const Base2 = document.getElementById("base2");
const Base3 = document.getElementById("base3");

function MySQLSelected(){ 
    if (MySQL.checked){
        Base1.innerHTML = `
            <label for="version_mysql">Indique la versión que desea establecer de MySQL</label><br>
            <select name="version_mysql" id="version_mysql">
                <option value="8.0">8.0</option>
                <option value="5.7.x">5.7.x</option>
                <option value="5.6.x">5.6.x</option>
                <option value="5.5.x">5.5.x</option>
            </select><br>
            <label for='rutabase'>Indique dónde está su base de datos</label><br>
            <input type='text' id='rutabase' name='mysql_rutabase'><br>
            <label for='nombrebase'>Indique el nombre de su base de datos</label><br>
            <input type='text' id='nombrebase' name='mysql_nombrebase'><br>
            <label for='nombreuser'>Indique el nombre de su usuario</label><br>
            <input type='text' id='nombreuser' name='mysql_nombreuser'><br>
            <label for='contraUsuario'>Indique la contraseña de su usuario</label><br>
            <input type='text' id='contraUsuario' name='mysql_contraUsuario'><br>
            <label for='contraRoot'>Indique la contraseña de root</label><br>
            <input type='text' id='contraRoot' name='mysql_contraRoot'><br>`;
    } else {
        Base1.innerHTML = "";
    }
}

function MariaDBSelected(){
    if (MariaDB.checked){
        Base2.innerHTML = `
            <label for="version_mariadb">Indique la versión que desea establecer de MariaDB</label><br>
                <select name="version_mariadb" id="version_mariadb">
                    <option value="11.0.x">11.0.x</option>
                    <option value="10.11.x">10.11.x</option>
                    <option value="10.10.x">10.10.x</option>
                    <option value="10.9.x">10.9.x</option>
                    <option value="10.8.x">10.8.x</option>
                    <option value="10.7.x">10.7.x</option>
                    <option value="10.6.x">10.6.x</option>
                    <option value="10.5.x">10.5.x</option>
                    <option value="10.4.x">10.4.x</option>
            </select><br>
            <label for='rutabase'>Indique dónde está su base de datos</label><br>
            <input type='text' id='rutabase' name='mariadb_rutabase'><br>
            <label for='nombrebase'>Indique el nombre de su base de datos</label><br>
            <input type='text' id='nombrebase' name='mariadb_nombrebase'><br>
            <label for='nombreuser'>Indique el nombre de su usuario</label><br>
            <input type='text' id='nombreuser' name='mariadb_nombreuser'><br>
            <label for='contraUsuario'>Indique la contraseña de su usuario</label><br>
            <input type='text' id='contraUsuario' name='mariadb_contraUsuario'><br>
            <label for='contraRoot'>Indique la contraseña de root</label><br>
            <input type='text' id='contraRoot' name='mariadb_contraRoot'><br>`;
    } else {
        Base2.innerHTML = "";
    }
}

function PostgresSelected(){
    if (Postgres.checked){
        Base3.innerHTML = `
            <label for="version_postgres">Indique la versión que desea establecer de Postgres</label><br>
            <select name="version_postgres" id="version_postgres">
                <option value="15.x">15.x</option>
                <option value="14.x">14.x</option>
                <option value="13.x">13.x</option>
                <option value="12.x">12.x</option>
                <option value="11.x">11.x</option>
                <option value="10.x">10.x</option>
                <option value="9.6.x">9.6.x</option>
            </select><br>
            <label for='rutabase'>Indique dónde está su base de datos</label><br>
            <input type='text' id='rutabase' name='postgres_rutabase'><br>
            <label for='nombrebase'>Indique el nombre de su base de datos</label><br>
            <input type='text' id='nombrebase' name='postgres_nombrebase'><br>
            <label for='nombreuser'>Indique el nombre de su usuario</label><br>
            <input type='text' id='nombreuser' name='postgres_nombreuser'><br>
            <label for='contraUsuario'>Indique la contraseña de su usuario</label><br>
            <input type='text' id='contraUsuario' name='postgres_contraUsuario'><br>
            <label for='contraRoot'>Indique la contraseña de root</label><br>
            <input type='text' id='contraRoot' name='postgres_contraRoot'><br>`;
    } else {
        Base3.innerHTML = "";
    }
} 

MySQL.addEventListener('change', MySQLSelected);
MariaDB.addEventListener('change', MariaDBSelected);
Postgres.addEventListener('change', PostgresSelected);
