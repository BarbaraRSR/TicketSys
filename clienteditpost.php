<?php

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
        if ($_SERVER['HTTP_HOST'] == "localhost") {
            header("Location: clients.php");
        } else {
          echo '<script type="text/javascript">
          alert("Acción exitosa");
          window.location.assign("clients.php");</script>';        
        }
    } else {
        include 'includes/errormessage.php';
    }
} else {
    include 'includes/errormessage.php';
}

