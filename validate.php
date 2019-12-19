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

    $sql = "insert into `prendas` (nombre,talla,precio) values (?,?,?)";
    $resultado = $mysqli->prepare($sql);

    if(!$resultado->bind_param("sii",$nombre,$talla,$precio)) {
        echo "error en la vincualcion {$mysqli->error}";
    }

    if(!$resultado->execute()) {
        echo "error en la ejecucion {$mysqli->error}";
    }


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

<h1>validate</h1>

<?php

if($resultado) {
    echo "Agregado Correctamente";
} else {
    echo "Error de {$mysqli->error}";
}

?>

<a href="form.php" class="btn btn-danger"><span class="fa fa-arrow-left"></span> volver</a>
<a href="table.php" class="btn btn-primary"><span class="fa fa-arrow-right"></span> ver registro</a>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/icons/all.min.js"></script>
</body>
</html>