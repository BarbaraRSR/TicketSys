<?php
$title = 'Detalles Cliente';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['cliente_id'])) {
    echo "<h1 class='text-danger'>Por favor revise la información y vuelva a intentarlo</h1>";
} else {
    $cliente_id = $_GET['cliente_id'];
    $result = $crud->getClientDetails($cliente_id); 
?>


    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">ID: <?php echo $result['cliente_id']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted">Nombre: <?php echo $result['nombre']; ?></h6>
            <p class="card-text">
                ID: <?php echo $result['cliente_id']; ?><br>
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
    <a href="clientedit.php?cliente_id=<?php echo $result['cliente_id'] ?>" class="btn btn-warning">Editar</a>
    <a onclick="return confirm('Proceder a borrar este cliente permanentemente?');" href="clientdelete.php?cliente_id=<?php echo $result['cliente_id'] ?>" class="btn btn-danger">Borrar</a>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>