<?php 

    include("conexion.php");

    if(isset($_GET["numero"])){
        
        $txtid = $_GET["numero"];
        $conexion->exec("USE $db_name");
        $stm = $conexion->prepare("SELECT * FROM persona WHERE numero=:txtid");
        $stm->bindparam(":txtid",$txtid);
        $stm->execute();
        $registro = $stm->fetch(PDO::FETCH_LAZY);
        $nombre = $registro['nombre'];
        $carrera = $registro['carrera'];
        $no_cuenta = $registro['no_cuenta'];
        $direccion = $registro['direccion'];
        $telefono = $registro['telefono'];
        $email = $registro['email'];
        $password = $registro['password'];
        $fecha = $registro['fecha_registro'];
        $permisos = $registro['permisos'];

    } 

    if($_POST){
        $txtid = $_POST["txtid"];
        $nombre = $_POST["nombre"];
        $carrera = $_POST["carrera"];
        $no_cuenta = $_POST["no_cuenta"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $permisos = $_POST["permisos"];
        $fecha = $_POST["fecha"];
        //Adaptamos la Fecha para nuestra DataBase
        $fechaHoraObj = date_create($fecha);
        $newfecha = date_format($fechaHoraObj, 'Y-m-d H:i:s');

        $conexion->exec("USE $db_name");
        $stm=$conexion->prepare("UPDATE persona SET nombre_usuario=:nombre_usuario, carrera=:carrera, 
        no_cuenta=:no_cuenta, direccion=:direccion, telefono=:telefono, email=:email, password=:password, 
        fecha_registro=:fecha_registro, permisos=:permisos WHERE numero=:txtid");
        
        $stm->bindParam(":txtid",$txtid);
        $stm->bindParam(":nombre_usuario",$nombre);
        $stm->bindParam(":carrera",$carrera);
        $stm->bindParam(":no_cuenta",$no_cuenta);
        $stm->bindParam(":direccion",$direccion);
        $stm->bindParam(":telefono",$telefono);
        $stm->bindParam(":email",$email);
        $stm->bindParam(":password",$password);
        $stm->bindParam(":fecha_registro",$newfecha);
        $stm->bindParam(":permisos",$permisos);
        $stm->execute();

        header("location: inicio.php");
    }
?>

<!-- Modal -->
<div class="modal fade" id="editar<?php echo $conm['numero']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="editar.php?<?php echo $conm["numero"]; ?>" method="post">
      <input type="hidden" class="form-control" name="txtid" value="<?php echo $conm["numero"]; ?>" required placeholder="Ingresa el Nombre">
      <div class="modal-body">
        
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $conm["nombre_usuario"]; ?>" required placeholder="Ingresa el Nombre">

        <label for="">Carrera</label>
        <input type="text" class="form-control" name="carrera" value="<?php echo $conm["carrera"]; ?>" required placeholder="Ingresa la Carrera">

        <label for="">Número de cuenta</label>
        <input type="number" class="form-control" name="no_cuenta" value="<?php echo $conm["no_cuenta"]; ?>" required placeholder="Ingresa el Número de Cuenta">

        <label for="">Direccion</label>
        <input type="text" class="form-control" name="direccion" value="<?php echo $conm["direccion"]; ?>" required placeholder="Ingresa la Dirección">

        <label for="">Teléfono</label>
        <input type="number" class="form-control" name="telefono" value="<?php echo $conm["telefono"]; ?>" required placeholder="Ingresa el Teléfono">

        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $conm["email"]; ?>" required placeholder="Ingresa el Email">

        <label for="">Contraseña</label>
        <input type="password" class="form-control" name="password" value="<?php echo $conm["password"]; ?>" required placeholder="Ingresa la Contraseña">

        <label for="">Fecha de Registro</label>
        <input type="datetime-local" class="form-control" name="fecha" value="<?php echo $conm["fecha_registro"]; ?>" required>

        <label for="">Permisos</label>
        <input type="text" class="form-control" name="permisos" value="<?php echo $conm["permisos"]; ?>" required placeholder="Ingresa los Permisos">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
