<?php

$title = 'Success';
require_once 'includes/redirect.php';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];

$isSuccess = $crud->insertDevice($tipo, $marca, $modelo);

    if ($isSuccess) {
        assign('devices.php');
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }
}

?>

<?php
require_once "includes/footer.php";
?>