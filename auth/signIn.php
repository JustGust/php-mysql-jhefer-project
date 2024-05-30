<?php

session_start();
require_once('../config/connection.php');

if(isset($_POST['username']) && isset($_POST['password'])){

    $user = $_POST['username'];
    $password = $_POST['password'];

    if(empty($user)){
        header("Location:./signin.html?error=El usuario es requerido");
        exit();
    }else if(empty($password)){
        header("Location:./signin.html?error=La clave es requerida");
        exit();
    }else{
        $pass = md5($password);

        $script = "SELECT * FROM users WHERE user_name = '$user' AND password = '$pass'";
        $result = $mysqli->query($script);

        if (mysqli_num_rows($result) === 1) {
            $row = $result->fetch_assoc();
            if($row['user_name'] === $user && $row['password'] === $pass) {
                $_SESSION['myUser'] = $row['user_name'];
                $_SESSION['myName'] = $row['name'];
                $_SESSION['myIdentification'] = $row['identification'];
                $_SESSION['logged_in'] = $row['id'];
                header("Location:../home.php");
                exit();
            }else{
                header("Location:./signin.html?error=Usuario o clave incorrecta");
                exit();
            }
        }else{
            header("Location:./signin.html?error=Usuario o clave incorrecta");
            exit();
        }
    }
    mysqli_close($mysqli);
}else{
    header("Location:../index.php");
    exit();
}