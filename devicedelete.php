<?php
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['equipo_id'])) {
    include 'includes/errormessage.php';
    //header("Location: inicio.php");
    if ($_SERVER['HTTP_HOST'] == "localhost") {
        header("Location: inicio.php");
    } else {
      echo '<script type="text/javascript">
      alert("Acción exitosa");
      window.location.assign("inicio.php");</script>';        
    }
} else {
    $equipo_id = $_GET['equipo_id'];
    $result = $crud->deleteDevice($equipo_id);
    if ($result) {
        //header("Location: devices.php");
        if ($_SERVER['HTTP_HOST'] == "localhost") {
            header("Location: devices.php");
        } else {
          echo '<script type="text/javascript">
          alert("Acción exitosa");
          window.location.assign("devices.php");</script>';        
        }
    } else {
        include 'includes/errormessage.php';
    }
}

?>
