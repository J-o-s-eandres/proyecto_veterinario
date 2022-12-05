<?php

require_once "Conexion.php";

class Mascotas extends Conexion
{

    //En este Objeto almacenamos la conexion que obtenemos
    private $acceso;

    //constructor
    public function __construct()
    {
        // Cuando queramos acceder a una constante o metodo de una clase padre,
        // la palabra reservada parent nos sirve para llamarla desde una clase
        // extendida.
        $this->acceso = parent::getConexion();

    }


    public function listarMascotas(){
        try{
            //se Prepara la Consulta
            $consulta = $this->acceso->prepare("CALL spu_listarMascotas()");

            //ejecución de la cunsulta
            $consulta->execute();

            // Almacenamos el resultado de la consulta
            // fetchAll = todos los registros
            // FETCH_ASSOC = constante que representa a un array asociativo
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

            //retorna los datos
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function registrarMascotas($datosGuardar){
        try {
            $consulta = $this->acceso->prepare(" CALL spu_mascota_registrar(?,?,?,?,?,?)");

            $consulta->execute(array(
                $datosGuardar['idraza'],
                $datosGuardar['nombre'],
                $datosGuardar['fechaNac'],
                $datosGuardar['peso'],
                $datosGuardar['color'],
                $datosGuardar['fotografia']
            ));
            //no retorna datos
        
        
        }catch(Exception $e){
            die($e->getMessage());

        }



    }



    public function listarRazas(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_listarRazas()");

            $consulta->execute();

            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;


        }catch(Exception $e) {
            die($e->getMessage());
        
        }
    }

}

?>