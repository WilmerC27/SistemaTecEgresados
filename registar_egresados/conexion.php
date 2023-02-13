<?php
 class Conexion {
    function conectar(){
        $servidor="localhost";
        $usuario="root";
        $contrasenia="";
        $bd="egresados";
            $con = mysqli_connect($servidor,$usuario,$contrasenia,$bd) or die("No se ha podido conectar al servidor");
            $con->set_charset('utf8');
            mysqli_set_charset($con, "utf8");
        return $con;
    }
}


?>