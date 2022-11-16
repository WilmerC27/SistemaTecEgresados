<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ('../vendor/autoload.php');
include('conexion.php');

$mail = new PHPMailer(true);
$id = $_GET['id'];

//PROCESO DE ALMACENADO EN LA BASE DE DATOS
$conectar = new Conexion();
$link = $conectar->conectar();
date_default_timezone_set('America/Mexico_City');
$copy = date ("Y");
$sql = "SELECT * FROM egegresado  WHERE  EgID = $id";
$query = mysqli_query($link, $sql);
$num_rows = mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query)) {
    $nombre = $row['EgNombre'];
    $apellido = $row['EgApPaterno'];
    $Correo = $row['EgEmail'];
}

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
                    <p style='text-align:center'> Hola $nombre $apellido muchas gracias tus datos han sido actualizado correctamente.<br>
                    <p style='text-align:center'> De igual forma te hacemos una extensa invitación a participar en el evento<br>
                    'Ceremonia de egresados 2022' que se realizará el día viernes 25 de noviembre a las 19:00<br>
                    la ubicación es en la planta alta del centro de información (biblioteca) de nuestra casa de estudios<br>
                    Te pedimos de favor que nos ayudes a llenar la siguiente encuesta<br>
                    antes del día de la ceremonia como pre-registro y actualización de tus datos.</p>
                    <p style='text-align:center'>¡Muchisimas gracias te esperamos no faltes.!</p>
                    <a style='background-color: '#314771'; color: 'white'; padding: '15px 25px'; text-decoration: 'none';'
                    href='https://forms.office.com/r/ymphLrziRX'>
                    FORMULARIO</a>
                    </p>
                    <p style='text-align:center'> Está invitado a completar CUESTIONARIO DE ACTUALIZACIÓN DE EGRESADOS - 12 MESES<br>
                    solo tardará 20 minutos en completarlo. Envíe su respuesta antes del 22/11/2022. 
                    Gracias</p>
                    </p>
                        <img src='http://20.120.154.2/Sistema-egresados/img/QR.jpeg' alt='logo' width='250' height='250'
                            style='text-align:center' />
                    </td><br>
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
            header("Location: ../index.php");
        } catch (Exception $e) {
            echo 'Mensaje ' . $mail->ErrorInfo;
        }