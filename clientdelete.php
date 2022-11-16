<?php
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['cliente_id'])) {
    include 'includes/errormessage.php';
    header("Location: inicio.php");
} else {
    $cliente_id = $_GET['cliente_id'];
    $result = $crud->deleteClient($cliente_id);
    if ($result) {
        header("Location: clients.php");
    } else {
        include 'includes/errormessage.php';
    }
}

?>
