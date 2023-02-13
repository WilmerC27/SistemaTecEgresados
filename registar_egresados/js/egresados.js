function agregardatos (matricula,nombre,apellido_p,apellido_m,curp,fecha_nac,CodTel,num_tel,correo,carrera,InGeneracion,InPeriodo,FinGeneracion,FinPeriodo,PlanEstudio) {
  let matri = matricula;
  let nom = nombre;
  let apepa = apellido_p;
  let apemat = apellido_m;
  let email = correo;
  let code_tel = CodTel;
  let tel = num_tel;
  let CURP = curp;
  let nacimiento = fecha_nac;
  let car = carrera;
  let inicioGe = InGeneracion;
  let inicioPe = InPeriodo;
  let finGe = FinGeneracion;
  let finPe = FinPeriodo;
  let planEst = PlanEstudio;

  
 $.ajax({
  url:"verificarRepetidos.php",
  type: 'POST',
  data:{
  matricula:matri,
  nombre:nom,
  apellido_p:apepa,
  apellido_m:apemat,
  correo:email,
  CodTel:code_tel,
  num_tel:tel,
  curp:CURP,
  nacimiento: nacimiento,
  carrera:car,
  InGeneracion:inicioGe,
  InPeriodo:inicioPe,
  FinGeneracion:FinGeneracion,
  FinPeriodo:FinPeriodo,
  PlanEstudio:PlanEstudio
  }
 }).done(function(resp){
  if ( matri.length==0 || nom.length==0 || apepa.length==0 || apemat.length==0 || email.length==0 || code_tel.length==0 
    || tel.length==0  || CURP.length==0 || nacimiento.length==0 || car=="" || inicioGe=="" || inicioPe=="" || finGe==""
    || finPe=="" || planEst.length==0 ||resp==2 ) {
      ValidarInput("Eg_ID","nombre","apellido_p","apellido_m","correo","CodTel","num_tel","curp","fecha_nac","carrera","InGeneracion","InPeriodo","FinGeneracion","FinPeriodo","PlanEstudio");
      Swal.fire("Mensaje de Advertencia","Tiene algunos campos vacios","warning");

      if(resp !=2){
        document.querySelector('.error-matricula').textContent="";
        document.querySelector('.error-matricula').classList.remove('text-danger');
        document.querySelector('.error-matricula').classList.add('text-success');
        let imputMatricula = document.getElementById('Eg_ID');
        imputMatricula.style.border = '1px solid green ';
        ValidarInput("Eg_ID","nombre","apellido_p","apellido_m","correo","CodTel","num_tel","curp","fecha_nac","carrera","InGeneracion","InPeriodo","FinGeneracion","FinPeriodo","PlanEstudio");
          
      }else {
        Swal.fire("Mensaje de advertencia","El registro ya existe, cambie el No. de Control","warning");
        document.querySelector('.error-matricula').textContent="La Matricula ya existe porfavor introduzca otra";
        document.querySelector('.error-matricula').classList.add('text-danger');
        let imputMatricula = document.getElementById('Eg_ID');
        imputMatricula.style.border = '1px solid red ';
        ValidarInput("Eg_ID","nombre","apellido_p","apellido_m","correo","CodTel","num_tel","curp","fecha_nac","carrera","InGeneracion","InPeriodo","FinGeneracion","FinPeriodo","PlanEstudio");
       
      }
     

  }else{
    $.ajax({
      url:"registrarEgresados.php",
      type: 'POST',
      data:{
      matricula:matri,
      nombre:nom,
      apellido_p:apepa,
      apellido_m:apemat,
      correo:email,
      CodTel:code_tel,
      num_tel:tel,
      curp:CURP,
      nacimiento: nacimiento,
      carrera:car,
      InGeneracion:inicioGe,
      InPeriodo:inicioPe,
      FinGeneracion:FinGeneracion,
      FinPeriodo:FinPeriodo,
      PlanEstudio:PlanEstudio
      }
     }).done(function(resp2){
      //alert(resp2);
     })
     
    Swal.fire({
      icon: 'success',
      title: 'Guardado exitosamente',
      showConfirmButton: false,
      timer: 1500
    })
   setTimeout('document.location.reload()',1500);

  }
 //


 })

 }


 function ValidarInput(matri,nom,apepa,apemat,email,code_tel,tel,CURP,nacimiento,car,inicioGe,inicioPe,finGe,finPe,planEst){

 Boolean(document.getElementById(matri).value.length>0) ? $("#"+matri).removeClass("is-invalid").addClass("is-valid") : $("#"+matri).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(nom).value.length>0) ? $("#"+nom).removeClass("is-invalid").addClass("is-valid") : $("#"+nom).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(apepa).value.length>0) ? $("#"+apepa).removeClass("is-invalid").addClass("is-valid") : $("#"+apepa).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(apemat).value.length>0) ? $("#"+apemat).removeClass("is-invalid").addClass("is-valid") : $("#"+apemat).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(email).value.length>0) ? $("#"+email).removeClass("is-invalid").addClass("is-valid") : $("#"+email).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(code_tel).value.length>0) ? $("#"+code_tel).removeClass("is-invalid").addClass("is-valid") : $("#"+code_tel).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(tel).value.length>0) ? $("#"+tel).removeClass("is-invalid").addClass("is-valid") : $("#"+tel).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(CURP).value.length>0) ? $("#"+CURP).removeClass("is-invalid").addClass("is-valid") : $("#"+CURP).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(nacimiento).value.length>0) ? $("#"+nacimiento).removeClass("is-invalid").addClass("is-valid") : $("#"+nacimiento).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(car).value.length>0) ? $("#"+car).removeClass("is-invalid").addClass("is-valid") : $("#"+car).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(inicioGe).value.length>0) ? $("#"+inicioGe).removeClass("is-invalid").addClass("is-valid") : $("#"+inicioGe).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(inicioPe).value.length>0) ? $("#"+inicioPe).removeClass("is-invalid").addClass("is-valid") : $("#"+inicioPe).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(finGe).value.length>0) ? $("#"+finGe).removeClass("is-invalid").addClass("is-valid") : $("#"+finGe).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(finPe).value.length>0) ? $("#"+finPe).removeClass("is-invalid").addClass("is-valid") : $("#"+finPe).removeClass("is-valid").addClass("is-invalid");

 Boolean(document.getElementById(planEst).value.length>0) ? $("#"+planEst).removeClass("is-invalid").addClass("is-valid") : $("#"+planEst).removeClass("is-valid").addClass("is-invalid");
 }

   
  