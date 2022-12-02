function asistenciaAlumno(id) {

  Swal.fire({
    title: 'Antes de continuar, ¿Comó se encuentra el estatus de tú titulación?',
    showDenyButton: true,
    showCancelButton: true,
    cancelButtonText: 'Titulado',
    confirmButtonText: 'En Proceso',
    denyButtonText: 'No titulado',
    cancelButtonColor: '#008F39',
    confirmButtonColor: '#FF8000',
    denyButtonColor: '#FF0000',
    customClass: {
      actions: 'my-actions',
      cancelButton: 'order-1 right-gap',
      confirmButton: 'order-2',
      denyButton: 'order-3',
    }
  }).then((result) => {
    let estatusEstudiante = 0;
    if (result.isConfirmed) {//No Titulado
      Swal.fire('Saved!', '', 'success')
      estatusEstudiante = 1;
    } else if (result.isDenied) {
      Swal.fire('Changes are not saved', '', 'info')
      estatusEstudiante = 2;//Titulado
    } else {
      Swal.fire('Desde Titulado', 'success');
      estatusEstudiante = 3;//En proceso
    }
    Swal.fire({
      title: '¿Deseas confirmar tu asistencia?',
      // text: "",
      icon: 'question',
      reverseButtons: true,
      confirmButtonColor: '#198754',
      confirmButtonText: 'Si, confirmar',
    }).then((result) => {
      Swal.fire({
        title: '¡Hola, bienvenido!',
        text: '¡Hemos registrado tu asistencia al evento para egresados 2022!',
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ok'
      })
      if (result.isConfirmed) {
        window.location.href = `comprobacion.php?id=${id}&status=${estatusEstudiante}`;
      }
    })
  })




}