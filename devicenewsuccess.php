<?php

$title = 'Success';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['serie'];

$isSuccess = $crud->insertDevice($tipo, $marca, $modelo, $serie);

    if ($isSuccess) {
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }
}

?>

<?php
require_once "includes/footer.php";
?>