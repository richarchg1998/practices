<?php

require_once "conection.php";

if(isset($_GET["id"])) {
    $id = $_GET["id"];
}

if(isset($_GET["nombre"])) {
    $nombre = $_GET["nombre"];
}

if(isset($_GET["talla"])) {
    $talla = $_GET["talla"];
}

if(isset($_GET["precio"])) {
    $precio = $_GET["precio"];
}

try {


    $sql = "select * from `prendas` where `id` = {$id} ";
    $resultado = $mysqli->query($sql);


}catch (Exception $e) {
    echo "Error de {$e->getMessage()}";
}



?>

<!doctype html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>edit</h1>


<form action="update.php" class="form col-6 ml-auto mr-auto" method="get">

    <?php
    while ($fila = $resultado->fetch_assoc()) {
        ?>

        <div class="form-group"><input type="text" class="form-control" placeholder="nombre" name="nombre" value="<?php echo $fila["nombre"] ?>"></div>
        <div class="form-group"><input type="text" class="form-control" placeholder="talla" name="talla" value="<?php echo $fila["talla"] ?>"></div>
        <div class="form-group"><input type="text" class="form-control" placeholder="precio" name="precio" value="<?php echo $fila["precio"] ?>"></div>
        <div class="form-group"><input type="hidden" class="form-control" name="id" value="<?php echo $fila["id"] ?>"></div>
        <div class="form-group"><input type="submit" class="btn btn-primary" value="Agregar"></div>

        <?php
    }
    ?>

</form>

<?php

if($resultado) {
    echo "Mirando";
} else {
    echo "Error de {$mysqli->error}";
}

?>


<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/icons/all.min.js"></script>
</body>
</html>