(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')
  
  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }else{
        Swal.fire({
          title: '¡Alumno Egresado Actualizado!',
          text: 'Hemos registrado todos tus cambios de manera correcta',
          icon: 'success',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ok'
        })
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
// const Actualizado = () => {
//     Swal.fire({
//       title: '¡Alumno Egresado Actualizado!',
//       text: 'Hemos registrado todos tus cambios de manera correcta',
//       icon: 'success',
//       confirmButtonColor: '#3085d6',
//       confirmButtonText: 'Ok'
//     })
//   }