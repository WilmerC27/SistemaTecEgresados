<?php
include './includes/templates/header.php';

?>
<input type="checkbox" name="error" id="error" disabled class="d-none" <?php echo isset($_GET['error']) ? 'checked' : null  ?>>

<div class="col-10 col-md-8 col-lg-6 col-xl-4 mt-4 mb-5 shadow-sm px-3 py-4 bg-white">
    <form action="comprobacion.php" method="POST" class="bg-white py-4 needs-validation" novalidate>
        <div class="px-4">
            <div>
                <h2 class="text-uppercase fs-3">Ingresar Código de Acceso</h2>
                <p>Ingresa el codigo que has recibido en tu correo electronico, no olvides revisar los correos no deseados.</p>
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Codigo de acceso</label>
                <input type="text" id="code" name="code" placeholder="Codigo de acceso" required class="form-control">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" name="validar" class="btn btn-primary" >Validar identidad </button>
            </div>
        </div>
    </form>
</div>

<script src="./js/validacionToken.js"></script>
<?php include './includes/templates/footer.php' ?>
<style>a{text-decoration: none;}</style>