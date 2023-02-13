<?php 
    require 'conexion.php';
    $conectar=new Conexion();
    $con = $conectar->conectar();
    
    $eg_id=chop(ltrim(strtoupper(htmlspecialchars( $_POST['matricula'],ENT_QUOTES,'UTF-8'))));
    $nombre=chop(ltrim(mb_strtoupper(htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8'))));
    $apellidopaterno= chop(ltrim(mb_strtoupper(htmlspecialchars($_POST['apellido_p'],ENT_QUOTES,'UTF-8'))));
    $apellidomaterno= chop(ltrim(mb_strtoupper(htmlspecialchars($_POST['apellido_m'],ENT_QUOTES,'UTF-8'))));
    $correo=chop(ltrim(htmlspecialchars($_POST['correo'],ENT_QUOTES,'UTF-8')));
    $codtel=chop(ltrim(strtoupper(htmlspecialchars($_POST['CodTel'],ENT_QUOTES,'UTF-8'))));
    $telefono=chop(ltrim(strtoupper(htmlspecialchars($_POST['num_tel'],ENT_QUOTES,'UTF-8'))));
    $curp=chop(ltrim(strtoupper(htmlspecialchars($_POST['curp'],ENT_QUOTES,'UTF-8'))));
    $fechanac=chop(ltrim(strtoupper(htmlspecialchars($_POST['nacimiento'],ENT_QUOTES,'UTF-8'))));
    $carrera=chop(ltrim(strtoupper(htmlspecialchars($_POST['carrera'],ENT_QUOTES,'UTF-8'))));
    $ingeneracion=chop(ltrim(strtoupper(htmlspecialchars($_POST['InGeneracion'],ENT_QUOTES,'UTF-8'))));
    $inperiodo=chop(ltrim(strtoupper(htmlspecialchars($_POST['InPeriodo'],ENT_QUOTES,'UTF-8')))) ;
    $fingeneracion=chop(ltrim(strtoupper(htmlspecialchars($_POST['FinGeneracion'],ENT_QUOTES,'UTF-8'))));
    $finperiodo=chop(ltrim(strtoupper(htmlspecialchars($_POST['FinPeriodo'],ENT_QUOTES,'UTF-8'))));
    $planestudio=chop(ltrim(strtoupper(htmlspecialchars($_POST['PlanEstudio'],ENT_QUOTES,'UTF-8'))));

    if (repetirDatos($eg_id,$con)==1) {
    echo 2;
    }else{  
    echo 1;
    }

    function repetirDatos($matri,$con){
    $sql2="SELECT * FROM EgEgresado WHERE EgControl='$matri'";
    $result=mysqli_query($con,$sql2);
    if (mysqli_num_rows($result)>0) {
    return 1;
    }else{
    return 0;
    }
    } 



?>
