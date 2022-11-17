<?php
$title = 'Inicio';

include_once 'includes/redirect.php';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

$result = $crud->getTickets();
?>

<h1>Tickets activos</h1>

<a href="<?php page("ticketnew.php")?>" class="btn btn-success">Nuevo ticket</a>  
<a href="<?php page("clientnew.php")?>" class="btn btn-success">Nuevo cliente</a>
<a href="<?php page("devicenew.php")?>" class="btn btn-success">Nuevo equipo</a><br>

<HR>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Folio</th>
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
            <th scope="col">Equipo</th>
            <th scope="col">Servicio</th>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php while ($res = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $res['folio'] ?></td>
                <td><?php echo $res['fecha'] ?></td>
                <td><?php echo $res['nombre'] ?> <?php echo $res['apellido'] ?></td>
                <td><?php echo $res['tipo'] ?>; <?php echo $res['marca'] ?>, <?php echo $res['modelo'] ?></td>
                <td>
                    <a href="<?php page('ticketdetails.php?folio=')?><?php echo $res['folio'] ?>" class="btn btn-primary">Revisar</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>
  
<?php require_once 'includes/footer.php'; ?>
