<?php

$title = 'Success';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    //extract values from the $_POST array
    //Información del cliente
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $comentarios = $_POST['comentarios'];

    //Call function to insert and track if success or not
    $isSuccess = $crud->insertClients($nombre, $apellido, $telefono, $correo, $comentarios);

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