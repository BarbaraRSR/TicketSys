<?php
$title = 'View Tickets';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

// Get all attendees
$results = $crud->getTicketsDashboard();
?>

<a href="registration.php" class="btn btn-danger">Nuevo registro</a>

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
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['folio'] ?></td>
                <td><?php echo $r['creacion'] ?></td>
                <td><?php echo $r['cliente'] ?></td>
                <td><?php echo $r['equipo'] ?></td>
                <td><?php echo $r['servicio'] ?></td>
                <td><?php echo $r['estatus'] ?></td>
                <td>
                    <a href="view.php?folio=<?php echo $r['folio'] ?>" class="btn btn-primary">Revisar</a>
                    <!--<a href="edit.php?id=<?php echo $r['folio'] ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['folio'] ?>" class="btn btn-danger">Delete</a>-->
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>


<?php require_once 'includes/footer.php'; ?>
