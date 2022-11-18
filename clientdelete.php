<?php
include_once 'includes/redirect.php';
//require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['cliente_id'])) {
    include 'includes/errormessage.php';
    //header("Location: inicio.php");
    assign('inicio.php');

} else {
    $cliente_id = $_GET['cliente_id'];
    $result = $crud->deleteClient($cliente_id);
    if ($result) {
        //header("Location: clients.php");
        assign('clients.php');
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }
}

?>
