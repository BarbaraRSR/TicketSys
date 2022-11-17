<?php
$title = 'New Ticket';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

$results1 = $crud->getClients();
$results2 = $crud->getDevices();

?>

<h3 class="text-center">Nuevo Ticket </h3>

<div class="container">
  <div class="card border-0 shadow rounded-3 my-5">
    <div class="card-body p-4 p-sm-5">
        <!-- Registrar datos del cliente -->
        
        <form method="post" action="ticketnewsuccess.php">

        <h4 class="card-title text-center mb-2 fw-light fs-5">Cliente</h4>

        <div class="mb-1">
        <label for="cliente" class="form-label"></label>
        <select class="form-select" aria-label="Default select example" id="cliente" name="cliente">
                <option value=""></option>
                <?php while ($r1 = $results1->fetch(PDO::FETCH_ASSOC)) { $cliente = $r1['nombre'] . " ". $r1['apellido'];?>
                <option value="<?php echo $r1['cliente_id'] ?>"><?php echo $cliente; ?></option>
            <?php } ?>
        </select>
        </div>

        <hr class="my-4">

        <h4 class="card-title text-center mb-2 fw-light fs-5">Equipo</h4>

        <div class="mb-1">
        <label for="equipo" class="form-label"></label>
        <select class="form-select" aria-label="Default select example" id="equipo" name="equipo">
                <option value=""></option>
                <?php while ($r2 = $results2->fetch(PDO::FETCH_ASSOC)) { $equipo = $r2['tipo'] . " ". $r2['marca'] . " ". $r2['modelo'] . " ". $r2['serie'];?>
                <option value="<?php echo $r2['equipo_id'] ?>"><?php echo $equipo; ?></option>
            <?php } ?>
        </select>
        </div>

        <hr class="my-4">     
        
        <h4 class="card-title text-center mb-5 fw-light fs-5">Información del Ticket</h4>

                <!-- Servicio y costo -->
                <div class="col"><div class="form-floating mb-3">
                    <input required type="text" name="servicio" class="form-control" id="servicio">
                    <label for="servicio">Servicio*</label>
                </div></div>
                <div class="col"><div class="form-floating mb-3">
                    <input type="text" name="estimado" class="form-control" id="estimado">
                    <label for="estimado">Costo estimado</label>
                </div></div>
                <!-- Descripción -->
                <div class="form-floating mb-3">
                    <input required type="text" name="descripcion" class="form-control" id="descripcion">
                    <label for="descripcion">&nbsp; Descripción del servicio</label>
                </div>
            </div>
            <!-- Botones -->
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Confirmar</button>
                <a href="inicio.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
  </div>
</div>

<?php
require_once "includes/footer.php";
?>
