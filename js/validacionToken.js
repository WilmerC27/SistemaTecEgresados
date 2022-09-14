document.addEventListener('DOMContentLoaded', () => {
    const error = document.querySelector('input[type="checkbox"]').checked;
    console.log(error);
    if(error){
        mostrarAlerta();
    }
});

const mostrarAlerta = () => {
    Swal.fire({
        title: '¡CLAVE INCORRECTA!',
        text: 'Lo sentimos, no has ingresado una clave valida, por favor, vuelve a intentarlo',
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ok'
      })
}