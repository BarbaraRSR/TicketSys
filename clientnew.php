<?php
$title = 'New Client';
require_once 'includes/redirect.php';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';
?>

<h3 class="text-center">Registrar Cliente </h3>

<div class="container">
  <div class="card border-0 shadow rounded-3 my-5">
    <div class="card-body p-4 p-sm-5">

        <!-- Registrar datos del cliente -->
        <h4 class="card-title text-center mb-5 fw-light fs-5">CLIENTE</h4>
        <form method="post" action="<?php page('clientnewsuccess.php')?>">
            <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input required type="text" name="nombre" class="form-control" id="nombre">
                    <label for="nombre">&nbsp; Nombre del cliente*</label>
                </div></div>
                <div class="col">
                <div class="form-floating mb-3">
                    <input required type="text" name="apellido" class="form-control" id="apellido">
                    <label for="apellido">&nbsp; Apellido del cliente*</label>
                </div>
            </div>
            </div><div class="row">
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="telefono" class="form-control" id="telefono">
                    <label for="telefono">Teléfono*</label>
                </div></div>
                <div class="col"><div class="form-floating mb-3">
                    <input type="email" name="correo" class="form-control" id="correo" aria-describedby="emailHelp">
                    <label for="correo">Correo electrónico</label>
                </div></div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                    <input type="text" name="comentarios" class="form-control" id="comentarios">
                    <label for="comentarios">Comentarios</label>
                    </div>   
                </div>
            </div>
            </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Guardar</button>
                &nbsp; &nbsp;
                <button onclick="history.back()" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
    </div>
  </div>
</div>


<?php
require_once "includes/footer.php";
?>
