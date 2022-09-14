const emailEnviado = () => {
  Swal.fire({
    title: '¡Email enviado!',
    text: 'Hemos enviado un email a tu correo electrónico, no olvides revisar "Correos no deseados"',
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Ok'
  })
}