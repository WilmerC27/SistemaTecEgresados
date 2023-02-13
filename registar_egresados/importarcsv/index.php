<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Bootstrap CSS style="width:100%; " -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <Title>EGRESADOS TECNM CAMPUS CANCÚN</Title>
  </head>
  <body>
  <div class="col-12 col-lg-12 col-xl-12 mt-4 mb-4 px-3">
<div class="table-responsive">
<div class="col-12"><br>
    <div class="card text-center align-middle">
    <div class="card-header">
    IMPORTAR DATOS DE EXCEL A LA BASE DE DATOS(solo se aceptan archivos excel.csv)
    </div>
    <div class="card-body text-center align-middle">
    

       <form onsubmit="Registrar_Excel();" method="POST" enctype="multipart/form-data">
       <div class="row">

           <div class="col-md-8">
            <input type="file" name="excelDoc" id="excelDoc" class="form-control" />    
           </div>

           <div class="col-lg-2 col-md-3 col-sm-5 col-xs-1  ">
            <a href="../source/registrarEgresadosTECNM.xlsx" class="btn btn-success fw-bold" download="registrarEgresadosTECNM.xlsx">Descarga aqui el excel</a>
            </div>
           <div class="col-lg-2 col-md-3 col-sm-5 col-xs-1 ">
            <button type="submit" class="btn btn-primary fw-bold"   id="btn_registrar">IMPORTAR</button><br>
           </div>
           

           <div class="col-lg-12" id="div_tabla"></div><br> 
           
       </div>
       </form>
    </div>
    </div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<script>

document.getElementById("excelDoc").addEventListener("change",()=> {
    var fileName = document.getElementById("excelDoc").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.lenght).toLowerCase();
    
    if (extFile =="csv" ) {
    
    }else {
        Swal.fire("MENSAJE DE ADVERTENCIA","SOLO SE ACEPTAN ARCHIVOS EXCEL - USTED SUBIO UN ARCHIVO CON  EXTENSION: "+extFile,"warning");
        document.getElementById("excelDoc").value="";
    }
    });

function Registrar_Excel(){
event.preventDefault();
let archivo = $("#excelDoc").val();
if (archivo==="" ) {
    return Swal.fire("Mensaje de advertencia","Selecione un archivo","Warning");
}else {
//Lo que hace es borrar la entrada del archivo cada vez que alguien hace clic en él, por lo que eliminará la selección actual 
//esto cada vez que se modifique. 
$("#excelDoc").click(function(){
$("#excelDoc").val('');
});
}

let formData = new FormData();//instanciamos
let excel = $("#excelDoc")[0].files[0];//esto me va a traer el objeto del excel  para poder leerlo y recorrerlo
formData.append('excel',excel);//variable que enviare a mi index.php
$.ajax({
    url:"excel-script.php",
    type:'POST',
    data: formData, //la data que vamos a enviar es formData
    contentType: false,
    processData: false,//cuando es igual a mayuscula es a false
    success:function(resp){//alerta de error 
    
    if (resp>=1) {
    Swal.fire("Agregado con exito");
    }else {
    Swal.fire(" Datos no registrados","error");
    }
    
   //alert(resp);
} 
    })
}


</script>