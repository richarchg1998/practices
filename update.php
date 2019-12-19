<?php

require_once "conection.php";

$id = $_GET["id"];
$nombre = $_GET["nombre"];

// $sql = "update `prendas` set `nombre` = $nombre where id = $id";

$sql = "UPDATE `prendas` SET ";   
$sql .= "`nombre`= '{$nombre}', "; 
$sql .= "WHERE `id` = {$id}";


$resultado = $mysqli->query($sql);

try {

}catch (Exception $e) {
    echo "Error de catch:: {$e->getMessage()}";
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

<h1>update</h1>


<?php

if($resultado) {
    echo "correcto";
} else {
    echo "error de {$mysqli->error} ";
}

?>


<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/icons/all.min.js"></script>
</body>
</html>