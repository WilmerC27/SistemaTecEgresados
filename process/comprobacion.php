<?php
ob_start();
include('conexion.php');
$conectar = new Conexion();
$con = $conectar->conectar();
$id = $_POST['id'];
$token = $_POST['code'];

$sql = "SELECT Token FROM validacion WHERE Token = '$token'";
$query = mysqli_query($con, $sql);
sleep(3);
while ($fila = mysqli_fetch_row($query)) {
    $fila['Token'];
    header("Location: ../actualizaralumno.php?id=".urlencode($id));
    return;
}
sleep(3);
header("Location: ../validacion.php?error=true&id=". urlencode($id));
ob_end_flush();   