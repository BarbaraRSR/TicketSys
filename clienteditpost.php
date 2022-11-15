<?php

require_once 'db/conn.php';
//Get values from post operation
if (isset($_POST['submit'])) {
    //extract values from the $_POST array
    $cliente_id = $_POST['cliente_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $comentarios = $_POST['comentarios'];

    //Call Crud function
    $result = $crud->editClient($cliente_id, $nombre, $apellido, $telefono, $correo, $comentarios);
    //Redirect to index.php
    if ($result) {
        header("Location: clients.php");
    } else {
        //echo 'error';
        include 'includes/errormessage.php';
    }
} else {
    //echo 'error';
    include 'includes/errormessage.php';
}

