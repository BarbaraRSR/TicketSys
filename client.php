<?php
$title = 'View Tickets';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

// Get attendee by Id
if (!isset($_GET['clienteid'])) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    $clienteid = $_GET['clienteid'];
    $result = $crud->getClientDetails($clienteid); 
?>


    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">ID: <?php echo $result['clienteid']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted">Nombre: <?php echo $result['nombre']; ?></h6>
            <p class="card-text">
                ID: <?php echo $result['clienteid']; ?><br>
                Nombre: <?php echo $result['nombre']; ?><br>
                Apellido: <?php echo $result['apellido']; ?><br>
                Teléfono: <?php echo $result['telefono']; ?><br>
                Correo: <?php echo $result['correo']; ?><br>
                Comentarios: <?php echo $result['comentarios']; ?><br>
                
            </p>
        </div>
    </div>

    <br>
    <a href="clients.php" class="btn btn-info">Regreso</a>
    <a href="edit.php?clienteid=<?php echo $result['clienteid'] ?>" class="btn btn-warning">Editar</a>
    <!-- TODAVÍA NO FUNCIONA EDITAR O BORRAR -->
    <a onclick="return confirm('Proceder a borrar este ticket permanentemente?');" href="delete.php?folio=<?php echo $result['folio'] ?>" class="btn btn-danger">Borrar</a>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>