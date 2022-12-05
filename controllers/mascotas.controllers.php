<?php
require_once "../models/Mascotas.php";
$mascota = new Mascotas();

if (isset($_GET['operacion'])) {

    if ($_GET['operacion']== 'listarMascotas'){
        echo json_encode($mascota->listarMascotas());
    }


    if ($_GET['operacion'] == 'listarRazas') {
        echo json_encode($mascota->listarRazas());
    }
}


//Operaciones POST
if (isset($_POST['operacion'])){

    if($_POST['operacion']=='registrarMascotas'){
        $datosSolicitados = [
            "idraza"        => $_POST['idraza'],
            "nombre"        => $_POST['nombre'],
            "fechaNac"      => $_POST['fechaNac'],
            "peso"          => $_POST['peso'],
            "color"         => $_POST['color'],
            "fotografia"    => ""
            ];
    
            if(isset($_FILES['fotografia'])){
                //Carpeta
                $rutaDestino ="../views/images/mascotas/";
                
                //fechay hora
                $fechaActual = date("c"); //c = complete (FECHA + HORA)

                //Encriptando fecha y hora.jpg
                $nombreArchivo = sha1($fechaActual) . ".jpg";

                //Ruta final
                $rutaDestino.= $nombreArchivo;

                if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $rutaDestino)){
                    //Se logró subir el archivo

                    //Acciones por definir
                    $datosSolicitados['fotografia'] = $nombreArchivo;
                
            } // fin move_upload

        }//fin isset($_FILES)

        $mascota->registrarMascotas($datosSolicitados);

    }//fin isset[$_POST]

}


?>