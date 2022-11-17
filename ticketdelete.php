<?php
include_once 'includes/redirect.php';
//require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['folio'])) {
    include 'includes/errormessage.php';
    //header("Location: inicio.php");
    assign('inicio.php');
} else {
    $folio = $_GET['folio'];
    $result = $crud->deleteTicket($folio);

    if ($result) {
        //header("Location: inicio.php");
        assign('tickets.php');
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }
}

?>
