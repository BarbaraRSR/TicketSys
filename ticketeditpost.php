<?php

require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $folio = $_POST['folio'];
    $cliente = $_POST['cliente'];
    $equipo = $_POST['equipo'];
    $servicio = $_POST['servicio'];
    $estimado = $_POST['estimado'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $estatus = $_POST['estatus'];

    $result = $crud->editTicket($folio, $cliente, $equipo, $servicio, $estimado, $descripcion, $fecha, $estatus);
    if ($result) {
        //header("Location: tickets.php");
        if ($_SERVER['HTTP_HOST'] == "localhost") {
            header("Location: tickets.php");
        } else {
          echo '<script type="text/javascript">
          alert("Acción exitosa");
          window.location.assign("tickets.php");</script>';        
        }
    } else {
        include 'includes/errormessage.php';
    }
} else {
    include 'includes/errormessage.php';
}