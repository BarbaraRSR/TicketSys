<?php

include_once 'includes/redirect.php';
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $cliente_id = $_POST['cliente_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $comentarios = $_POST['comentarios'];

    $result = $crud->editClient($cliente_id, $nombre, $apellido, $telefono, $correo, $comentarios);
    if ($result) {
        //header("Location: clients.php");
        assign('clients.php');
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }
} else {
    include 'includes/errormessage.php';
}

