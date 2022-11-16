<?php
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['equipo_id'])) {
    include 'includes/errormessage.php';
    header("Location: inicio.php");
} else {
    $equipo_id = $_GET['equipo_id'];
    $result = $crud->deleteDevice($equipo_id);
    if ($result) {
        header("Location: devices.php");
    } else {
        include 'includes/errormessage.php';
    }
}

?>
