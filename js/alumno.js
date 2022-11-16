function editarAlumno(id) {
  
  Swal.fire({
    title: '¿Deseas Editar este Alumno?',
    // text: "",
    icon: 'question',
    reverseButtons: true,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Editar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = `token.php?id=${id}`;
    }
  })
}