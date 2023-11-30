<?php 

    include("conexion.php");

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
        //Adaptamos la Fecha para nuestra DataBase
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

        echo '<script>window.location.href = "index.php";</script>';
        exit;
    }
?>

    <?php include("cabecera.php") ?>
      
    <form action="" method="post">
      <div class="body">

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
      <div class="footer">
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      </form>

      <?php include("footer.php") ?>
