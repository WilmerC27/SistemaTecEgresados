<?php

include("conexion.php");
$conectar = new Conexion();
$con = $conectar->conectar();
date_default_timezone_set('America/Mexico_City');

$id = $_POST['id'];
$nombre = $_POST['Nombre'];
$apellidopaterno = $_POST['Apellido_P'];
$apellidomaterno = $_POST['Apellido_M'];
$curp = $_POST['Curp'];
$fecha = $_POST['FechaNac'];
$codigo = $_POST['CodTel'];
$telefono = $_POST['Num_Tel'];
$correo = $_POST['Correo'];
$update = date("Y-m-d H:i:s", time());


$sql = "UPDATE EgEgresado SET  EgCodigoTel='$codigo',EgTel='$telefono',EgEmail='$correo', EgCurp='$curp',EgFNac='$fecha', EgFechaActualizacion='$update' WHERE EgID='$id'";
$query = mysqli_query($con, $sql);
$delete = "DELETE FROM Validacion WHERE ID_Usuario=$id";
$query2 = mysqli_query($con, $delete);
sleep(3);
header("Location: finalizacion.php?id=". urlencode($id));
?>
<style>
    a {
        text-decoration: none;
    }
</style>