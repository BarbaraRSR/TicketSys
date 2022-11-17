<?php
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['folio'])) {
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
    $folio = $_GET['folio'];
    $result = $crud->deleteTicket($folio);
    if ($result) {
        //header("Location: inicio.php");
        if ($_SERVER['HTTP_HOST'] == "localhost") {
            header("Location: inicio.php");
        } else {
          echo '<script type="text/javascript">
          alert("Acción exitosa");
          window.location.assign("inicio.php");</script>';        
        }
    } else {
        include 'includes/errormessage.php';
    }
}

?>
