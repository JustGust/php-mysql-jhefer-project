<?php

require_once('../config/connection.php');


if(isset($_POST)){

    $name = $_POST['name_team'];
    $role = $_POST['role'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $img = $_POST['img_team'];
    $id = $_POST['id_team'];
    $nameFile = $_POST['name_file'];


    if(empty($name)){
        header("Location:../admin/team.php?error=El nombre es requerido");
        exit();
    }else if(empty($role)){
        header("Location:../admin/team.php?error=El rol es requerido");
        exit();
    }else{

        if($_FILES['img_team']['tmp_name']!= ''){
            $nameFile = generateRandomCode() . '.jpg';
            $rutaDestino = '../assets/img/team/' . $nameFile;
            move_uploaded_file($_FILES['img_team']['tmp_name'], $rutaDestino);
        }

    
        $script = "UPDATE team SET name = '$name', role = '$role', facebook = '$facebook', twitter = '$twitter', image = '$nameFile' WHERE id = '$id'";

        if (mysqli_query($mysqli, $script)) {
            header("Location:../admin/team.php?error=Registro actualizado correctamente&alert=1");
            exit();
        } else {
            header("Location:../admin/team.php?error=Error al actualizar el registro");
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