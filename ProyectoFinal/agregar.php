<?php 
    if($_POST){
        $nombre = $_POST["nombre"];
        $carrera = $_POST["carrera"];
        $no_cuenta = $_POST["no_cuenta"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $permisos = $_POST["permisos"];
        $fecha = $_POST["fecha"];
        
        $fechaHoraObj = date_create($fecha);
        $newfecha = date_format($fechaHoraObj, 'Y-m-d H:i:s');

        $conexion->exec("USE $db_name");
        $stm=$conexion->prepare("INSERT INTO persona(nombre_usuario, carrera, no_cuenta, direccion, telefono, email, password, fecha_registro, permisos)
        VALUES(:nombre_usuario,:carrera,:no_cuenta,:direccion,:telefono,:email,:password,:fecha_registro,:permisos)");
        
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

        echo '<script>window.location.href = "inicio.php";</script>';
        exit;
    }
?>
<!-- Modal -->
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">

        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" required placeholder="Ingresa el Nombre">

        <label for="">Carrera</label>
        <input type="text" class="form-control" name="carrera" required placeholder="Ingresa la Carrera">

        <label for="">Número de cuenta</label>
        <input type="number" class="form-control" name="no_cuenta" required placeholder="Ingresa el Número de Cuenta">

        <label for="">Direccion</label>
        <input type="text" class="form-control" name="direccion" required placeholder="Ingresa la Dirección">

        <label for="">Teléfono</label>
        <input type="number" class="form-control" name="telefono" required placeholder="Ingresa el Teléfono">

        <label for="">Email</label>
        <input type="text" class="form-control" name="email" required placeholder="Ingresa el Email">

        <label for="">Contraseña</label>
        <input type="password" class="form-control" name="password" required placeholder="Ingresa la Contraseña">

        <label for="">Fecha de Registro</label>
        <input type="datetime-local" class="form-control" name="fecha" required>

        <label for="">Permisos</label>
        <input type="text" class="form-control" name="permisos" required placeholder="Ingresa los Permisos">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
      </form>
    </div>
  </div>
</div>