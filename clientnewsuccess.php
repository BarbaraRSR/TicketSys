<?php

$title = 'NewClientSuccess';
include_once 'includes/redirect.php';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $isSuccess = $crud->insertClient($nombre, $apellido, $telefono, $correo);

    if ($isSuccess) {
        assign('clients.php');
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }
}
?>


<?php
require_once "includes/footer.php";
?>