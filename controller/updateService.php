<?php

require_once('../config/connection.php');


if(isset($_POST)){

    $name = $_POST['name_services'];
    $description = $_POST['description_services'];
    $id = $_POST['id_services'];


    if(empty($name)){
        header("Location:../admin/services.php?error=El nombre es requerido");
        exit();
    }else if(empty($description)){
        header("Location:../admin/services.php?error=La descripción es requerida");
        exit();
    }else{

        $script = "UPDATE services SET name = '$name', description = '$description'WHERE id = '$id'";

        if (mysqli_query($mysqli, $script)) {
            header("Location:../admin/services.php?error=Registro actualizado correctamente&alert=1");
            exit();
        } else {
            header("Location:../admin/services.php?error=Error al actualizar el registro");
            exit();
        }

        mysqli_close($mysqli);

    }

}