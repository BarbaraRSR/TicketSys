<?php
$title = 'Registration';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

$results = $crud->getDevices();

?>

<h3 class="text-center">Registrar Ticket </h3>

<div class="container">
  <div class="card border-0 shadow rounded-3 my-5">
    <div class="card-body p-4 p-sm-5">
        <!-- Registrar datos del cliente -->
        <h4 class="card-title text-center mb-5 fw-light fs-5">CLIENTE</h4>

        <form method="post" action="success.php">
            <div class="row">
                <div class="form-floating mb-3">
                    <input required type="text" name="cliente" class="form-control" id="cliente">
                    <label for="cliente">&nbsp; Nombre del cliente*</label>
                </div>
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="telefono" class="form-control" id="telefono">
                    <label for="telefono">Teléfono*</label>
                </div></div>
                <div class="col"><div class="form-floating mb-3">
                    <input type="email" name="correo" class="form-control" id="correo" aria-describedby="emailHelp">
                    <label for="correo">Correo electrónico</label>
                </div></div>
            </div>

        <hr class="my-4">

        <!-- Información del equipo -->
        <h4 class="card-title text-center mb-5 fw-light fs-5">Información del equipo</h4>
            <div class="row">
                <!-- Equipo y serie -->
                <div class="col"><div class="form-floating mb-3">
                    <select type="text" name="equipo" class="form-select" id="equipo" aria-label="Default select example">
                        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $r['equipo_id'] ?>"><?php echo $r['modelo']; ?></option>
                        <?php } ?>
                        <!--
                        <option value=""></option>
                        <option value="Motorola">Motorola</option>
                        <option value="Nokia">Nokia</option>
                        <option value="Apple">Apple</option>
                        <option value="Samsung">Samsung</option>
                        <option value="Otro">Otro</option>
                        -->
                    </select>
                    <label for="equipo">Equipo</label>
                </div></div>
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="serie" class="form-control" id="serie">
                    <label for="serie">Número de serie</label>
                </div></div>
            </div>
            <div class="row">
                <!-- Servicio y costo -->
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="servicio" class="form-control" id="servicio">
                    <label for="servicio">Servicio*</label>
                </div></div>
                <div class="col"><div class="form-floating mb-3">
                    <input type="number" name="estimado" class="form-control" id="estimado">
                    <label for="estimado">Costo estimado</label>
                </div></div>
                <!-- Descripción -->
                <div class="form-floating mb-3">
                    <input required type="text" name="descripcion" class="form-control" id="descripcion">
                    <label for="descripcion">&nbsp; Descripción del servicio</label>
                </div>
            </div>

            <!--
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
-->
    </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Guardar registro</button>
                &nbsp; &nbsp;
                <a href="dashboard.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
  </div>
</div>


<?php
require_once "includes/footer.php";
?>
