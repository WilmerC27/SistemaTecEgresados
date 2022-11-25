document.addEventListener('DOMContentLoaded', () => {
    const error = document.querySelector('input[type="checkbox"]').checked;
    console.log(error);
    if (error) {
        mostrarAlerta();
    }
});

const mostrarAlerta = () => {
    Swal.fire({
        title: '¡Tenemos un error!',
        text: 'Lo sentimos, no has ingresado validado el captcha, por favor, vuelve a intentarlo',
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ok'
    })
}