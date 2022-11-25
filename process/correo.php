<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
include('conexion.php');

$mail = new PHPMailer(true);
$id = $_POST['id'];
$Correo = $_POST['email'];

function getToken($len)
{
    $t0k3n = "";
    $cadena = bin2hex(openssl_random_pseudo_bytes(16));
    //FUNCION FOR PARA GENERAR EL ARREGLO
    for ($i = 0; $i < $len; $i++) {
        $t0k3n .= $cadena[rand(0, $len)];
    }
    return $t0k3n;
}
$tok = getToken(6);
$token = mb_strtoupper($tok);

//PROCESO DE ALMACENADO EN LA BASE DE DATOS
$conectar = new Conexion();
$link = $conectar->conectar();
date_default_timezone_set('America/Mexico_City');
$Fecha = date("F j, Y, g:i a");
$copy = date("Y");

$sql = "SELECT * FROM egegresado  WHERE  EgID = $id";
$query = mysqli_query($link, $sql);
$num_rows = mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query)) {
    $nombre = $row['EgNombre'];
    $apellido = $row['EgApPaterno'];
}

$insertar = "INSERT INTO validacion ( ID_Usuario, Token, Fecha, Correo) VALUES ('$id','$token','$Fecha','$Correo')";
$ejecutar = mysqli_query($link, $insertar);
//PROCEDIMIENTO DE ENVIO DEL CORREO
//GUARDAMOS EL VALOR OBTENIDO DEL ARREGLO EN LA VARIABLE T0K3N NOMBRADA ASI PARA DIFERENCIARLA
if (isset($_POST['enviar'])) {
    $captcha_response = true;
    $recaptcha = $_POST['g-recaptcha-response'];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6Ldt-YQhAAAAANNyrrXlB6cWdMGqZlzWPCf4DLBB',
        'response' => $recaptcha
    );
    $options = array(
        'http' => array(
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);
    $captcha_response = $captcha_success->success;

    if ($captcha_response) {
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
            $mail->addAddress($Correo, $Correo); //'usuario ingresado', 'Para: Usuario ingresado'
            //CONTENIDO DEL CORREO A ENVIAR
            $mail->isHTML(true);
            $mail->Subject = 'Validacion de su correo electronico';
            $mail->Body =
                "<table width='100%'>
            <tbody>
                <tr>
                    <td>
                        <img src='http://20.120.154.2/Sistema-egresados/img/logo.png' alt='logo' width='130' height='80'
                            style='text-align:left' />
                    </td>
                    <td>
                        <img src='http://20.120.154.2/Sistema-egresados/img/logo-itcancun.png' alt='logo' width='60'
                            height='95' style='text-align:right' />
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table style='text-align:center' width='90%'>
            <thead style='background: #FAFAFA;'>
                <tr>
                    <td>
                    <p style='text-align:center'> Hola $nombre $apellido bienvenido al sistema de egresados del TECNM<br>
                    para continuar con la actualización de tus datos:<br>
                    <a style='background-color: '#314771'; color: 'white'; padding: '15px 25px'; text-decoration: 'none';'
                    href='http://20.120.154.2/Sistema-egresados/validacion.php?id=$id&token=$token'>
                    Ingresa a este link para obtener tu token</a>
                    </p>
                    <a style='background-color: '#314771'; color: 'white'; padding: '15px 25px'; text-decoration: 'none';'
                    href='http://20.120.154.2/Sistema-egresados/validacion.php?id=$id&token=$token'><br>
                    <img src='http://20.120.154.2/Sistema-egresados/img/token.png' alt='logo' width='390' height='240'
                            style='text-align:center' /><br>
                    </td>
            </thead>
        </table>
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
                                <a style='text-decoration:none;' 
                                    href='https://www.cancun.tecnm.mx' target='_blank'>Política de privacidad y manejo de datos
                                    personales</a>
                            </p>

            </tbody>
            </thead>
        </table>";
            $mail->send();

            //REGRESAR A LA PANTALLA PRINCIPAL DESPUES DE EJECUTAR EL PROCEDIMIENTO
            sleep(3);
            header("Location: ../espera.php");
        } catch (Exception $e) {
            echo 'Mensaje ' . $mail->ErrorInfo;
        }
    } else {
        sleep(3);
        // Se abre una sesión.


        header("Location: ../token.php?error=true");
    }
}
