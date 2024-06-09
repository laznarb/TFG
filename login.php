<?php
        if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];

            include('conexion.php');

            $sql = "SELECT id, nombre, contraseña FROM usuarios WHERE nombre = '$usuario' AND contraseña = '$contraseña'";
            $result = $conn->query($sql);

            $row = $result -> fetch_assoc();
            $id=$row['id'];
            if ($result->num_rows > 0) {
                session_start();
                $_SESSION['usuario']=$usuario;
                $_SESSION['id']=$id;
                header('Location: form.php');
            } else {
                header('Location: index.php');
            }
        }
?>