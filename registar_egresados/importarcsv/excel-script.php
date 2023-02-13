 <?php
    require 'conexion.php';
    $conexion = new Conexion();
    $con = $conexion->conectar();
    
    if ($_FILES['excel']['name']) {
        $arrFileName = explode('.', $_FILES['excel']['name']);
        if ($arrFileName[1] == 'csv') {
            $handle = fopen($_FILES['excel']['tmp_name'], "r");
            $conta = 0;
            while (($data = fgetcsv($handle, 1000, ',')) != false) {

                    $name = chop(ltrim(mb_strtoupper($con->real_escape_string($data[0]),'latin1')));
                    $lastName =chop(ltrim(mb_strtoupper($con->real_escape_string($data[1]),'latin1')));
                    $lastName2 =chop(ltrim(mb_strtoupper($con->real_escape_string($data[2]),'latin1'))) ;
                    //$lastName  = strtoupper($con->real_escape_string($data[1])); 
                    //$lastName2 = strtoupper($con->real_escape_string($data[2])); 
                    
                    $email = chop(ltrim($con->real_escape_string($data[3]))) ;
                    if( !empty($data[4]) ){$codtel = chop(ltrim($con->real_escape_string($data[4]))) ; }else { $data[4]=521;   $codtel=$data[4];}
                    $telefono = chop(ltrim($con->real_escape_string($data[5]))) ;
                    $matricula = chop(ltrim(strtoupper($con->real_escape_string($data[6])))); 
                    $curp =chop(ltrim(strtoupper($con->real_escape_string($data[7])))) ;
                    $fecha =  implode('-', array_reverse(explode('/', $data[8])));//invierte la fecha, elimina los guiones y le agrega diagonales donde estaban los guines
                    $fechaNac = chop(ltrim(date($fecha)))  ;
                    $carrera = chop(ltrim($con->real_escape_string($data[9]))) ;
                    $inGen = chop(ltrim( $con->real_escape_string($data[10])));
                    $inPer = chop(ltrim($con->real_escape_string($data[11]))) ;
                    $finGen = chop(ltrim($con->real_escape_string($data[12]))) ;
                    $finPe =chop(ltrim( $con->real_escape_string($data[13])));
                    $planEstudio = chop(ltrim(strtoupper($con->real_escape_string($data[14]))));

                    //foreach ($data as $key ) {
                      //  echo "</br>". $key;
                    //}

                        $query = "SELECT EgControl FROM EgEgresado WHERE EgControl='".$matricula."' ";
                        $sql=mysqli_query($con,$query);
                        $numRegis = mysqli_num_rows($sql);
                            if ($numRegis<=0) {
                                if($matricula=="") {//comprueba que los datos no esten vacios
                                    
                                } else {
                                    $mainQuery = "INSERT INTO EgEgresado(EgNombre,EgApPaterno,EgApMaterno,EgEmail,EgCodigoTel,EgTel,EgControl,EgCurp,EgFNac,EgCarrera,EgInicioGeneracion,EgInicioPeriodo,EgFinGeneracion,EgFinPeriodo,EgPlanEstudio) VALUES('$name','$lastName','$lastName2','$email','$codtel','$telefono','$matricula','$curp','$fechaNac','$carrera','$inGen','$inPer','$finGen','$finPe','$planEstudio')";
                                    $query = mysqli_query($con, $mainQuery); 
                                    echo $conta++;    
                                }
                                }                                
        }
        }
    }

   ?>

