<?php
require_once "../models/Mascotas.php";
$mascota = new Mascotas();

if (isset($_GET['operacion'])) {

    if ($_GET['operacion']== 'listarMascotas'){
        echo json_encode($mascota->listarMascotas());
    }
}
?>