<?php
$title = 'Ticket Detalles';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

// Get attendee by Id
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
        <div class="card-header">Detalles del equipo</div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $result['tipo']; ?>, <?php echo $result['marca']; ?> <?php echo $result['modelo']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted"><?php echo $result['estatus']; ?></h6>
            <p class="card-text">
                Número de Serie: <?php echo $result['serie']; ?><br>
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
        <div class="card-header">Información del cliente</div>
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

<!-- OLD SETUP 
    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">Folio: <?php // echo $result['folio']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted">Cliente: <?php // echo $result['cliente']; ?></h6>
            <p class="card-text">
                Correo: <?php // echo $result['correo']; ?><br>
                Teléfono: <?php // echo $result['telefono']; ?><br>
                Equipo: <?php // echo $result['equipo']; ?><br>
                Número de Serie: <?php // echo $result['serie']; ?><br>
                Servicio: <?php // echo $result['servicio']; ?><br>
                Precio Estimado: <?php // echo $result['estimado']; ?><br>
                Descripción: <?php // echo $result['descripcion']; ?><br>
                Antiguedad: <?php // echo $result['creacion']; ?><br>
                Estatus: <?php // echo $result['estatus']; ?><br>
                
            </p>
        </div>
    </div>

    <br>
    <a href="inicio.php" class="btn btn-info">Regreso</a>
    <a href="edit.php?folio=<?php // echo $result['folio'] ?>" class="btn btn-warning">Editar</a>
    <a onclick="return confirm('Proceder a borrar este ticket permanentemente?');" href="delete.php?folio=<?php // echo $result['folio'] ?>" class="btn btn-danger">Borrar</a>

-->

<?php } ?>

<?php require_once 'includes/footer.php'; ?>