<?php

require_once('../config/connection.php');


if(isset($_POST)){

    $name = $_POST['name_brands'];
    $description = $_POST['description_brands'];
    $year = $_POST['year'];
    $img = $_POST['img_brands'];
    $id = $_POST['id_brands'];
    $nameFile = $_POST['name_file'];
    

    if(empty($name)){
        header("Location:../admin/brands.php?error=El nombre es requerido");
        exit();
    }else if(empty($description)){
        header("Location:../admin/brands.php?error=La descripción es requerida");
        exit();
    }else if(empty($year)){
        header("Location:../admin/brands.php?error=El año de función es requerido");
        exit();
    }else{

        if($_FILES['img_brands']['tmp_name']!= ''){
            $nameFile = generateRandomCode() . '.jpg';
            $rutaDestino = '../assets/img/about/' . $nameFile;
            move_uploaded_file($_FILES['img_brands']['tmp_name'], $rutaDestino);
        }

      
    
        $script = "UPDATE brands SET name = '$name', year = '$year', description = '$description', image = '$nameFile' WHERE id = '$id'";

        if (mysqli_query($mysqli, $script)) {
            header("Location:../admin/brands.php?error=Registro actualizado correctamente&alert=1");
            exit();
        } else {
            header("Location:../admin/brands.php?error=Error al actualizar el registro");
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