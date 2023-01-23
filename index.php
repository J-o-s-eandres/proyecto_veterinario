<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patitas Sanas</title>

    <!-- Ligtbox -->
    <link rel="stylesheet" href="./vendor/lightbox/css/lightbox.min.css">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/044457a684.js" crossorigin="anonymous"></script>

    <!--  Boostrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>
<body>
<div class="mt-2" style='width: 95%; margin: 0 auto;'>

<h2 class="text-center mb-4">Módulo Mascotas</h2>

<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-mascota" id="mostrar-modal-registro">Registrar Mascota</button>
<a target="_blank"   id="mostrarMascotas" class="btn btn-info">Mostrar todas las Mascotas</a>
<a target="_blank"  href="./views/charts/grafico3.php" class="btn btn-info">Resumen de Mascotas</a>
<a target="_blank"  href="./reports/reporte.php" class="btn btn-warning">Reporte de Mascotas vivas</a>
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-buscador-mascota" id="mostrar-modal-registro">Buscar Mascota</button>

<hr>

<div class="table-responsive">
    <table class="table table-sm table-striped" id="tabla-mascotas">
        <thead class="table-dark">
            <tr>
                <!-- <th>#</th> -->
                <th>Nombre Raza</th>
                <th>Nombre Mascota</th>
                <th>Fecha de Nacimiento</th>
                <th>Peso</th>
                <th>Color</th>
                <th>Fotografía</th>
            </tr>
        </thead>
        <tbody class="table-hover table-active"></tbody>
    </table>
</div>

</div>


<!-- Modal registrar Mascotas-->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-mascota" tabindex="-1" aria-labelledby="titulo-modal" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary text-light">
            <h5 class="modal-title" id="titulo-modal-mascota">Registro de Mascotas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-light" aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <!-- Formulario de registro de Cursos -->
            <!-- enctype="multipart/form-data esto le permite al formulario enviar binarios -->
            <form  id="formulario-mascota" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="razas">Razas:</label>
                    <select name="razas" id="razas" class="form-control form-control-sm">
                        <option value="">Seleccione</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="titulo">Nombre Mascota:</label>
                    <input type="text" class="form-control form-control-sm" id="nombre">
                </div>

                <div class="form-group">
                    <label for="fechainicio">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control form-control-sm" id="fechaNac">
                </div>

                <div class="form-group">
                    <label for="descripcion">Peso:</label>
                    <input type="text" class="form-control form-control-sm" id="peso">
                </div>
                

                <div class="form-group">
                    <label for="descripcion">Color:</label>
                    <input type="text" class="form-control form-control-sm" id="color">
                </div>

                <div class="form-group">
                    <label for="fotografia">Selecciona imagen: </label>
                    <input type="file" id="fotografia" accept="image/*" class="form-control-file">
                </div>
                <!-- Fin del formulario -->
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" id="cancelar-modal" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-sm btn-primary" id="guardar-mascota">Guardar</button>
        </div>
    </div>
</div>
</div>


<!-- Modal Buscador -->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-buscador-mascota" tabindex="-1" aria-labelledby="titulo-modal-buscar-mascotas" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary text-light">
            <h5 class="modal-title" id="titulo-modal-mascotas">Buscar Mascotas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-light" aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <form  id="formulario-mascota-buscador" autocomplete="off" >
                
                <div class="form-group">
                    <label for="titulo">Nombre Mascota:</label>
                    <input type="text" class="form-control form-control-sm" id="nombre-busc">
                </div>

                
                <!-- Fin del formulario -->
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" id="cancelar-modal-buscar" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-sm btn-primary" id="buscar-mascota">Buscar</button>
        </div>
    </div>
</div>
</div>


<!-- fin Modal Buscador -->



  <!-- Libreria jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Lightbox -->
<script src="./vendor/lightbox/js/lightbox.min.js"></script>

  <!-- jQuery Mask  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
   
<!-- Boostrap 4.6 -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<!-- Datatable -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>



<!-- Libreria Sweet Alert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    //solo acepta números
$('#peso').mask('000.00', {placeholder: '000'}); //placeholder



function buscarNombre(){
    let nombreMascota = $("#nombre-busc").val();

    $.ajax({
    url :'controllers/mascotas.controllers.php',
    type : 'GET',
    data : {'operacion':'buscarNombre','nombre':nombreMascota},
    success : function(result){
        let registros = JSON.parse(result);
        let nuevoFila=``;

        
        let tabla = $("#tabla-mascotas").DataTable();
            tabla.destroy();

            $("#tabla-mascotas tbody").html("");

            registros.forEach(registro =>{
            
                console.log(registro)

            fotografia = (registro['fotografia']==null) ?'sin-imagen.jpg':registro['fotografia'];
            let nuevaFila =`
                <tr>
                <td>${registro['nombreRaza']}</td>
                <td>${registro['nombre']}</td>
                <td>${registro['fechaNac']}</td>
                <td>${registro['peso']}</td>
                <td>${registro['color']}</td>
                <td>
                    <a href='./views/images/mascotas/${fotografia}'
                    data-lightbox='demo' 
                    data-title='${registro['nombre']}'
                    class='btn btn-sm btn-warning' 
                    title='Mostrar foto de la mascota'><i class='fa-solid fa-eye'></i></a>
                    </td>
                </tr>
            `;
            $("#tabla-mascotas tbody").append(nuevaFila);
            
        })//fin forEach
        $("#modal-buscador-mascota").modal("hide");
        reiniciarBuscar();

        $('#tabla-mascotas').DataTable({
            language:{ 
                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
            }
        });//fin DataTable

       }
    }) //fin ajax

}


