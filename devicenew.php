<?php
$title = 'New Device';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';
?>

<h3 class="text-center">Registrar Equipo </h3>

<div class="container">
  <div class="card border-0 shadow rounded-3 my-5">
    <div class="card-body p-4 p-sm-5">

        <!-- Registrar datos del equipo -->
        <h4 class="card-title text-center mb-5 fw-light fs-5">Equipo</h4>
        <form method="post" action="devicenewsuccess.php">
            <div class="row">
            <div class="col">
                <div class="col"><div class="form-floating mb-3">
                    <select type="text" name="tipo" class="form-select" id="tipo" aria-label="Default select example">
                        <option value=""></option>
                        <option value="Laptop o PC">Laptop o PC</option>
                        <option value="Smartphone">Smartphone</option>
                        <option value="Tableta">Tableta</option>
                        <option value="Consola">Consola</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="equipo">Tipo*</label>
                </div></div>
                <div class="form-floating mb-3">
                    <input required type="text" name="marca" class="form-control" id="marca">
                    <label for="marca">&nbsp; Marca del equipo*</label>
                </div></div>
                <div class="col">
                <div class="form-floating mb-3">
                    <input required type="text" name="modelo" class="form-control" id="modelo">
                    <label for="modelo">&nbsp; Modelo del equipo*</label>
                </div>
            </div>
            </div><div class="row">
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="serie" class="form-control" id="serie">
                    <label for="serie">Serie*</label>
                </div></div>
            </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Guardar y continuar</button>
                &nbsp; &nbsp;
                <a href="devices.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
  </div>
</div>


<?php
require_once "includes/footer.php";
?>