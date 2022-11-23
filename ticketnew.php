<?php
$title = 'New Ticket';
require_once 'includes/redirect.php';
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
        
        <form method="post" action="<?php page('ticketnewsuccess.php')?>">

        <!-- CLIENTE -->
        <h4 class="card-title text-center mb-2 fw-light fs-5">Cliente</h4>

        <div class="row">
            <div class="col-sm-11">
                <select class="form-select" id="cliente" name="cliente">
                    <option value=""></option>
                    <?php while ($r1 = $results1->fetch(PDO::FETCH_ASSOC)) { $cliente = $r1['nombre'] . " ". $r1['apellido'];?>
                        <option value="<?php echo $r1['cliente_id'] ?>"><?php echo $cliente; ?></option>
            <?php } ?>
        </select>
        </div>
            <!-- Botón -->
            <div class="col-sm-1">
                <a href="<?php page('clientnew.php?')?>" class="btn btn-primary" title="Agregar nuevo cliente"><img src="img/plus.svg" width="23"></a>
            </div>
        </div>

        <!-- EQUIPO -->
        <h4 class="card-title text-center mb-2 fw-light fs-5">Equipo</h4>

        <div class="row">
            <div class="col-sm-11">
                <select class="form-select" id="equipo" name="equipo">
                <option value=""></option>
                <?php while ($r2 = $results2->fetch(PDO::FETCH_ASSOC)) { $equipo = $r2['tipo'] . " ". $r2['marca'] . " ". $r2['modelo'];?>
                <option value="<?php echo $r2['equipo_id'] ?>"><?php echo $equipo; ?></option>
            <?php } ?>
        </select>
        </div>
            <!-- Botón -->
            <div class="col-sm-1">
                <a href="<?php page('devicenew.php?')?>" class="btn btn-primary" title="Agregar equipo"><img src="img/plus.svg" width="23"></a>
            </div>
        </div>
        <div class="my-4">
                    <div class="form-floating mb-3">
                    <input required type="text" name="serie" class="form-control" id="serie">
                    <label for="serie">Serie*</label>
                    </div>
        </div>  
        
        <h4 class="card-title text-center mb-5 fw-light fs-5">Información del Ticket</h4>

        <!-- SERVICIO -->
        <div class="row">                
            <div class="col">
                <div class="form-floating mb-3">
                    <input required type="text" name="servicio" class="form-control" id="servicio">
                    <label for="servicio">Servicio*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" name="estimado" class="form-control" id="estimado">
                    <label for="estimado">Costo estimado</label>
                </div>
            </div>
        </div>
                <!-- Descripción -->
                <div class="form-floating mb-3">
                    <input required type="text" name="descripcion" class="form-control" id="descripcion">
                    <label for="descripcion">&nbsp; Descripción del servicio</label>
                </div>

        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="date" name="fecha" class="form-control" id="fecha" >
                    <label for="fecha" class="form-label">Fecha</label>
                </div>
            </div>
        <div class="col">
                <div class="form-floating mb-3">
                    <select aria-label="Default select example" name="estatus" class="form-select" id="estatus">
                        <option value="Abierto">Abierto</option>
                        <option value="Garantia">Garantía</option>
                        <!--<option value="Diagnostico">Diagnostico</option>
                        <option value="Cerrado">Cerrado</option>
                        <option value="Cancelado">Cancelado</option>-->                  
                    </select>
                    <label for="estatus" class="form-label">Estatus</label>
                </div>

            </div>

            <!-- Botones -->
            <div class="text-center">
                <br>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Confirmar</button>
                <button onclick="history.back()" class="btn btn-danger">Cancelar</button>
                <!--<a href="<?php //page('inicio.php')?>" class="btn btn-danger">Cancelar</a>-->
            </div>
            </div>
            </div>
        </form>
    </div>
  </div>
</div>

<?php
require_once "includes/footer.php";
?>
