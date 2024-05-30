<?php


session_start();
require_once('../config/connection.php');


if(isset($_POST)){

    $name = $_POST['name'];
    $identification = $_POST['identification'];
    $user = $_POST['username'];
    $password = $_POST['password'];

    if(empty($name)){
        header("Location:../admin/register.php?error=El nombre es requerido");
        exit();
    }else if(empty($identification)){
        header("Location:../admin/register.php?error=La identificación es requerida");
        exit();
    }else if(empty($user)){
        header("Location:../admin/register.php?error=El usuario es requerido");
        exit();
    }else if(empty($password)){
        header("Location:../admin/register.php?error=La clave es requerida");
        exit();
    }else{

        $pass = md5($password);

        $script = "INSERT INTO users (name, identification, user_name, password) VALUES ('$name', '$identification', '$user', '$pass')";


        if (mysqli_query($mysqli, $script)) {
            header("Location:../auth/signin.html?error=Registro guardado correctamente&alert=1");
            exit();
        } else {
            header("Location:../admin/register.php?error=Error al guardar el usuario ".$user. " el usuario ya existe");
            exit();
        }

        mysqli_close($mysqli);

    }
}