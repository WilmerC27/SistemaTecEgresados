<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
include("../process/conexion.php");
$name = $_GET['id'];
$status = $_GET['status'];
$conectar = new Conexion();
$con = $conectar->conectar();
$mail = new PHPMailer(true);
$estado = '';

switch ($status) {
    case 1:
        $estado = "P";
        break;
    case 2:
        $estado = "N_T";
        break;
    case 3:
        $estado = "T";
        break;
}
$sql = "SELECT * FROM egegresado  WHERE  EgID = $name";
$query = mysqli_query($con, $sql);

$num_rows = mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query)) {
    $nombre = $row['EgNombre'];
    $paterno = $row['EgApPaterno'];
    $materno = $row['EgApMaterno'];
    $matricula = $row['EgControl'];
    $correo = $row['EgEmail'];
    $telefono = $row['EgTel'];
}
date_default_timezone_set('America/Mexico_City');
$fecha = date("F j, Y, g:i a");
$asistencia = 1;

if ($correo === '' or $telefono === '') {
    header("Location: editar.php?id=" . urlencode($name));
} else {

    $sql = "INSERT INTO egasistencia (EgNombre, EgApPaterno, EgApMaterno, EgControl, EgEmail, EgTelefono, Asistencia, FechaAsist) VALUES ('$nombre', '$paterno', '$materno', '$matricula', '$correo', '$telefono', '$asistencia', '$fecha')";
    $ejecutar = mysqli_query($con, $sql);

    $sql = "UPDATE EgEgresado SET  Titulacion ='$estado' WHERE EgID = $name";
    $ejecutar = mysqli_query($con, $sql);

    try {
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'smtp-mail.outlook.com'; //llave del host
        $mail->SMTPAuth = true;
        $mail->Username = 'comite_egresados@cancun.tecnm.mx';
        $mail->Password = 'Com-voc-70';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //llave del host
        $mail->Port = 587; //puerto del host
        //SECCIÓN DE ASIGNACIÓN DE USUARIOS A ENVIAR EL CORREO
        $mail->setFrom('comite_egresados@cancun.tecnm.mx', 'Sistema de egresados del TECNM'); //'usuario conectado al host','Nombre del dpto que envia el correo'
        $mail->addAddress($correo, $correo); //'usuario ingresado', 'Para: Usuario ingresado'
        //CONTENIDO DEL CORREO A ENVIAR
        $mail->isHTML(true);
        $mail->Subject = 'Confirmacion de asistencia';
        $mail->Body =
            "<table width='100%' height='80'>
    <tbody>
        <tr>
            <td>
                <img src='http://20.120.154.2/Sistema-egresados/img/logo.png' alt='logo' width='140' height='90'
                    style='text-align:left' />
            </td>
            <td>
                <img src='http://20.120.154.2/Sistema-egresados/img/logo-itcancun.png' alt='logo' width='70'
                    height='105' style='text-align:right' />
            </td>
        </tr>
    </tbody>
</table>

<table style='text-align:center'width='90%'>
    <thead style='background: #FAFAFA;'>
        <tr>
            <td> 
            <p style='text-align:center'>Hola $nombre $paterno! </p>
            <p style='text-align:center'>BIENVENIDO AL EVENTO PARA LOS ALUMNOS EGRESADOS DEL TECNM CAMPUS CANCUN<br>
            <a style='background-color: '#314771'; color: 'white'; padding: '15px 25px'; text-decoration: 'none';'
                    href='https://forms.office.com/r/ymphLrziRX'>
                    FORMULARIO</a>
            </p>
            <img src='http://20.120.154.2/Sistema-egresados/img/QR.jpeg' alt='logo' width='250' height='250'
                            style='text-align:center' />
            </td>
        </tr>
    </thead>
</table>
<br>
<!--- Division de texto con el copyright -->
<table width='90%' style='text-align:center'>
    <tbody>
        <thead style='background: #FAFAFA;'>
            <tr>
                <td>
                    <p style='text-align:center'>Instituto Tecnológico de Cancún - Algunos derechos
                        reservados&copy;$copy<br>
                        Av. Kabah, Km. 3 Cancún Quintana Roo México C.P. 77515, Col. Centro<br>
                        Teléfono: 01 (998) 8-80-74-32<br>
                        <a href='https://www.cancun.tecnm.mx' target='_blank'>Política de privacidad y manejo de datos
                            personales</a>
                    </p>
    </tbody>
    </td>
    </tr>
    </thead>
</table>";
        $mail->send();

        //REGRESAR A LA PANTALLA PRINCIPAL DESPUES DE EJECUTAR EL PROCEDIMIENTO
        header("Location: index.php");
    } catch (Exception $e) {
        echo 'Mensaje ' . $mail->ErrorInfo;
    }
}
