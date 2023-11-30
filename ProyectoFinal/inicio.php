<?php   

    include("conexion.php");

    $conexion->exec("USE $db_name");
    $stm = $conexion->prepare("SELECT * FROM persona");
    $stm->execute();
    $con = $stm->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("cabecera.php"); ?>

<div class="insert">
<p>¿Deseas agregar un nuevo registro? </p>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregar">
Agregar
</button>
</div>

<style>
    .insert{
        text-align: center;
    }
</style>

<div>
    <?php include("agregar.php"); ?>
</div>
<div class="table-responsive">
    <br><table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Carrera</th>
                <th>Número de Cuenta</th>
                <th>Direccion</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Fecha de Registro</th>
                <th>Permisos</th>
                <th>Acciones</th>
            </tr>
        </theadclass>
        <tbody>
            <?php foreach($con as $conm){  ?>
            <tr class="">
                <td scope="row"><?php echo $conm['numero'];?></td>
                <td><?php echo $conm['nombre_usuario'];?></td>
                <td><?php echo $conm['carrera'];?></td>
                <td><?php echo $conm['no_cuenta'];?></td>
                <td><?php echo $conm['direccion'];?></td>
                <td><?php echo $conm['telefono'];?></td>
                <td><?php echo $conm['email'];?></td>
                <td><?php echo $conm['password'];?></td>
                <td><?php echo $conm['fecha_registro'];?></td>
                <td><?php echo $conm['permisos'];?></td>
                <td>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editar<?php echo $conm['numero']; ?>">
                Editar
                </button>

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $conm['numero']; ?>">
                Eliminar
                </button>

                </td>
            </tr>
            <?php include("eliminar.php"); ?>
            <?php include("editar.php"); ?>
                
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>