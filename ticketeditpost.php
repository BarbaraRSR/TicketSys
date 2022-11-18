<?php

include_once 'includes/redirect.php';
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $folio = $_POST['folio'];
    $cliente = $_POST['cliente'];
    $equipo = $_POST['equipo'];
    $serie = $_POST['serie'];
    $servicio = $_POST['servicio'];
    $estimado = $_POST['estimado'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $estatus = $_POST['estatus'];

    $result = $crud->editTicket($folio, $cliente, $equipo, $serie, $servicio, $estimado, $descripcion, $fecha, $estatus);
    if ($result) {
        //header("Location: tickets.php");
        assign('tickets.php');
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }
} else {
    include 'includes/errormessage.php';
}