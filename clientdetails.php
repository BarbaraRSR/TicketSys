<?php
$title = 'Detalles Cliente';

require_once 'includes/redirect.php';
require_once 'includes/header.php';
//require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['cliente_id'])) {
    echo "<h1 class='text-danger'>Por favor, revise la información y vuelva a intentarlo.</h1>";
} else {
    $cliente_id = $_GET['cliente_id'];
    $client = $crud->getClientDetails($cliente_id); 
    $ticket = $crud->getTicketsClient($cliente_id);
?>

<h3>Cliente: <?php echo $client['nombre']; ?> <?php echo $client['apellido']; ?></h3>

<!--INICIA FICHA CON PESTAÑAS-->
<div class="card">
  <div class="card-header text-center">
  <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th><?php echo $client['cliente_id']; ?></th>
            <td><?php echo $client['telefono']; ?></td>
            <td><?php echo $client['correo']; ?></td>
            <td>
                <a href="<?php page('clientedit.php?cliente_id=')?><?php echo $client['cliente_id'] ?>" class="btn btn-warning" title="Editar cliente"><img src="img/edit.svg" width="23"></a>
                <a onclick="return confirm('Proceder a borrar este cliente permanentemente?');" href="<?php page('clientdelete.php?cliente_id=')?><?php echo $client['cliente_id'] ?>" class="btn btn-danger" title="Eliminar cliente"><img src="img/trash.svg" width="23"></a>
            </td>
            </tr>
        </tbody>
    </table>
  </div>
  <div class="card-body text-center">
    <h5 class="card-title">Historial de servicios</h5>
    <hr>
    
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Folio</th>
          <th scope="col">Fecha</th>
          <th scope="col">Equipo</th>
          <th scope="col">Servicio</th>
          <th scope="col">Costo</th>
          <th scope="col">Estatus</th>
            </th>
        </tr>
      </thead>
      <tbody>
        <?php  while ($t = $ticket->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?php echo $t['folio'] ?></td>
            <td><?php echo $t['fecha'] ?></td>
            <td><?php echo $t['tipo'] . " " . $t['marca'] . " " . $t['modelo']; ?></td>
            <td><?php echo $t['servicio'] ?></td>
            <td><?php echo "$" . $t['estimado'] ?></td>
            <td><?php echo $t['estatus'] ?></td>
            <td>
                <a href="<?php page('ticketdetails.php?folio=')?><?php echo $t['folio'] ?>" class="filter-blue" title="Ver detalles del ticket"><img src="img/view.svg" width="20"></a>
                &nbsp;&nbsp;
                <a href="<?php page('ticketedit.php?folio=')?><?php echo $t['folio'] ?>" class="filter-blue" title="Editar ticket"><img src="img/edit.svg" width="20"></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  </div>

    

    <br>
    <button onclick="history.back()" class="btn btn-info">Regresar</button>

<?php  } ?>

<?php require_once 'includes/footer.php'; ?>

