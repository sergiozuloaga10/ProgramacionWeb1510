<?php 
    $url_base = "http://serchserver.lovestoblog.com/";

    include("conexion.php");

    if($_POST){
        $no_cuenta = $_POST["no_cuenta"];
        $password = $_POST["password"];

        $conexion->exec("USE $db_name");
        $stm = $conexion->prepare("SELECT * FROM persona WHERE no_cuenta=:no_cuenta AND password=:password");
        $stm->bindParam(":no_cuenta",$no_cuenta);
        $stm->bindParam(":password",$password);

        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            header("Location: inicio.php");
            exit();
        } else {
            // Credenciales incorrectas
            echo "<p class='pp'>Usuario o contraseña incorrectos.</p>
            <style>.pp{ padding: 15px;
                background-color: #e74c3c;
                color: #fff;
                border-radius: 5px;}</style>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="style.css">
    <title>Inicio</title>
    <link rel="icon" href="img/i.png" type="image/x-icon">

</head>
<body>
<form action="" method="post">
    <div class="ventana">
        <br>
        <label for="numero_cuenta">Número de Cuenta</label><br>
        <input type="text" name="no_cuenta" required placeholder="Número de cuenta" class="tamaño">
        <br><br>
        <label for="contraseña" >Contraseña</label><br>
        <input type="password" name="password" required placeholder="Contraseña" class="tamaño">
        <br>
        <button class="b1" type="submit">Entrar</button>
        <br>
        <p>¿No estás registrado? <a  href="<?php echo $url_base;?>registrarse.php">Regístrate aquí</a> </p> 
        <br>
    </div>
    </form>
</body>
</html>