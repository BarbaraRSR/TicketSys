<?php

$title = 'Success';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    //extract values from the $_POST array
    $cliente = $_POST['cliente'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $equipo = $_POST['equipo'];
    $serie = $_POST['serie'];
    $servicio = $_POST['servicio'];
    $estimado = $_POST['estimado'];
    $descripcion = $_POST['descripcion'];
    //$actualizado = $_POST['actualizado'];
    //$estatus = $_POST['estatus'];

    //Call function to insert and track if success or not
$isSuccess = $crud->insertTickets($cliente, $correo, $telefono, $equipo, $serie, $servicio, $estimado, $descripcion, /*$actualizado, $estatus*/);

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