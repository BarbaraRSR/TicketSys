<?php
$title = 'Success';
require_once 'includes/redirect.php';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $cliente = $_POST['cliente'];
    $equipo = $_POST['equipo'];
    $servicio = $_POST['servicio'];
    $estimado = $_POST['estimado'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $estatus = $_POST['estatus'];

$isSuccess = $crud->insertTicket($cliente, $equipo, $servicio, $estimado, $descripcion, $fecha, $estatus);

    if ($isSuccess) {
        assign('tickets.php');
        include 'includes/successmessage.php';        
    } else {
        include 'includes/errormessage.php';
    }
}

?>

<?php
require_once "includes/footer.php";
?>