function mostrarMascotas() {
$.ajax({
    url :'controllers/mascotas.controllers.php',
    type : 'GET',
    data : 'operacion=listarMascotas',
    success : function(result){
        let registros = JSON.parse(result);
        let nuevoFila=``;

        console.log(result)
        
        let tabla = $("#tabla-mascotas").DataTable();
            tabla.destroy();

        $("#tabla-mascotas tbody").html("");

        registros.forEach(registro =>{
            fotografia = (registro['fotografia']==null) ?'sin-imagen.jpg':registro['fotografia'];


            let nuevaFila =`
                <tr>
                <td>${registro['nombreRaza']}</td>
                <td>${registro['nombre']}</td>
                <td>${registro['fechaNac']}</td>
                <td>${registro['peso']}</td>
                <td>${registro['color']}</td>
                <td>
                    <a href='./views/images/mascotas/${fotografia}'
                    data-lightbox='demo' 
                    data-title='${registro['nombre']}'
                    class='btn btn-sm btn-warning' 
                    title='Mostrar foto de la mascota'><i class='fa-solid fa-eye'></i></a>
                    </td>
                </tr>
            `;
            $("#tabla-mascotas tbody").append(nuevaFila);
            
        })//fin forEach
        $('#tabla-mascotas').DataTable({
            language:{ 
                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
            }
        });//fin DataTable
    }//fin success
});// $.ajax
}//fin de la función mostrarCuros()


function listarRazas() {
$.ajax({
    url: 'controllers/mascotas.controllers.php',
    type: 'GET',
    data: 'operacion=listarRazas',
    success: function(result){
        let registros = JSON.parse(result);
        let elementosLista = ``;

        if(registros.length > 0){

            elementosLista = `<option>Seleccione</option>`;

        registros.forEach(registro => {
            elementosLista += `<option value=${registro['idraza']}>${registro['nombreRaza']}</option>`;
        })
    } else {
        elementosLista = `<option>No hay datos asignados</option>`
    }
    $("#razas").html(elementosLista);
}
})

}//fin de la función listarRazas() 

 // Reiniciara el formulario 
function reiniciarformulario() {
        $("#formulario-mascota")[0].reset();
 }//fin de la función reiniciarformulario()

$("#modal-buscador-mascota").on('shown.bs.modal', function () {
         $("#nombre-busc").focus()
    });

$("#formulario-mascotas").on("submit",function(evt){
            evt.preventDefault();
        });

$("#formulario-mascota-buscador").on("submit",function(evt){
            evt.preventDefault();
        });

function reiniciarBuscar(){
    $("#formulario-mascota-buscador")[0].reset();
}


function registrarMascotaBin(){
                //1. Validación

                //2. Crear un objeto FormData(reemplazara al array asociativo)
            if(confirm("¿Está seguro de guardar?")){
                    var formdata = new FormData();
                
                
                //3. Enviando parámetros
                formdata.append("operacion","registrarMascotas");
                formdata.append("idraza",$("#razas").val());
                formdata.append("nombre",$("#nombre").val());
                formdata.append("fechaNac",$("#fechaNac").val());
                formdata.append("peso",$("#peso").val());
                formdata.append("color",$("#color").val());
                
                // formdata soporta objetos binarios
                formdata.append("fotografia", $("#fotografia")[0].files[0]);

                
                //4. Enviar datos por AJAX
                $.ajax({
                    url:'controllers/mascotas.controllers.php',
                    type:'POST',
                    data: formdata,
                    contentType:false,
                    processData : false,
                    cache:false,
                    success : function(result){
                            console.log(result);
                            if(result == ""){
                                // Confirmar envio
                                alert("Proceso terminado correctamente");

                                // Reconstruir DataTable
                                mostrarMascotas();
                                
                                // Reiniciar el formulario a su estado original 
                                reiniciarformulario();
                               //cerrar modal 
                            $("#modal-mascota").modal("hide");
                        } //fin if
                    }//fin success
                });// fin ajax
            }        //fin if confirm
        }// fin función registrarCursoBin


        $("#guardar-mascota").click(registrarMascotaBin);
        $("#mostrarMascotas").click(mostrarMascotas);
        $("#buscar-mascota").click(buscarNombre);
        $("#cancelar-modal-buscar").click(reiniciarBuscar);
        $("#cancelar-modal").click(reiniciarformulario);





mostrarMascotas()
listarRazas()
</script>
</body>
</html>