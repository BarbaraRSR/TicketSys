<?php
$title = 'Registration';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

?>

<h1 class="text-center">Registrar Ticket </h1>

<form method="post" action="success.php">
    <div class="mb-3">
        <label for="cliente" class="form-label">Cliente</label>
        <input required type="text" class="form-control" id="cliente" name="cliente">
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input required type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="phoneHelp">
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
        <input required type="text" class="form-control" id="serie" name="serie">
    </div>
    <div class="mb-3">
        <label for="servicio" class="form-label">Servicio</label>
        <input required type="text" class="form-control" id="servicio" name="servicio">
    </div>
    <div class="mb-3">
        <label for="estimado" class="form-label">Estimado</label>
        <input required type="number" class="form-control" id="estimado" name="estimado">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input required type="text" class="form-control" id="descripcion" name="descripcion">
    </div>
    <div class=" mb-3">
        <label for="actualizado" class="form-label">Actualizado</label>
        <input type="date" class="form-control" id="actualizado" name="actualizado">
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



<?php
require_once "includes/footer.php";
?>