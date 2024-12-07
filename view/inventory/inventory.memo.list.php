<?php include('../../config/net.php');

// Consulta para obtener los memorándums con paginación
$query = "SELECT im.id, im.usuario, im.asunto, im.fecha_creacion, e.name1, e.lastname1
          FROM inventory_memos im
          JOIN employee e ON im.usuario = e.id";

$stmt = $net_rrhh->prepare($query);
$stmt->execute();

$memos = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<table id="memoTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Asunto</th>
            <th>Fecha de Creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($memos as $index => $memo): ?>
            <tr>
                <td><?php echo ($offset + $index + 1); ?></td>
                <td><?php echo $memo['name1'] . ' ' . $memo['lastname1']; ?></td>
                <td><?php echo $memo['asunto']; ?></td>
                <td><?php echo $memo['fecha_creacion']; ?></td>
                <td>
                <div class="dropdown">
                    <button class="btn-siif btn-solid-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Acciones
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/view/inventory/process/inventory.memo.ver.php?id=<?php echo $memo['id']; ?>" class="dropdown-item">Ver</a>
                        </li>
                        <li>
                            <a href="/view/inventory/memorandums/memorandum_<?php echo $memo['id']; ?>.pdf" class="dropdown-item" download>Descargar</a>
                        </li>
                    </ul>
                </div>
                    
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Asignaciones</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $('#memoTable').DataTable();
    });
</script>