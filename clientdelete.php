<?php
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['cliente_id'])) {
    //echo 'error';
    include 'includes/errormessage.php';
    header("Location: inicio.php");
} else {
    //Get folio values
    $cliente_id = $_GET['cliente_id'];

    //Call Delete function
    $result = $crud->deleteClient($cliente_id);
    //Redirect to list
    if ($result) {
        header("Location: clients.php");
    } else {
        include 'includes/errormessage.php';
    }
}

?>
