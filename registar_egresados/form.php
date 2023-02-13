<?php include("includes/templates/header.php"); ?>
 <!--  <form  class="col-10 col-md-16 col-lg-10 col-xl-6 shadow-sm my-4" id="form" action="#"> -->

 <!--  -->
 <div class="col-10 col-md-16 col-lg-10 col-xl-6 shadow-sm my-4">
    <div class="bg-white py-8 needs-validation" novalidate>
    <div class="px-4">
      <div class="d-flex justify-content-center" style="display:flex; align-items:center; ">
        <h1>Formulario de registro</h1>
      </div>
      <div class="d-flex justify-content-center">
        <p>Favor de resgistrate aqui para recibir nuestros enunciados </p>
      </div>

      <div class="col-md-12 my-8">
        <label for="id" class="form-label fw-semibold">No. Control</label>
        <input type="text" id="Eg_ID" name="Eg_ID" placeholder="No. de Control" onkeypress="return soloNumeros(event)"  maxlength="8" class="form-control" required>
        <div class="invalid-feedback"  >
         El campo de No. de control esta vacio
        </div >

        <p class="error-matricula"></p>
        <p class="invalid-feedback"></p>
      </div>

      <div class="col-md-12 my-2">
        <label for="nombre" class="form-label fw-semibold">Nombre(s)</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre" onkeypress="return soloLetras(event)" class="form-control" required>
        <div class="invalid-feedback">
          El nombre es obligatorio
        </div>
      </div>


      <div class="col-md-12 my-2">
        <label for="apellido_p" class="form-label fw-semibold">Apellido Paterno</label>
        <input type="text" id="apellido_p" name="apellido_p" placeholder="Apellido Paterno" onkeypress="return soloLetras(event)" class="form-control" required>
        <div class="invalid-feedback">
          El apellido es obligatorio
        </div>
      </div>

      <div class="col-md-12 my-2">
        <label for="apellido_m" class="form-label fw-semibold">Apellido Materno</label>
        <input type="text" id="apellido_m" name="apellido_m" placeholder="Apellido Materno" onkeypress="return soloLetras(event)" class="form-control" required>
        <div class="invalid-feedback">
          El apellido es obligatorio
        </div>
      </div>


      <div class="col-md-12 my-2">
        <label for="curp" class="form-label fw-semibold">Curp</label>
        <input type="text" id="curp" name="curp" maxlength="18" placeholder="Curp" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="form-control" required>
        <div class="invalid-feedback">
          El curp es obligatorio
        </div>
      </div>

      <div class="col-md-12 my-2">
        <label for="fecha_nac" class="form-label fw-semibold">Fecha de Nacimiento</label>
        <input type="date" id="fecha_nac" name="fecha_nac" placeholder="Fecha de Nacimiento" class="form-control" required>
        <div class="invalid-feedback">
          La fecha de nacimiento es obligatorio
        </div>
      </div>

      <div class="col-12 col-md-3">
        <label for="CodTel" class="form-label fw-semibold ">Código de País</label>
        <input type="text" id="CodTel" name="CodTel" maxlength="3" onkeypress="return soloNumeros(event)" placeholder="521" class="form-control mb-3" required>
        <div class="invalid-feedback">
          El codigo telefonico es obligatorio, ejemplo 521
        </div>
      </div>

      <div class="col-md-12 my-2">
        <label for="num_tel" class="form-label fw-semibold">Numero Telefonico</label>
        <input type="text" id="num_tel" name="num_tel" maxlength="10" placeholder="Numero Telefonico" onkeypress="return soloNumeros(event)" class="form-control" required>
        <div class="invalid-feedback">
          El numero telefonico es obligatorio
        </div>
      </div>

      <div class="col-md-12 my-2">
        <label for="correo" class="form-label fw-semibold">Correo electronico</label>
        <input type="text" id="correo" name="correo" placeholder="Correo electronico" class="form-control"  required >
        <div class="invalid-feedback">El correo electronico es obligatorio</div>
        <p class="error-correo"></p>

        <span id="text"></span>
      </div>

      <div class="col-md-12 my-2">
      <label for="carrera" class="form-label fw-semibold">Carrera</label>
      <select class="form-control" id="carrera"  placeholder="Carrera" required>
          <option value="">SELECCIONAR CARRERA DEL EGRESADO</option>
          <option value="1">LICENCITURA EN ADMINISTRACION DE EMPRESAS</option>
          <option value="2">LICENCITURA EN ADMINISTRACION</option>
          <option value="3">INGENIERIA ELECTROMECANICA</option>
          <option value="4">LICENCIATURA EN INFORMATICA</option>
          <option value="5">LICENCIATURA EN CONTADURIA</option>
          <option value="6">INGENIERIA EN PESCA INDUSTRIAL</option>
          <option value="7">INGENIERIA EN SISTEMAS COMPUTACIONALES</option>
          <option value="8">MANTENIMIENTO INDUSTRIAL</option>
          <option value="9">INGENIERIA CIVIL</option>
          <option value="10">INGENIERÍA EN GESTIÓN EMPRESARIAL</option>
          <option value="11">INGENIERÍA EN MECATRÓNICA</option>
          <option value="12">CONTADOR PÚBLICO</option>
          <option value="13">INGENIERÍA EN ADMINISTRACIÓN</option>
          <option value="14">INGENIERÍA INFORMÁTICA</option>
          <option value="15">ARQUITECTURA</option>
          <option value="51">MAESTRÍA EN CIENCIAS AMBIENTALES</option>
          <option value="52">MAESTRÍA EN ADMINISTRACIÓN DE NEGOCIO</option>
          <option value="61">DOCTORADO EN CIENCIAS EN MATERIALES</option>
          <option value="62">DOCTORADO EN CIENCIAS AMBIENTALES</option>
          <option value="71">INGLÉS</option>
      </select>
    <div class="invalid-feedback">
    El Nombre de la Carrera es obligatorio
    </div>
  </div>

      <div class="col-md-12 my-2">
        <label for="InGeneracion" class="form-label fw-semibold">Inicio de generacion</label>
        <input type="text" id="InGeneracion" name="InGeneracion" maxlength="4" onkeypress="return soloNumeros(event)" placeholder="Inicio de generacion" class="form-control" required>
        <div class="invalid-feedback">
          El inicio de generacion es obligatorio
        </div>
      </div>
      
      <div class="col-md-12 my-2">
      <label for="InPeriodo" class="form-label fw-semibold">Inicio Periodo</label>
      <select class="form-control" id="InPeriodo"   required>
          <option value="">SELECCIONA EL PERIODO</option>
          <option value="1">AGO-DIC</option>
          <option value="2">ENE-JUN</option>
      </select>
    <div class="invalid-feedback">
    El inicio de periodo es obligatorio
    </div>
  </div>


      <div class="col-md-12 my-2">
        <label for="FinGeneracion" class="form-label fw-semibold">Fin de Generacion</label>
        <input type="text" id="FinGeneracion" name="FinGeneracion" maxlength="4" onkeypress="return soloNumeros(event)" placeholder="Fin de Generacion" class="form-control" required>
        <div class="invalid-feedback">
          El fin de generacion es obligatorio
        </div>
      </div>

      <div class="col-md-12 my-2">
      <label for="FinPeriodo" class="form-label fw-semibold">Fin Periodo</label>
      <select class="form-control" id="FinPeriodo"  required>
          <option value="">SELECCIONA EL PERIODO</option>
          <option value="1">AGO-DIC</option>
          <option value="2">ENE-JUN</option>
      </select>
    <div class="invalid-feedback">
    El fin de periodo es obligatorio
    </div>
  </div>


      <div class="col-md-12 my-2">
        <label for="PlanEstudio" class="form-label fw-semibold">Plan de Estudio</label>
        <input type="text" id="PlanEstudio" name="PlanEstudio" maxlength="1" onkeypress="return soloLetras(event)" placeholder="Plan de Estudio" class="form-control" required>
        <div class="invalid-feedback">
          El fin de periodo es obligatorio
        </div>
      </div>
      <button type="submit" name="enviar" class="btn btn-success" style="padding: 10px; margin: 10px;" id="guardar"> Enviar </button>
    </div>


