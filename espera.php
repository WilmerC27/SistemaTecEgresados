<?php
include './includes/templates/header.php';
?>
<div class="col-10 col-md-8 col-lg-6 col-xl-4 mt-4 mb-5 shadow-sm px-3 py-4 bg-white">
    <form action="comprobacion.php" method="POST" class="bg-white py-4 needs-validation" novalidate>
        <div class="px-4">
            <div>
                <h2 class="text-uppercase fs-3">Para continuar</h2> <br>
                <p>Accede a tu correo electronico, ahí te hemos enviado el codigo para continuar, no olvides revisar los correos no deseados.</p>
                <div class="d-flex justify-center">
                    <video src="img/wait.mp4" autoplay muted loop style="height: 150px; margin:0 auto"></video>
                </div>
            </div>

        </div>
    </form>
</div>
<script src="./js/validacionToken.js"></script>
<?php include './includes/templates/footer.php' ?>
<style>
    a {
        text-decoration: none;
    }
</style>