<?php

require_once('../config/connection.php');


if(isset($_POST)){

    $name = $_POST['name_team'];
    $role = $_POST['role'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $img = $_POST['img_team'];


    if(empty($name)){
        header("Location:../admin/team.php?error=El nombre es requerido");
        exit();
    }else if(empty($role)){
        header("Location:../admin/team.php?error=El rol es requerido");
        exit();
    }else{

        $nameFile = generateRandomCode() . '.jpg';
        $rutaDestino = '../assets/img/team/' . $nameFile;
        move_uploaded_file($_FILES['img_team']['tmp_name'], $rutaDestino);


        $script = "INSERT INTO team (name, role, facebook, twitter, image) VALUES ('$name', '$role', '$facebook', '$twitter', '$nameFile')";

        if (mysqli_query($mysqli, $script)) {
            header("Location:../admin/team.php?error=Registro guardado correctamente&alert=1");
            exit();
        } else {
            header("Location:../admin/team.php?error=Error al guardar el registro");
            exit();
        }

        mysqli_close($mysqli);

    }

}

function generateRandomCode() {
    $min = 1000000;
    $max = 9999999;

    $randomNumber = random_int($min, $max);
    $randomCode = str_pad($randomNumber, 7, '0', STR_PAD_LEFT);

    return $randomCode;
}