<?php
$title = 'Edit';
require_once "includes/header.php";
require_once 'includes/auth_check.php'; 
require_once "db/conn.php";

$client = $crud->getClients();
$device = $crud->getDevices();

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

        <div class="mb-1">
        <label for="equipo" class="form-label">Equipo</label>
        <select class="form-select" aria-label="Default select example" id="equipo" name="equipo">
                
                <?php while ($d = $device->fetch(PDO::FETCH_ASSOC)) { $equipo = $d['tipo'] . " ". $d['marca'] . " ". $d['modelo'] . " ". $d['serie'];?>
                <option value="<?php echo $d['equipo_id'] ?>"><?php echo $equipo; ?></option>
            <?php } ?>
        </select>
        </div>

        <hr class="my-4">          

        <h4 class="card-title text-center mb-5 fw-light fs-5">Información del Ticket</h4>
            
                <!-- Servicio y costo -->
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

            </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Confirmar</button>
                <a href="inicio.php" class="btn btn-danger">Cancelar</a>
            </div>
    </form>
    

    
    <?php } ?>

<?php require_once "includes/footer.php"; ?>