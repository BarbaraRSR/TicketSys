<?php
$title = 'View Tickets';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

// Get all attendees
$results = $crud->getClients();
?>

<h2>Directorio de clientes</h2>
<a href="newclient.php" class="btn btn-danger">Nuevo cliente</a>
<br>
<hr>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col">Comentarios</th>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['clienteid'] ?></td>
                <td><?php echo $r['nombre'] ?></td>
                <td><?php echo $r['apellido'] ?></td>
                <td><?php echo $r['telefono'] ?></td>
                <td><?php echo $r['correo'] ?></td>
                <td><?php echo $r['comentarios'] ?></td>
                <td>
                    <a href="client.php?clienteid=<?php echo $r['clienteid'] ?>" class="btn btn-primary">Revisar</a>
                    <!--<a href="edit.php?id=<?php echo $r['clienteid'] ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['clienteid'] ?>" class="btn btn-danger">Delete</a>-->
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>


<?php require_once 'includes/footer.php'; ?>