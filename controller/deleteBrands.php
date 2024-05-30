<?php

require_once('../config/connection.php');

$id = $_GET['id'];
if(!empty($id)){
    $deleteQuery = $mysqli->prepare("DELETE FROM brands WHERE id = ?");
    $deleteQuery->bind_param('i', $id); 

    $deleteQuery->execute();

    if ($deleteQuery->errno) {
        echo "Error al eliminar registro: " . $deleteQuery->error;
        exit();
    } else {
        header("Location:../admin/brands.php?error=Registro eliminado correctamente&alert=1");
        exit();
    }

    $deleteQuery->close();

}else{
    header("Location:../admin/brands.php?error=Error parametro&alert=1");
    exit();
}