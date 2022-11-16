function editarAlumno(id) {
  
  Swal.fire({
    title: '¿Deseas confirmar tu asistencia?',
    // text: "",
    icon: 'question',
    reverseButtons: true,
    confirmButtonColor: '#198754',
    confirmButtonText: 'Si, confirmar',
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = `comprobacion.php?id=${id}`;
    }

  })
}