<?php

require_once "conection.php";

if(isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
}

if(isset($_POST["talla"])) {
    $talla = $_POST["talla"];
}

if(isset($_POST["precio"])) {
    $precio = $_POST["precio"];
}


try {

    $sql = "select * from `prendas`";
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

<h1>table</h1>

<table class="table table-hover table-bordered">

    <thead>
    <tr>
        <th>nombre</th>
        <th>talla</th>
        <th>precio</th>
        <th>editar / borrar</th>
    </tr>
</thead>

    <tbody>

    <?php
    while($fila = $resultado->fetch_assoc()) {
        ?>

        <tr>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["talla"]; ?></td>
            <td><?php echo $fila["precio"]; ?></td>
            <td><a href="edit.php?id=<?php echo $fila["id"] ?>" class="btn btn-primary"><span class="fa fa-edit"></span> editar</a>
                <a href="delete.php?id=<?php echo $fila["id"] ?>" class="btn btn-danger"><span class="fa fa-trash"></span> borrar</a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

</table>

<?php

if($resultado) {
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