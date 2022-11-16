<?php

require_once 'db/conn.php';
//Get values from post operation
if (isset($_POST['submit'])) {
    //extract values from the $_POST array
    $folio = $_POST['folio'];
    $cliente = $_POST['cliente'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['serie'];
    $servicio = $_POST['servicio'];
    $estimado = $_POST['estimado'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $estatus = $_POST['estatus'];


    //Call Crud function
    $result = $crud->editTicket($folio, $cliente, $tipo, $marca, $modelo, $serie, $servicio, $estimado, $descripcion, $fecha, $estatus);
    //Redirect to index.php
    if ($result) {
        header("Location: inicio.php");
    } else {
        //echo 'error';
        include 'includes/errormessage.php';
    }
} else {
    //echo 'error';
    include 'includes/errormessage.php';
}