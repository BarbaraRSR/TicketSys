<?php 

include_once 'includes/redirect.php';

    if(!isset($_SESSION['userid'])){
        //header("Location: index.php");
        //assign('index.php');
        
        if ($_SERVER['HTTP_HOST'] == "localhost") {
            header("Location: index.php");
        } else {
          echo '<script type="text/javascript">
          window.location.assign("index.php");</script>';        
        }
        
    }
?>