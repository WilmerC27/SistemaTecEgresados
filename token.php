<?php
include './includes/templates/header.php';

?>
<input type="checkbox" name="error" id="error" disabled class="d-none" <?php echo isset($_GET['error']) ? 'checked' : null  ?>>
<div class="col-10 col-md-8 col-lg-6 col-xl-4 mt-3 mb-5 shadow-sm px-3 py-4 bg-white">
    <form action="correo.php" method="POST" class="needs-validation" novalidate>
        <div>
            <h2 class="text-center text-uppercase">Obtener Código</h2>
            <p>Para poder editar tu informacion se requiere un codigo de acceso, puedes solicitarlo mediante un correo electronico</p>
        </div>
        <div>
            <label for="email" class="form-label fw-semibold">Correo Electrónico:</label>
            <input type="text" id="email" name="email" placeholder="tecnm@cancun.tecnm.mx" required class="form-control">
            <div class="invalid-feedback">
                El correo electrónico es obligatorio
            </div>
        </div>

        <div class="g-recaptcha my-3" name="captcha" data-sitekey="6Ldt-YQhAAAAAHUe8QOmxR-OmbS7PT2U2VDKUN4E" data-callback="correctCaptcha"></div>
        <div class="mt-4 d-flex justify-content-end">
            <button type="submit" name="enviar" class="btn btn-primary"> Enviar codigo </button>
        </div>
    </form>
</div>
<script src="./js/searchAlumn.js"></script>
<script src="./js/captcha.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php include './includes/templates/footer.php' ?>
<style>
    a {
        text-decoration: none;
    }
</style>