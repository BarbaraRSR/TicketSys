<?php
$title = 'Ticket Detalles';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['folio'])) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    $folio = $_GET['folio'];
    $result = $crud->getTicketDetails($folio); 
?>

<h3>Ticket: <?php echo $result['folio']; ?></h3>

<div class="row">

    <div class="col">
        <div class="card">
        <div class="card-header">Detalles del Ticket</div>
        <div class="card-body">
            <h5 class="card-title">Folio: <?php echo $result['folio']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted"><?php echo $result['estatus']; ?></h6>
            <p class="card-text">
                Servicio: <?php echo $result['servicio']; ?><br>
                Precio Estimado: <?php echo $result['estimado']; ?><br>
                Descripción: <?php echo $result['descripcion']; ?><br>
                Fecha: <?php echo $result['fecha']; ?><br>
            </p>
            <br>
            <a href="ticketedit.php?folio=<?php echo $result['folio'] ?>" class="btn btn-warning">Editar</a>
            <a onclick="return confirm('Proceder a borrar este ticket permanentemente?');" href="ticketdelete.php?folio=<?php echo $result['folio'] ?>" class="btn btn-danger">Borrar</a>
        </div>
        </div>
    </div>

    <div class="col">
        <div class="card">
        <div class="card-header">Información del Equipo</div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $result['tipo']; ?></h5>
            <p class="card-text">
                Marca: <?php echo $result['marca']; ?><br>
                Modelo: <?php echo $result['modelo']; ?><br>
                Número de Serie: <?php echo $result['serie']; ?><br>
            </p>
            <br>
            <a href="deviceedit.php?equipo_id=<?php echo $result['equipo_id'] ?>" class="btn btn-warning">Actualizar</a>
        </div>
        </div>
    </div>
    
    <div class="col">
        <div class="card">
        <div class="card-header">Información del Cliente</div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $result['nombre']; ?> <?php echo $result['apellido']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted"><?php echo $result['telefono']; ?></h6>
                <p class="card-text"><?php echo $result['correo']; ?></p>
                <br>
            <h6 class="card-subtitle mb-3 text-muted">Comentarios</h6>
                <p class="card-text"><?php echo $result['comentarios']; ?></p>
            <br>
            <a href="clientedit.php?cliente_id=<?php echo $result['cliente_id'] ?>" class="btn btn-warning">Actualizar</a>
        </div>
        </div>
</div></div>


    <br>
    <a href="inicio.php" class="btn btn-info">Regresar</a>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>