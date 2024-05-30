<?php

require_once('../config/connection.php');


if(isset($_POST)){

    $name = $_POST['name_products'];
    $category = $_POST['category_products'];
    $description = $_POST['description_products'];
    $supplier = $_POST['name_supplier'];
    $img = $_POST['img_products'];
    $id = $_POST['id_products'];
    $nameFile = $_POST['name_file'];
    


    if(empty($name)){
        header("Location:../admin/products.php?error=El nombre es requerido");
        exit();
    }else if(empty($category)){
        header("Location:../admin/products.php?error=La categoria es requerida");
        exit();
    }else{

        if($_FILES['img_products']['tmp_name']!= ''){
            $nameFile = generateRandomCode() . '.jpg';
            $rutaDestino = '../assets/img/portfolio/' . $nameFile;
            move_uploaded_file($_FILES['img_products']['tmp_name'], $rutaDestino);
        }

    
        $script = "UPDATE products SET name = '$name', category = '$category', description = '$description', supplier = '$supplier', image = '$nameFile' WHERE id = '$id'";

        if (mysqli_query($mysqli, $script)) {
            header("Location:../admin/products.php?error=Registro actualizado correctamente&alert=1");
            exit();
        } else {
            header("Location:../admin/products.php?error=Error al actualizar el registro");
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