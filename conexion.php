<?php
class Conexion
{
    function conectar()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $bd = "egresados";
        $con = mysqli_connect($host, $user, $pass);
        mysqli_select_db($con, $bd);
        return $con;
    }
}
