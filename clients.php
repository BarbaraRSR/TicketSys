<?php
$title = 'View Tickets';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

$results = $crud->getClients();
?>

<h2>Directorio de clientes</h2>
<a href="clientnew.php" class="btn btn-success">Nuevo cliente</a>
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
                <td><?php echo $r['cliente_id'] ?></td>
                <td><?php echo $r['nombre'] ?></td>
                <td><?php echo $r['apellido'] ?></td>
                <td><?php echo $r['telefono'] ?></td>
                <td><?php echo $r['correo'] ?></td>
                <td><?php echo $r['comentarios'] ?></td>
                <td>
                    <a href="clientedit.php?cliente_id=<?php echo $r['cliente_id'] ?>" class="btn btn-warning">Actualizar</a>
                    <a onclick="return confirm('¿Desea eliminar permanentemente a este cliente?');" href="clientdelete.php?cliente_id=<?php echo $r['cliente_id'] ?>" class="btn btn-danger">Borrar</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>

<?php require_once 'includes/footer.php'; ?>