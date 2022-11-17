<?php

include_once 'includes/redirect.php';
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $equipo_id = $_POST['equipo_id'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['serie'];

    $result = $crud->editDevice($equipo_id, $tipo, $marca, $modelo, $serie);
    if ($result) {
        //header("Location: devices.php");
        assign('devices.php');
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }
} else {
    include 'includes/errormessage.php';
}

