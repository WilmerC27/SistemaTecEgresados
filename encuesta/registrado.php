<?php

include("../process/conexion.php");

$id = $_POST['control'];
$fecha = $_POST['fecha'];
$conectar = new Conexion();
$con = $conectar->conectar();

$sql = "SELECT * FROM egegresado  WHERE  EgControl = $id";
$query = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query)) {
    $nombre = $row['EgNombre'];
    $paterno = $row['EgApPaterno'];
    $materno = $row['EgApMaterno'];
    $matricula = $row['EgControl'];
}
$encuestado = 1;
$sql = "INSERT INTO egform (EgControl,EgNombre,Encuesta,Fecha) Values ('$matricula','$nombre $paterno $materno','$encuestado','$fecha')";
$query = mysqli_query($con, $sql);

sleep(4);
header("Location: index.php");
