document.addEventListener('DOMContentLoaded', () => {
    const error = document.querySelector('input[type="checkbox"]').checked;
    console.log(error);
    if (error) {
        Swal.fire({
            title: '¡CLAVE INCORRECTA!',
            text: 'Lo sentimos, no has ingresado una clave valida o tu token ya ha sido usado.',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        })
    } else {
        Swal.fire({
            title: '¡Codigo Validado!',
            text: 'Ya puedes realizar cambios en tu información de alumno egresado"',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        })
    }
});

// const mostrarAlerta = () => {
//     Swal.fire({
//         title: '¡CLAVE INCORRECTA!',
//         text: 'Lo sentimos, no has ingresado una clave valida, por favor, vuelve a intentarlo',
//         icon: 'error',
//         confirmButtonColor: '#3085d6',
//         confirmButtonText: 'Ok'
//       })
// }
// const Permiso = () => {
//     Swal.fire({
//       title: '¡Codigo Validado!',
//       text: 'Ya puedes realizar cambios en tu información de alumno egresado"',
//       icon: 'success',
//       confirmButtonColor: '#3085d6',
//       confirmButtonText: 'Ok'
//     })
//   }
