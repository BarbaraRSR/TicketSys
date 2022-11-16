<?php
$title = 'Edit';
require_once "includes/header.php";
require_once 'includes/auth_check.php'; 
require_once "db/conn.php";

$client = $crud->getClients();

if (!isset($_GET['folio'])) {
    include 'includes/errormessage.php';
    header("Location: inicio.php");
} else {
    $folio = $_GET['folio'];
    $ticket = $crud->getTicketDetails($folio);
    

    ?>

<h3 class="text-center">Editar Ticket </h3>

<div class="container">
  <div class="card border-0 shadow rounded-3 my-5">

    <div class="card-body p-4 p-sm-5">
    
    <form method="post" action="ticketeditpost.php">

        <input type="hidden" name="folio" value="<?php echo $ticket['folio'] ?>">

        <div class="mb-1">
            <label for="cliente" class="form-label">Cliente</label>
            <select class="form-select" aria-label="Default select example" id="cliente" name="cliente">

                <?php while ($c = $client->fetch(PDO::FETCH_ASSOC)) { ?>

                    <option value="<?php echo $c['cliente_id'] ?>" <?php if ($c['cliente_id'] == $ticket['cliente_id']) echo 'selected' ?>>
                        <?php echo $c['nombre'] . " ". $c['apellido']; ?>
                    </option>
                <?php } ?>

            </select>
        </div>

        <hr class="my-4">

        <!-- Información del equipo -->
        <h4 class="card-title text-center mb-5 fw-light fs-5">Información del equipo</h4>
            <div class="row">
                <!-- Equipo -->
                <div class="col"><div class="form-floating mb-3">
                    
                    <select type="text" name="tipo" class="form-select" id="tipo" aria-label="Default select example">
                        <option value="<?php echo $ticket['tipo'] ?>"><?php echo " --- " . $ticket['tipo'] . " --- "?></option>
                        <option value="Laptop o PC">Laptop o PC</option>
                        <option value="Smartphone">Smartphone</option>
                        <option value="Tableta">Tableta</option>
                        <option value="Consola">Consola</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="equipo">Tipo*</label>
                </div></div>
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="marca" class="form-control" value="<?php echo $ticket['marca'] ?>" id="marca">
                    <label for="marca">Marca*</label>
                </div></div>
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="modelo" class="form-control" value="<?php echo $ticket['modelo'] ?>" id="modelo">
                    <label for="modelo">Modelo*</label>
                </div></div>
            </div>
            <div class="row">
                <!-- Serie, servicio y costo -->
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="serie" class="form-control" value="<?php echo $ticket['serie'] ?>" id="serie">
                    <label for="serie">Número de serie*</label>
                </div></div>
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="servicio" class="form-control" value="<?php echo $ticket['servicio'] ?>" id="servicio">
                    <label for="servicio">Servicio*</label>
                </div></div>
                <div class="col"><div class="form-floating mb-3">
                    <input type="text" name="estimado" class="form-control" value="<?php echo $ticket['estimado'] ?>" id="estimado">
                    <label for="estimado">Costo estimado</label>
                </div></div>
                <!-- Descripción -->
                <div class="form-floating mb-3">
                    <input required type="text" name="descripcion" class="form-control" value="<?php echo $ticket['descripcion'] ?>" id="descripcion">
                    <label for="descripcion">&nbsp; Descripción del servicio</label>
                </div>
            </div>



        <div class=" mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" value="<?php echo $ticket['fecha'] ?>" id="fecha" name="fecha">
        </div>
        <div class="mb-3">
            <label for="estatus" class="form-label">Estatus</label>
            <select class="form-select" aria-label="Default select example" id="estatus" name="estatus">
                <option value="<?php echo $ticket['estatus'] ?>"><?php echo " --- " . $ticket['estatus'] . " --- "?></option>
                <option value="Abierto">Abierto</option>
                <option value="Diagnostico">Diagnostico</option>
                <option value="Cerrado">Cerrado</option>
                <option value="Garantia">Garantia</option>
                <option value="Cancelado">Cancelado</option>                   
            </select>
        </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Confirmar</button>
                <a href="inicio.php" class="btn btn-danger">Cancelar</a>
            </div>
    </form>
    

    
    <?php } ?>

<?php require_once "includes/footer.php"; ?>