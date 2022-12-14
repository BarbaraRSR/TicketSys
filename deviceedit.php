<?php
$title = 'Edit Device';
include_once 'includes/redirect.php';
require_once "includes/header.php";
require_once 'includes/auth_check.php'; 
require_once "db/conn.php";

if (!isset($_GET['equipo_id'])) {
    include 'includes/errormessage.php';
    //header("Location: inicio.php");
    assign('inicio.php');
} else {
    $equipo_id = $_GET['equipo_id'];
    $equipo = $crud->getDeviceDetails($equipo_id);
    ?>

<h3 class="text-center">Editar Equipo </h3>

<div class="container">
  <div class="card border-0 shadow rounded-3 my-5">
    <div class="card-body p-4 p-sm-5">

        <!-- Registrar datos del equipo -->
        <h4 class="card-title text-center mb-5 fw-light fs-5">Equipo</h4>
        <form method="post" action="deviceeditpost.php">
            <div class="row">
            <div class="col">

                <input type="hidden" name="equipo_id" value="<?php echo $equipo['equipo_id'] ?>">

                <div class="col"><div class="form-floating mb-3">
                    <select type="text" name="tipo" class="form-select" id="tipo" aria-label="Default select example">
                    <option value="<?php echo $equipo['tipo'] ?>"><?php echo " --- " . $equipo['tipo'] . " --- "?></option>
                        <option value="Laptop o PC">Laptop o PC</option>
                        <option value="Smartphone">Smartphone</option>
                        <option value="Tableta">Tableta</option>
                        <option value="Consola">Consola</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="equipo">Tipo*</label>
                </div></div>
                <div class="form-floating mb-3">
                    <input required type="text" name="marca" class="form-control" value="<?php echo $equipo['marca'] ?>" id="marca">
                    <label for="marca">&nbsp; Marca del equipo*</label>
                </div></div>
                <div class="col">
                <div class="form-floating mb-3">
                    <input required type="text" name="modelo" class="form-control" value="<?php echo $equipo['modelo'] ?>" id="modelo">
                    <label for="modelo">&nbsp; Modelo del equipo*</label>
                </div>
            </div>
            </div><div class="row">
            </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Guardar</button>
                &nbsp; &nbsp;
                <a href="<?php page('devices.php')?>" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
  </div>
</div>

    <?php } ?>

<?php require_once "includes/footer.php"; ?>
