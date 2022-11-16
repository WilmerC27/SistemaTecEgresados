<?php 

include("../process/conexion.php");
$conectar = new Conexion();
$con = $conectar->conectar();

$sql = "SELECT * FROM egegresado  WHERE  EgID = $name";
$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($query)) {
    $nombre = $row['EgNombre'];
    $paterno = $row['EgApPaterno'];
    $materno = $row['EgApMaterno'];
    $matricula = $row['EgControl'];
    $correo = $row['EgEmail'];
    $telefono = $row['EgTel'];
}

?>

