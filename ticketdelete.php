<?php
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['folio'])) {
    //echo 'error';
    include 'includes/errormessage.php';
    header("Location: inicio.php");
} else {
    //Get folio values
    $folio = $_GET['folio'];

    //Call Delete function
    $result = $crud->deleteTicket($folio);
    //Redirect to list
    if ($result) {
        header("Location: inicio.php");
    } else {
        include 'includes/errormessage.php';
    }
}

?>
