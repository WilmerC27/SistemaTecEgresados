<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include('conexion.php');

$mail = new PHPMailer(true);

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
$token=mb_strtoupper($tok);

//PROCESO DE ALMACENADO EN LA BASE DE DATOS
$conectar = new Conexion();
$link = $conectar->conectar();
$ID_T = '';
$ID_Usuario = rand(1, 999);
date_default_timezone_set('America/Mexico_City');
$Fecha = date("F j, Y, g:i a");
$insertar = "INSERT INTO validacion ( ID_Usuario, Token, Fecha, Correo) VALUES ('$ID_Usuario','$token','$Fecha','$Correo')";
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
        'http' => array (
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
            $mail->Host = 'smtp-mail.outlook.com'; //llave del host
            $mail->SMTPAuth = true;
            $mail->Username = 'l18530441@cancun.tecnm.mx';
            $mail->Password = 'To2RpTo2.';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //llave del host
            $mail->Port = 587; //puerto del host
            //SECCIÓN DE ASIGNACIÓN DE USUARIOS A ENVIAR EL CORREO
            $mail->setFrom('l18530441@cancun.tecnm.mx', 'Sistema de egresados del TECNM'); //'usuario conectado al host','Nombre del dpto que envia el correo'
            $mail->addAddress($Correo, $Correo); //'usuario ingresado', 'Para: Usuario ingresado'
            //CONTENIDO DEL CORREO A ENVIAR
            $mail->isHTML(true);
            $mail->Subject = 'Validacion de su correo electronico';
            $mail->Body = "<a href='https://proyectoexal.000webhostapp.com/validacion.php?id=$token'>Ingresa a este link para obtener tu token</a>";
            $mail->send();
        
            //REGRESAR A LA PANTALLA PRINCIPAL DESPUES DE EJECUTAR EL PROCEDIMIENTO
            sleep(3);
            header("Location: validacion.php?enviado=true");
        } catch (Exception $e) {
            echo 'Mensaje ' . $mail->ErrorInfo;
        }
    } else {
        sleep(3);
        header("Location: token.php?error=true");
    }
}
