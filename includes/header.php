<?php
//This includes the session file. This file contains code that starts/resumes a session. 
//By having it in the header file, it will be included on every page. allowing session capability to be used on every page across the website. 
include 'includes/session.php';
include_once 'includes/redirect.php';
?>


<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://www.laptown.com/wp-content/themes/laptown-v2/favico_16.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="css/site.css" />

    <title>TicketSys - <?php echo $title ?></title>
</head>

<body>

    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #005dac;">

            <div class="container-fluid">
                <a class="navbar-brand" href="<?php page('inicio.php')?>">
                    <img src="img/logo_white.png" alt="Logo laptown">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mr-auto">
                        <a class="nav-link" href="<?php page('inicio.php')?>">Inicio</a>
                        <a class="nav-link" href="<?php page('tickets.php')?>">Tickets</a>
                        <a class="nav-link" href="<?php page('clients.php')?>">Clientes</a>
                        <a class="nav-link" href="<?php page('devices.php')?>">Equipos</a>

                    </div>
                    <div class="navbar-nav ms-auto">
                    <?php
                        if(!isset($_SESSION['userid'])){
                    ?>
                        <a class="nav-link" href="<?php page('index.php')?>">Ingresar</a>
                    <?php } else { ?>
                        <a class="nav-link" href="<?php page('#')?>"><span> ¡Hola, <?php echo ucfirst($_SESSION['username'])?>!</span></a>
                        <a class="nav-link" href="<?php page('logout.php')?>">Salir</a>
                    <?php } ?>
                    </div>
                </div>

            </div>

        </nav>
        <br>
