    <?php
    include './includes/templates/header.php';
    include("conexion.php");
    
    session_start();
    
    $conectar = new Conexion();
    $con = $conectar->conectar();
    $name = $_POST['nombre'];
    $last = $_POST['ap_p'];
    $second = $_POST['ap_m'];
    if ($name == '' && $last == '' && $second == '') {
        header("Location: index.php");
    }
//Realizamos la busqueda del egresado con los datos obtenidos por el usuario
    $sql = "SELECT * FROM egegresado  WHERE  EgNombre LIKE '%$name%' and EgApPaterno LIKE '%$last%' and EgApMaterno LIKE '%$second%'";
    $query = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($query);
//Realizamos una consulta para obtener en un string la carrera que cursó el egresado
    $carrera = "SELECT * FROM egegresado  WHERE  EgNombre LIKE '%$name%' and EgApPaterno LIKE '%$last%' and EgApMaterno LIKE '%$second%'";
    $execute = mysqli_query($con, $carrera);
    if ($wor = mysqli_fetch_array($execute)) {
        $arr = $wor['EgCarrera'];
    }
//Realizamos nuevamente una consulta para obtener el nombre de la carrera
    $consulta = "SELECT * FROM egcarreras WHERE EgIdCarrera = $arr";
    $query2 = mysqli_query($con, $consulta);

    ?>
    <div class="col-12 col-lg-10 col-xl-8 mt-4 mb-4 px-3">
        <?php if ($num_rows >= 1) { ?>
            <div class=" table-responsive">
                <table class="table ">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th>No. CONTROL</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO PATERNO</th>
                            <th>APELLIDO MATERNO</th>
                            <th>CARRERA</th>
                            <th>LADA</th>
                            <th>TELÉFONO</th>
                            <th>CORREO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                            $_SESSION['EgID']= $row['EgID'];
                            $ID = $_SESSION['EgID'];
                            while ($name = mysqli_fetch_array($query2)) {
                            
                        ?>
                            
                                <tr class="text-center align-middle">
                                    <td><?php echo $row['EgControl'] ?></td>
                                    <td><?php echo $row['EgNombre'] ?></td>
                                    <td><?php echo $row['EgApPaterno'] ?></td>
                                    <td><?php echo $row['EgApMaterno'] ?></td>
                                    <td><?php echo $name['EgCNombre'] ?></td>
                                    <td><?php echo $row['EgCodigoTel'] ?></td>
                                    <td><?php echo $row['EgTel'] ?></td>
                                    <td><?php echo $row['EgEmail'] ?></td>
                                    <!-- <td><?php echo $row['Pass'] ?></td>-->
                                    <td>
                                        <button class="btn btn-danger fw-bold" onclick="editarAlumno('<?php echo $row['EgID']?>')"><i class="fa-solid fa-pencil"></i> Editar</button>
                                        <!-- <a href="token.php?id=<?php echo $row['EgControl'] ?>" class="btn btn-danger fw-bold">Editar</a> -->
                                    </td>
                                </tr>               

                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <h3 class="text-center">Lo sentimos, no hemos encontrado al alumno ingresado</h3>
        <?php } 
        ?>
    </div>
    <script src="./js/alumno.js"></script>
    <script type="text/javascript">
        const datos = <?php echo json_encode($ID); ?>
        // Justo aquí estamos pasando la variable ----^
        console.log("Los datos son: ", datos);
    </script>
    <?php include './includes/templates/footer.php'; ?>
    <style>a{text-decoration: none;}</style>