<style>

#myInput {
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

</style>

<?php
$title = 'View Tickets';

require_once 'includes/redirect.php';
require_once 'includes/header.php';
//require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 

$results = $crud->getClients($crud->getClientsAll(), $pagina);
?>

<h2>Directorio de Clientes</h2>

<!-- Botones de acceso rápido a agregar a la DB -->
<?php require_once 'includes/buttons.php' ?>
<!--<a href="<?php //page('clientnew.php')?>" class="btn btn-success">Nuevo cliente</a><br>-->

<hr>

<input type="text" id="myInput" onkeyup="filtro()" placeholder="Buscar" title="Buscar">

<table id= "myTable" class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <!--<th scope="col">Apellido</th>-->
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <!--<th scope="col">Comentarios</th>-->
            </th>
        </tr>
    </thead>
    <tbody>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['cliente_id'] ?></td>
                <td><?php echo $r['nombre'] . " " . $r['apellido']; ?> <?php echo $r['apellido'] ?></td>
                <td><?php echo $r['telefono'] ?></td>
                <td><?php echo $r['correo'] ?></td>
                <td>
                    <a href="<?php page('clientdetails.php?cliente_id=')?><?php echo $r['cliente_id'] ?>" class="btn btn-primary" title="Ver historial del cliente"><img src="img/view.svg" width="23"></a>
                    <a href="<?php page('clientedit.php?cliente_id=')?><?php echo $r['cliente_id'] ?>" class="btn btn-warning" title="Editar cliente"><img src="img/edit.svg" width="23"></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?=$crud->getPaginator('clients.php');?>

<?php require_once 'includes/footer.php'; ?>


<script>
function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {
        var Col0 = rows[i].cells[0].textContent.toUpperCase();
        var Col1 = rows[i].cells[1].textContent.toUpperCase();
        var Col2 = rows[i].cells[2].textContent.toUpperCase();
        var Col3 = rows[i].cells[3].textContent.toUpperCase();
        var Col4 = rows[i].cells[4].textContent.toUpperCase();
        var Col5 = rows[i].cells[5].textContent.toUpperCase();
        if (Col0.indexOf(filter) > -1 || 
            Col1.indexOf(filter) > -1 || 
            Col2.indexOf(filter) > -1 || 
            Col3.indexOf(filter) > -1 || 
            Col4.indexOf(filter) > -1 || 
            Col5.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}

document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
</script>
<?=$crud->getPaginator();?>