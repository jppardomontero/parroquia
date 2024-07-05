<?php

require_once ("conexion.php");


 class ModeloNiveles{

    // Modelo para guardar datos de Niveles
    static public function mdlGuardaNiveles($tabla, $datos){
      
        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (nombres, requisito, descripcion) VALUES(:nombres, :requisito, :descripcion)");

        $stm -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stm -> bindParam(":requisito", $datos["requisito"], PDO::PARAM_STR);
        $stm -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
       
       

        if ($stm->execute()){
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }
     // Modelo para mostrar datos de niveles
     static public function mdlMostrarNiveles($parametros, $datos){

        if($parametros!=null){
            $stm = conexion::conectar()->prepare("SELECT * FROM niveles_catesismo WHERE id=:datos");
 		    $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
 		    $stm->execute();
 		    return $stm->fetch();

        }else{
            $stm = conexion::conectar()->prepare("SELECT * FROM niveles_catesismo");
 		
            $stm->execute();
            return $stm->fetchAll();
        }      
    }

    // Modelo para guardar datos de familia
    static public function mdlModificarNiveles($tabla, $datos){
      

        $stm = conexion::conectar()->prepare("UPDATE $tabla SET nombres=:nombres, requisito=:requisito, descripcion=:descripcion WHERE id=:id");

        $stm -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stm -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stm -> bindParam(":requisito", $datos["requisito"], PDO::PARAM_STR);
        $stm -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
   
        if ($stm->execute()){
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }
     // Modelo para eliminar datos de niveles
     static public function mdlEliminarNiveles($tabla, $parametros){
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm -> bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
    }

 }