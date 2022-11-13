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
$title = 'History Tickets';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

// Get all attendees
$results = $crud->getTicketsHistory();
?>

<input type="text" id="myInput" onkeyup="filtro()" placeholder="Buscar" title="Buscar">

<table id= "myTable" class="table">
    <thead>
        <tr>
            <th scope="col">Folio</th>
            <th scope="col">Antigüedad</th>
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
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>


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
        if (Col0.indexOf(filter) > -1 || Col1.indexOf(filter) > -1 || Col2.indexOf(filter) > -1 || Col3.indexOf(filter) > -1 || Col4.indexOf(filter) > -1 || Col5.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}

document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
</script>