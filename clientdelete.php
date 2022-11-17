<?php
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['cliente_id'])) {
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
    $cliente_id = $_GET['cliente_id'];
    $result = $crud->deleteClient($cliente_id);
    if ($result) {
        //header("Location: clients.php");
        if ($_SERVER['HTTP_HOST'] == "localhost") {
            header("Location: clients.php");
        } else {
          echo '<script type="text/javascript">
          alert("Acción exitosa");
          window.location.assign("clients.php");</script>';        
        }
    } else {
        include 'includes/errormessage.php';
    }
}

?>
