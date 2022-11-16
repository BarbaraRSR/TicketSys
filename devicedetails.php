<?php
$title = 'Detalles Equipo';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['equipo_id'])) {
    echo "<h1 class='text-danger'>Por favor revise la información y vuelva a intentarlo</h1>";
} else {
    $equipo_id = $_GET['equipo_id'];
    $result = $crud->getDeviceDetails($equipo_id); 
?>


    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">ID: <?php echo $result['equipo_id']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted">Tipo: <?php echo $result['tipo']; ?></h6>
            <p class="card-text">
                Marca: <?php echo $result['marca']; ?><br>
                Modelo: <?php echo $result['modelo']; ?><br>
                Serie: <?php echo $result['serie']; ?><br>                
            </p>
        </div>
    </div>

    <br>
    <a href="devices.php" class="btn btn-info">Regreso</a>
    <a href="deviceedit.php?equipo_id=<?php echo $result['equipo_id'] ?>" class="btn btn-warning">Actualizar</a>
    <a onclick="return confirm('Proceder a borrar este equipo permanentemente?');" href="devicedelete.php?equipo_id=<?php echo $result['equipo_id'] ?>" class="btn btn-danger">Borrar</a>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>