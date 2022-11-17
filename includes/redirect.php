<?php

function assign($html) {
    if ($_SERVER['HTTP_HOST'] == "localhost") {
        header("Location: ".$html);  
    } else {
      echo "<script type='text/javascript'>
      window.location.assign('$html');</script>";        
    }
}

function redirect($html) {
    $host = $_SERVER['HTTP_HOST'];
    $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $url = "http://$host$ruta/$html";
    header("Location: $url");
}

function page($html) {
    $host = $_SERVER['HTTP_HOST'];
    $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $url = "http://$host$ruta/$html";
    echo $url; 
}

?>