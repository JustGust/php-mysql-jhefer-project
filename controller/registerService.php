<?php

require_once('../config/connection.php');


if(isset($_POST)){

    $name = $_POST['name_services'];
    $description = $_POST['description_services'];


    if(empty($name)){
        header("Location:../admin/services.php?error=El nombre es requerido");
        exit();
    }else if(empty($description)){
        header("Location:../admin/services.php?error=La descripción es requerida");
        exit();
    }else{

        $script = "INSERT INTO services (name, description) VALUES ('$name', '$description')";

        if (mysqli_query($mysqli, $script)) {
            header("Location:../admin/services.php?error=Registro guardado correctamente&alert=1");
            exit();
        } else {
            header("Location:../admin/services.php?error=Error al guardar el registro");
            exit();
        }

        mysqli_close($mysqli);

    }

}