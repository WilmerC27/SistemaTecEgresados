<?php include '../includes/templates/header.php' ?>

<div class="col-10 col-md-8 col-lg-6 col-xl-4 shadow-sm my-4">
    <form action="confirmacion2.php" method="POST" class="bg-white py-4 needs-validation" novalidate>

        <div class="px-4">
            <div>
                <h1 class="fs-2 text-center">Buscar Alumno</h1>
                <p>Por favor ingresa tu matrícula o numero de control para continuar.</p>
            </div>
            <div class="col-md-12 my-2">
                <label for="nombre" class="form-label fw-semibold">No. Control:</label>
                <input maxlength="9" id="nombre" type="text" name="control" placeholder="Ejemplo (11223344 o D11223344)" required class="form-control">
                <div class="invalid-feedback">
                    La matrícula es obligatoria
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" name="buscar" class="btn btn-primary mt-4 text-right">Buscar Alumno</button>
            </div>
        </div>
    </form>
</div>
<script src="../js/searchAlumn.js"></script>
<?php include '../includes/templates/footer.php' ?>