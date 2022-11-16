<?php

include("../process/conexion.php");
$conectar = new Conexion();
$con = $conectar->conectar();

$id = $_POST['ID_Alumno'];
$nombre = $_POST['Nombre'];
$apellidopaterno = $_POST['Apellido_P'];
$apellidomaterno = $_POST['Apellido_M'];
$curp = $_POST['Curp'];
$fecha = $_POST['FechaNac'];
$codigo = $_POST['CodTel'];
$telefono = $_POST['Num_Tel'];
$correo = $_POST['Correo'];


$sql = "UPDATE EgEgresado SET  EgCodigoTel='$codigo',EgTel='$telefono',EgEmail='$correo', EgCurp='$curp',EgFNac='$fecha' WHERE EgID='$id'";
$query = mysqli_query($con, $sql);

sleep(4);
header("Location: comprobacion.php?id=".urlencode($id));
?>
<style>
    a {
        text-decoration: none;
    }
</style>