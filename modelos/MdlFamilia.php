<?php

require_once ("conexion.php");


 class ModeloFamilia{

    // Modelo para guardar datos de Familia
    static public function mdlGuardarFamilia($tabla, $datos){
      
        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (nombres, descripcion) VALUES(:nombres, :descripcion)");

        $stm -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stm -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
       

        if ($stm->execute()){
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }

    // Modelo para mostrar datos de familia
    static public function mdlMostrarFamilia($parametros, $datos){

        if($parametros!=null){
            $stm = conexion::conectar()->prepare("SELECT * FROM familia WHERE id=:datos");
 		    $stm -> bindParam(":datos", $datos, PDO::PARAM_STR);
 		    $stm->execute();
 		    return $stm->fetch();

        }else{
            $stm = conexion::conectar()->prepare("SELECT * FROM familia");
 		
            $stm->execute();
            return $stm->fetchAll();
        }      
    }

    // Modelo para guardar datos de familia
    static public function mdlModificarFamilia($tabla, $datos){
      
        echo 'hola';
        $stm = conexion::conectar()->prepare("UPDATE $tabla SET nombres=:nombres, descripcion=:descripcion WHERE id=:id");

        $stm -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stm -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stm -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
   
        if ($stm->execute()){
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }

    // Modelo para eliminar datos de familia
    static public function mdlEliminarFamilia($tabla, $parametros){
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm -> bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
    }

 }