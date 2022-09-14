<?php
include('conexion.php');
$conectar = new Conexion();
$con = $conectar->conectar();

$token = $_POST['code'];

$sql = "SELECT Token FROM validacion WHERE Token = '$token'";
$query = mysqli_query($con, $sql);
sleep(3);
while ($fila = mysqli_fetch_row($query)) {
    $fila['Token'];
    header("Location: actualizaralumno.php");
    return;
}
sleep(3);
header("Location: validacion.php?error=true");
