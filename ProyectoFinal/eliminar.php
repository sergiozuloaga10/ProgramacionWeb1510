<?php 

    include("conexion.php");

    if(isset($_GET["numero"])){
        $txtid = $_GET["numero"];
        
        // Se elimina la parte del modal aquí ya que será parte del formulario
        $conexion->exec("USE $db_name");
        $stm = $conexion->prepare("DELETE FROM persona WHERE numero=:txtid");
        $stm->bindParam(":txtid", $txtid);
        $stm->execute();

        header("location: inicio.php");
        exit();

    }
?>

<!-- Modal -->
<div class="modal fade" id="eliminar<?php echo $conm['numero']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="eliminar.php" method="GET">
        <?php
            $numeroEliminar = $conm["numero"];
            $nombre = $conm["nombre_usuario"];
        ?>
        <div class="modal-body">
            <?php echo "¿Seguro que quieres eliminar a $nombre?"; ?>
            <input type="hidden" name="numero" value="<?php echo $numeroEliminar; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-danger">Sí</button>
        </div>
      </form>
    </div>
  </div>
</div>
