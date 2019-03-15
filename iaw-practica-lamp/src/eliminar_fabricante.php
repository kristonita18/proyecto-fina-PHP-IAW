<?php
session_start();

if ($_SESSION['logincorrecto'] != 1) {
  $_SESSION['logincorrecto'] = 0;
  header('Location: login.php');
}

include_once("config.php");


$codigo_fabricante = $_GET['codigo_fabricante'];


if(empty($codigo_fabricante) == 1){
    header('Location: panel_fabricantes.php');
    exit;
}


$query= "DELETE FROM fabricante ".
        "WHERE codigo = ? ";

    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "i", $codigo_fabricante);
    mysqli_stmt_execute($stmt);
    $comprobar = $stmt->affected_rows;
    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);


if ($comprobar == 1){
    header('Location: panel_fabricantes.php');
        
}

?>