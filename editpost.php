<?php
require_once 'db/conn.php';
//Get values from post operation
if (isset($_POST['submit'])) {
    //extract values from the $_POST array
    $folio = $_POST['folio'];
    $cliente = $_POST['cliente'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $equipo = $_POST['equipo'];
    $serie = $_POST['serie'];
    $servicio = $_POST['servicio'];
    $estimado = $_POST['estimado'];
    $descripcion = $_POST['descripcion'];
    $actualizado = $_POST['actualizado'];
    $estatus = $_POST['estatus'];


    //Call Crud function
    $result = $crud->editTicket($folio, $cliente, $correo, $telefono, $equipo, $serie, $servicio, $estimado, $descripcion, $actualizado, $estatus);
    //Redirect to index.php
    if ($result) {
        header("Location: dashboard.php");
    } else {
        //echo 'error';
        include 'includes/errormessage.php';
    }
} else {
    //echo 'error';
    include 'includes/errormessage.php';
}