</div>
 <!---->
 </div> 
 <!--  -->
</div>

 <!--</form>  -->

<script type="text/javascript">
    $(document).ready(function(){
      $('#guardar').click(function(){
          Eg_ID=$('#Eg_ID').val();
          nombre=$('#nombre').val();
          apellido_p=$('#apellido_p').val();
          apellido_m=$('#apellido_m').val();
          curp=$('#curp').val();
          fecha_nac=$('#fecha_nac').val();
          CodTel=$('#CodTel').val();
          num_tel=$('#num_tel').val();
          correo=$('#correo').val();
          carrera=$('#carrera').val();
          InGeneracion=$('#InGeneracion').val();
          InPeriodo=$('#InPeriodo').val();
          FinGeneracion=$('#FinGeneracion').val();
          FinPeriodo=$('#FinPeriodo').val();
          PlanEstudio=$('#PlanEstudio').val();
          agregardatos(Eg_ID,nombre,apellido_p,apellido_m,curp,fecha_nac,CodTel,num_tel,correo,carrera,InGeneracion,InPeriodo,FinGeneracion,FinPeriodo,PlanEstudio);
        })
      });

</script>

<script>


  function soloNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) {
      return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
  }

  function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }

  function filter(__val__) {
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if (preg.test(__val__) === true) {
      return true;
    } else {
      return false;
    }
  }
  
</script>


<script>
  /*
*/
</script>

<?php include("./includes/templates/footer.php"); ?>