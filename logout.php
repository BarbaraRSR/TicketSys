<?php
include_once 'includes/session.php'?>
<?php
    session_destroy(); 
    //header('Location: index.php'); 
    if ($_SERVER['HTTP_HOST'] == "localhost") {
        header("Location: index.php");
    } else {
      echo '<script type="text/javascript">
      alert("Acción exitosa");
      window.location.assign("index.php");</script>';        
    }
?>