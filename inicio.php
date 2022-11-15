<?php
$title = 'Inicio';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

// Get all Tickets
// $results = $crud->getTicketsDashboard();
$resultados = $crud->getTickets();
?>

<h1>Tickets activos</h1>

<a href="ticketnew.php" class="btn btn-success">Nuevo ticket</a>  
<a href="clientnew.php" class="btn btn-success">Nuevo cliente</a><br>

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
        <?php while ($res = $resultados->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $res['folio'] ?></td>
                <td><?php echo $res['fecha'] ?></td>
                <td><?php echo $res['nombre'] ?> <?php echo $res['apellido'] ?></td>
                <td><?php echo $res['tipo'] ?>; <?php echo $res['marca'] ?>, <?php echo $res['modelo'] ?></td>
                <td>
                    <a href="ticketdetails.php?folio=<?php echo $res['folio'] ?>" class="btn btn-primary">Revisar</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>

<!-- OLD TABLE-->
<!--
<table class="table">
    <thead>
        <tr>
            <th scope="col">Folio</th>
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
            <th scope="col">Equipo</th>
            <th scope="col">Servicio</th>
            <th scope="col">Estatus</th>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php //while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php // echo $r['folio'] ?></td>
                <td><?php // echo $r['creacion'] ?></td>
                <td><?php // echo $r['cliente'] ?></td>
                <td><?php // echo $r['equipo'] ?></td>
                <td><?php // echo $r['servicio'] ?></td>
                <td><?php // echo $r['estatus'] ?></td>
                <td>
                    <a href="view.php?folio=<?php // echo $r['folio'] ?>" class="btn btn-primary">Revisar</a>
                </td>
            </tr>
        <?php //} ?>

    </tbody>
</table>
        -->     

<?php require_once 'includes/footer.php'; ?>
