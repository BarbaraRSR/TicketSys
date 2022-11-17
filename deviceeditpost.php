<?php

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
        if ($_SERVER['HTTP_HOST'] == "localhost") {
            header("Location: devices.php");
        } else {
          echo '<script type="text/javascript">
          alert("Acción exitosa");
          window.location.assign("devices.php");</script>';        
        }
    } else {
        include 'includes/errormessage.php';
    }
} else {
    include 'includes/errormessage.php';
}

