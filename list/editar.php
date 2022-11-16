<?php
include '../includes/templates/header.php';
include("../process/conexion.php");

//Establecemos la conexion con la base de datos
$conectar = new Conexion();
$con = $conectar->conectar();
$id = $_GET['id']; //importamos la id del registro que vamos a editar


$sql = "SELECT * FROM egegresado WHERE EgID ='$id'"; //Generamos la consulta
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

$arr = $row['EgCarrera'];
$co = "SELECT * FROM egcarreras WHERE EgIdCarrera = '$arr'";
$query2 = mysqli_query($con, $co);
$res = mysqli_fetch_array($query2);
if (isset($id)) {
?>

  <div class="col-10 col-md-8 col-lg-6 mt-3 mb-4 shadow-sm px-3 py-4 bg-white">
    <form method="POST" class="bg-white needs-validation" novalidate>

      <input type="hidden" name="id" value="<?php echo $id ?>">
      <div>
        <label for="EgID" class="form-label fw-semibold text-uppercase">No. Control</label>
        <input type="text" class="form-control mb-3" id="EgID" name="EgID" placeholder="ID_Alumno" disabled=disabled value="<?php echo $row['EgControl']  ?>">
      </div>
      <div>
        <label for="Nombre" class="form-label fw-semibold text-uppercase">Nombre(s)</label>
        <input type="text" class="form-control mb-3" id="Nombre" name="Nombre" placeholder="Nombre" disabled=disabled value="<?php echo $row['EgNombre']  ?>">
      </div>
      <div>
        <label for="" class="form-label fw-semibold text-uppercase">Apellido Paterno</label>
        <input type="text" class="form-control mb-3" name="Apellido_P" placeholder="Ap_P" disabled=disabled value="<?php echo $row['EgApPaterno']  ?>">
      </div>
      <div>
        <label for="Apellido_M" class="form-label fw-semibold text-uppercase ">Apellido Materno</label>
        <input type="text" class="form-control mb-3" id="Apellido_M" name="Apellido_M" placeholder="Ap_M" disabled=disabled value="<?php echo $row['EgApMaterno']  ?>">
      </div>

      <div>
        <label for="" class="form-label fw-semibold text-uppercase">Carrera</label>
        <input type="text" class="form-control mb-3" name="Carrer" placeholder="Carrera" disabled=disabled value="<?php echo $res['EgCNombre']  ?>">
      </div>

      <div>
        <label for="Curp" class="form-label fw-semibold text-uppercase ">Curp</label>
        <input type="text" class="form-control" id="Curp" name="Curp" maxlength="18" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Curp (18 digitos) " value="<?php echo $row['EgCurp']  ?>" required>
        <div class="invalid-feedback mb-3">
          Este campo es obligatorio
        </div>
        <div class="valid-feedback">
          Validado!
        </div>
      </div>
      <div>
        <label for="FechaNac" class="form-label fw-semibold text-uppercase ">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="FechaNac" name="FechaNac" placeholder="Fecha de Nacimiento (AAAA-MM-DD)" value="<?php echo $row['EgFNac']  ?>" required>
        <div class="invalid-feedback mb-3">
          Este campo es obligatorio
        </div>
        <div class="valid-feedback">
          Validado!
        </div>
      </div>

      <div>
        <table width='100%'>
          <tbody>
            <tr>
              <td>
                <div id="form-tel" class="d-flex gap-2 me-2">
                  <div class="col-12 col-md-6">
                    <label for="CodTel" class="form-label fw-semibold text-uppercase">Código País</label>
                    <input type="number" class="form-control" id="CodTel" name="CodTel" placeholder="Codigo de Telefono" value="52" required>
                    <div class="invalid-feedback mb-3">
                      Este campo es obligatorio
                    </div>
                    <div class="valid-feedback">
                      Validado!
                    </div>
                  </div>
              </td>
              <td>
                <div class="col-12 col-md-6">
                  <label for="Num_Tel" class="form-label fw-semibold text-uppercase">Teléfono</label>
                  <input type="tel" class="form-control" id="Num_Tel" name="Num_Tel" maxlength="10" placeholder="Telefono" value="<?php echo $row['EgTel']  ?>" required>
                  <div class="invalid-feedback mb-6">
                    Este campo es obligatorio
                  </div>
                  <div class="valid-feedback">
                    Validado!
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
        <label for="Correo" class="form-label fw-semibold text-uppercase">Correo Electrónico</label>
        <input type="email" class="form-control" name="Correo" placeholder="Correo" value="<?php echo $row['EgEmail']  ?>" required>
        <div class="invalid-feedback mb-2">
          Este campo es obligatorio
        </div>
        <div class="valid-feedback">
          Validado!
        </div>
      </div><br>
      <div class="d-flex justify-content-end">
        <button type="submit" name="buscar" class="btn btn-success"> Actualizar </button>
      </div>
    </form>
  <?php } else {
  header("Location: comprobacion.php");
}
  ?>
  </div>
  <script src="../js/actualizadolista.js"></script>
  <script src="../js/actualizarAlumno.js"></script>
  <?php include '../includes/templates/footer.php'; ?>
  <style> a {text-decoration: none;} </style>