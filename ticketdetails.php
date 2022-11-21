<?php
$title = 'Ticket Details';

require_once 'includes/redirect.php';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['folio'])) {
    echo "<h1 class='text-danger'>Falta información, no se puede completar la solicitud.</h1>";
} else {
    $folio = $_GET['folio'];
    $result = $crud->getTicketDetails($folio); 
?>

<h3>Folio: <?php echo $result['folio']; ?></h3>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">Detalles del Ticket</div>
            <div class="card-body">
                <h5 class="card-title">Estatus: <?php echo $result['estatus']; ?></h5>
                <h6 class="card-subtitle mb-3 text-muted"><?php echo $result['servicio']; ?></h6>
                <p class="card-text">
                    Equipo: <?php echo $result['tipo']; ?>: <?php echo $result['marca']; ?> <?php echo $result['modelo']; ?><br>
                    Número de Serie: <?php echo $result['serie']; ?><br>
                    Precio Estimado: <?php echo $result['estimado']; ?><br>
                    Descripción: <?php echo $result['descripcion']; ?><br>
                    Fecha: <?php echo $result['fecha']; ?><br>
                </p>
                <a href="<?php page('ticketedit.php?folio=')?><?php echo $result['folio'] ?>" class="btn btn-warning" title="Editar ticket"><img src="img/edit.svg" width="23"></a>
                <a onclick="return confirm('Proceder a borrar este ticket permanentemente?');" href="<?php page('ticketdelete.php?folio=')?><?php echo $result['folio'] ?>" class="btn btn-danger" title="Eliminar ticket"><img src="img/trash.svg" width="23"></a>
            </div>
        </div>
    </div>

    <div class="col">
        <!-- Información del cliente -->
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
                <a href="<?php page('clientdetails.php?cliente_id=')?><?php echo $result['cliente_id'] ?>" class="filter-blue" title="Ver detalles del cliente"><img src="img/view.svg" width="23"></a>
                &nbsp;&nbsp;
                <a href="<?php page('clientedit.php?cliente_id=')?><?php echo $result['cliente_id'] ?>" class="filter-blue" title="Editar cliente"><img src="img/edit.svg" width="23"></a>
            </div>
        </div>
    </div>
</div>

    <br>
    <button onclick="history.back()" class="btn btn-info">Regresar</button>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>