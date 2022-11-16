<?php
$title = 'Edit Client';
require_once "includes/header.php";
require_once 'includes/auth_check.php'; 
require_once "db/conn.php";

if (!isset($_GET['cliente_id'])) {
    include 'includes/errormessage.php';
    header("Location: inicio.php");
} else {
    $cliente_id = $_GET['cliente_id'];
    $ticket = $crud->getClientDetails($cliente_id);
    ?>

<h3 class="text-center">Editar Cliente </h3>

<div class="container">
  <div class="card border-0 shadow rounded-3 my-5">
    <div class="card-body p-4 p-sm-5">
        
        <!-- Registrar datos del cliente -->
        <h4 class="card-title text-center mb-5 fw-light fs-5">CLIENTE</h4>
        <form method="post" action="clienteditpost.php">
            <div class="row">
            <div class="col">

                <input type="hidden" name="cliente_id" value="<?php echo $ticket['cliente_id'] ?>">

                <div class="form-floating mb-3">
                    <input required type="text" name="nombre" class="form-control" value="<?php echo $ticket['nombre'] ?>" id="nombre">
                    <label for="nombre">&nbsp; Nombre del cliente*</label>
                </div></div>
                <div class="col">
                <div class="form-floating mb-3">
                    <input required type="text" name="apellido" class="form-control" value="<?php echo $ticket['apellido'] ?>" id="apellido">
                    <label for="apellido">&nbsp; Apellido del cliente*</label>
                </div>
            </div>
            </div><div class="row">
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="telefono" class="form-control" value="<?php echo $ticket['telefono'] ?>" id="telefono">
                    <label for="telefono">Teléfono*</label>
                </div></div>
                <div class="col"><div class="form-floating mb-3">
                    <input type="email" name="correo" class="form-control" value="<?php echo $ticket['correo'] ?>" id="correo" aria-describedby="emailHelp">
                    <label for="correo">Correo electrónico</label>
                </div></div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                    <input type="text" name="comentarios" class="form-control" value="<?php echo $ticket['comentarios'] ?>" id="comentarios">
                    <label for="comentarios">Comentarios</label>
                    </div>   
                </div>
            </div>
            </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Guardar y continuar</button>
                &nbsp; &nbsp;
                <a href="clients.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
  </div>
</div>

    <?php } ?>

<?php require_once "includes/footer.php"; ?>