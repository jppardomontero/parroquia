<?php

require_once ("conexion.php");


 class ModeloMatrimonio{
      // Modelo para mostrar datos de persona
    static public function mdlMostrarPersonaMatrimonio($parametros, $datos){

        if($parametros!=null){
            $stm = conexion::conectar()->prepare("SELECT * FROM familia WHERE id=:datos");
 		    $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
 		    $stm->execute();
 		    return $stm->fetch();

        }else{
            $stm = conexion::conectar()->prepare("SELECT * FROM familia 
                                                WHERE NOT EXISTS (SELECT NULL FROM matrimonio
                                                WHERE matrimonio.id_familia = familia.id)");
 		
            $stm->execute();
            return $stm->fetchAll();
        }  
    }
     // Modelo para mostrar datos de persona
     static public function mdlMostrarMatrimonios($parametros, $datos){

        if($parametros!=null){
            $stm = conexion::conectar()->prepare("SELECT * FROM matrimonio WHERE id=:datos");
 		    $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
 		    $stm->execute();
 		    return $stm->fetch();

        }else{
            $stm = conexion::conectar()->prepare("SELECT matrimonio.id, familia.nombres, matrimonio.libro, matrimonio.pagina, matrimonio.acta, matrimonio.nota_marginal, matrimonio.lugar, matrimonio.fecha FROM matrimonio 
                                                        INNER JOIN familia ON familia.id = matrimonio.id_familia");
 		
            $stm->execute();
            return $stm->fetchAll();
        }

       
    }
 }