<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patitas Sanas</title>

    <script src="https://kit.fontawesome.com/044457a684.js" crossorigin="anonymous"></script>

<!--  Boostrap 4.6 -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!-- Table -->
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>
<div class="mt-2" style='width: 95%; margin: 0 auto;'>

<h2 class="text-center mb-4">Módulo Mascotas</h2>

<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-curso" id="mostrar-modal-registro">Registrar Mascota</button>
<a href="charts/grafico-basico.php" class="btn btn-info">Resumen de Nacimientos de Mascotas</a>
<a href="charts/grafico-escuela.php" class="btn btn-warning">Reporte de Mascotas vivas</a>
<hr>

<div class="table-responsive">
    <table class="table table-sm table-striped" id="tabla-cursos">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nombre Raza</th>
                <th>Nombre Mascota</th>
                <th>Fecha de Nacimiento</th>
                <th>Peso</th>
                <th>Color</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody class="table-hover table-active"></tbody>
    </table>
</div>

</div>


<!-- Modal -->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-curso" tabindex="-1" aria-labelledby="titulo-modal-productos" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary text-light">
            <h5 class="modal-title" id="titulo-modal-cursos">Registro de Mascotas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-light" aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <!-- Formulario de registro de Cursos -->
            <!-- enctype="multipart/form-data esto le permite al formulario enviar binarios -->
            <form  id="formulario-cursos" autocomplete="off" enctype="multipart/form-data">
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
            <button type="button" class="btn btn-sm btn-primary" id="guardar-curso">Guardar</button>
        </div>
    </div>
</div>
</div>






  <!-- Libreria jQuery -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Lightbox -->
<script src="../vendor/lightbox/js/lightbox.min.js"></script>


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
function listarMascotas() {

$.ajax({
    url: '../controllers/mascotas.controllers.php',
    type: 'GET',
    data: 'operacion=listarMascotas',
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

}//fin de la función listarEscuelas() 


listarMascotas()
</script>
</body>
</html>