<?php

    session_start();

    include 'conexion_be.php';

    $username = $_POST['user'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE mail='$mail' and password='$password'");
     
    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['user'] = $username;
        $_SESSION['mail'] = $mail;
        header("location: ../main.php");
        exit;
    }else{
        echo '
            <script>
                alert("Usuario no existe, por favor verifique los datos introducidos");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }
?>