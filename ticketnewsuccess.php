<?php

$title = 'Success';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    //extract values from the $_POST array
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['serie'];
    $servicio = $_POST['servicio'];
    $estimado = $_POST['estimado'];
    $descripcion = $_POST['descripcion'];
    //$fecha = $_POST['fecha'];
    //$estatus = $_POST['estatus'];

    //Call function to insert and track if success or not
$isSuccess = $crud->insertTicket($nombre, $apellido, $telefono, $correo, $tipo, $marca, $modelo, $serie, $servicio, $estimado, $descripcion, //$fecha, $estatus
);

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