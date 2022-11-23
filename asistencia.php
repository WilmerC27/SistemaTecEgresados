<?php 
include './includes/templates/header.php';
include("./process/conexion.php");

$id = $_GET['id'];
$conectar = new Conexion();
$con = $conectar->conectar();
date_default_timezone_set('America/Mexico_City');
$update = date("Y-m-d H:i:s", time());
$sql = "SELECT * FROM egegresado  WHERE  EgID = $id";
$query = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query)) {
    $control = $row['EgControl'];
    $nombre = $row['EgNombre'];
    $apellido = $row['EgApPaterno'];
}
$sql = "UPDATE egconfirmacion SET Fecha='$update',Asistira='1' WHERE EgControl=$control";
$query = mysqli_query($con, $sql);
?>

<div class="col-10 col-md-8 col-lg-6 col-xl-4 shadow-sm my-4">
    <form action="alumno.php" method="POST" class="bg-white py-4 needs-validation" novalidate>

        <div class="px-4">
            <div>
                <h1 class="fs-2 text-center">Confirmación de asistencia</h1>
                <p> ¡Muchas gracias <?php echo $nombre?> <?php echo $apellido?>! <br>
                Por tu confirmación de asistencia al evento de egresados,<br> te esperamos.</p>
                <img src='http://20.120.154.2/Sistema-egresados/img/invitacion.jpeg' alt='logo' width='450' style='text-align:center' />
            </div>
            
        </div>
    </form>
</div>
<script src="./js/searchAlumn.js"></script>
<?php include './includes/templates/footer.php' ?>
<style>a{text-decoration: none;}</style>