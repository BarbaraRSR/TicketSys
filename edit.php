<?php
$title = 'Edit';
require_once "includes/header.php";
require_once 'includes/auth_check.php'; 
require_once "db/conn.php";

if (!isset($_GET['folio'])) {
    //echo 'error';
    include 'includes/errormessage.php';
    header("Location: dashboard.php");
} else {
    $folio = $_GET['folio'];
    $ticket = $crud->getTicketDetails($folio);

    ?>

    <h1 class="text-center">Editar Ticket </h1>
    
    <form method="post" action="editpost.php">
        <input type="hidden" name="folio" value="<?php echo $ticket['folio'] ?>">
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input required type="text" class="form-control" value="<?php echo $ticket['cliente'] ?>" id="cliente" name="cliente">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input required type="email" class="form-control" value="<?php echo $ticket['correo'] ?>" id="correo" name="correo" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" value="<?php echo $ticket['telefono'] ?>" id="telefono" name="telefono" aria-describedby="phoneHelp">
        </div>
        <div class="mb-3">
            <label for="equipo" class="form-label">Equipo</label>
            <select class="form-select" aria-label="Default select example" id="equipo" name="equipo">
                <option value="Motorola">Motorola</option>
                <option value="Nokia">Nokia</option>
                <option value="Apple">Apple</option>
                <option value="Samsung">Samsung</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="serie" class="form-label">Serie</label>
            <input required type="text" class="form-control" value="<?php echo $ticket['serie'] ?>" id="serie" name="serie">
        </div>
        <div class="mb-3">
            <label for="servicio" class="form-label">Servicio</label>
            <input required type="text" class="form-control" value="<?php echo $ticket['servicio'] ?>" id="servicio" name="servicio">
        </div>
        <div class="mb-3">
            <label for="estimado" class="form-label">Estimado</label>
            <input required type="number" class="form-control" value="<?php echo $ticket['estimado'] ?>" id="estimado" name="estimado">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input required type="text" class="form-control" value="<?php echo $ticket['descripcion'] ?>" id="descripcion" name="descripcion">
        </div>
        <div class=" mb-3">
            <label for="actualizado" class="form-label">Actualizado</label>
            <input type="date" class="form-control" value="<?php echo $ticket['actualizado'] ?>" id="actualizado" name="actualizado">
        </div>
        <div class="mb-3">
            <label for="estatus" class="form-label">Estatus</label>
            <select class="form-select" aria-label="Default select example" id="estatus" name="estatus">
                <option value="Abierto">Abierto</option>
                <option value="Cerrado">Cerrado</option>
    
            </select>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Guardar Registro</button>
            <a href="dashboard.php" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
    
    
    <?php } ?>

<?php require_once "includes/footer.php"; ?>