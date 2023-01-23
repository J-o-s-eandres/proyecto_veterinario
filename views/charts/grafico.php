<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico veterinaria</title>
      <!--  Boostrap 4.6 -->

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">



</head>
<body>

<style>
    .capa-lienzo{
    position: relative;
    margin: auto;
    height: 70vh;
    width: 70vw;
    margin-top: 30px;
    margin-left: 300px;
    }

    canvas{
    border: 1px dotted gray;
    }
</style>


<div class="titulo">
    <h2>Gráfico reporte anual</h2>
    <h4>Veterinaria Patitas Sanas</h4>

</div>

<hr>

<a href="../../index.php" class="btn btn-info">Volver</a><br>
<div class="capa-lienzo">
        <!-- Lienzo -->
        <canvas id="grafico"></canvas>
</div>







<!-- Librería chartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Datos para configurar el gráfico -->
<script src="../js/config-chart.js"></script>


<!-- Libreria jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



<script>
    // Paso 1: Manejador del Canvas
    const ctx = document.getElementById("grafico").getContext("2d");    

    
    //Paso 2 : Crear un Objeto "chart" = gráfico
    const graficoResumen = new Chart(ctx,{
        type: 'pie',
        data:{
            labels:[],
            datasets:[{
                label: 'Mascotas',
                data:[],
                backgroundColor:coloresFondo,
                borderColor:coloresBorde,//no funciona sino tiene borderWidth
                borderWidth:2
            }]
        },
        options:configGrafico
    });


    function getDataMascotas(){
        $.ajax({
            url:'../../controllers/mascotas.controllers.php',
            type:'GET',
            data: {'operacion': 'getResumenMascotas'},
            dataType : 'JSON',
            success : function(result){
                console.log(result);

                //recorremos todas las filas 
                //Inyectar resultados en el Gráfico
                result.forEach(value =>{
                    graficoResumen.data.labels.push(value.año);
                    graficoResumen.data.datasets[0].data.push(value.total)
                });
                graficoResumen.update();                
            }

        })
    }

getDataMascotas();

</script>
</body>
</html>