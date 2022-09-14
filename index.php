<?php include './includes/templates/header.php';
  session_start();
  $_SESSION['EgID'] = '0';
   ?>

<div class="col-10 col-md-8 col-lg-6 col-xl-4 shadow-sm my-4">
    <form action="alumno.php" method="POST" class="bg-white py-4 needs-validation" novalidate>

        <div class="px-4">
            <div>
                <h1 class="fs-2 text-center">Buscar Alumno</h1>
                <p>Para realizar la busqueda de un alumno es necesario llenar el siguiente formulario.</p>
            </div>
            <div class="col-md-12 my-2">
                <label for="nombre" class="form-label fw-semibold">Nombre(s):</label>
                <input id="nombre" type="text" name="nombre" placeholder="Nombre" required class="form-control">
                <div class="invalid-feedback">
                    El nombre es obligatorio
                </div>
            </div>
            <div class="col-md-12 my-2">
                <label for="ap_p" class="form-label fw-semibold">Apellido Paterno: </label>
                <input id="ap_p" type="text" name="ap_p" placeholder="Apellido paterno" required class="form-control">
                <div class="invalid-feedback">
                    El apellido paterno es obligatorio
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <label for="ap_m" class="form-label fw-semibold">Apellido Paterno:</label>
                <input id="ap_m" type="text" name="ap_m" placeholder="Apellido materno" required class="form-control">
                <div class="invalid-feedback">
                    El apellido materno es obligatorio
                </div>
            </div>
            <div class="d-flex justify-content-center col-md-12 my-2">
                <button type="submit" name="buscar" class="btn btn-primary mt-4 text-right">Buscar Alumno</button>
            </div>
            <div class="d-flex justify-content-center"  text-decoration: underline overline>
            <a href="matricula.php">¿Recuerdas tu número de control?</a>
            </div>
            
        </div>
    </form>
</div>
<script src="./js/searchAlumn.js"></script>
<?php include './includes/templates/footer.php' ?>
<style>a{text-decoration: none;}</style>