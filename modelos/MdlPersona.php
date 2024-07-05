<?php

require_once ("conexion.php");


 class ModeloPersona{

    // Modelo para guardar datos de persona
    static public function mdlGuardarPersona($tabla, $datos){
      
        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (cedula, nombres, apellidos, f_nacimiento, genero, estado_civil, lugar_nacimiento, nacionalidad, profesion) VALUES(:cedula, :nombres, :apellidos, :f_nacimiento, :genero, :estado_civil, :lugar_nacimiento, :nacionalidad, :profesion)");
        $stm -> bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
        $stm -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stm -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stm -> bindParam(":f_nacimiento", $datos["f_nacimiento"], PDO::PARAM_STR);
        $stm -> bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
        $stm -> bindParam(":estado_civil", $datos["estado_civil"], PDO::PARAM_STR);
        $stm -> bindParam(":lugar_nacimiento", $datos["lugar_nacimiento"], PDO::PARAM_STR);
        $stm -> bindParam(":nacionalidad", $datos["nacionalidad"], PDO::PARAM_STR);
        $stm -> bindParam(":profesion", $datos["profesion"], PDO::PARAM_STR);

    
        
        if ($stm->execute()){
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }

    // Modelo para mostrar datos de persona
    static public function mdlMostrarPersona($parametros, $datos){

        if($parametros!=null){
            $stm = conexion::conectar()->prepare("SELECT * FROM persona WHERE id=:datos");
 		    $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
 		    $stm->execute();
 		    return $stm->fetch();

        }else{
            $stm = conexion::conectar()->prepare("SELECT * FROM persona");
 		
            $stm->execute();
            return $stm->fetchAll();
        }

       
    }

    // Modelo para guardar datos de persona
    static public function mdlModificarPersona($tabla, $datos){
      

        $stm = conexion::conectar()->prepare("UPDATE $tabla SET cedula=:cedula, nombres=:nombres, apellidos=:apellidos, f_nacimiento=:f_nacimiento, genero=:genero, estado_civil=:estado_civil,lugar_nacimiento=:lugar_nacimiento, nacionalidad=:nacionalidad, profesion=:profesion WHERE id=:id");
        $stm -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stm -> bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
        $stm -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stm -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stm -> bindParam(":f_nacimiento", $datos["f_nacimiento"], PDO::PARAM_STR);
        $stm -> bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
        $stm -> bindParam(":estado_civil", $datos["estado_civil"], PDO::PARAM_STR);
        $stm -> bindParam(":lugar_nacimiento", $datos["lugar_nacimiento"], PDO::PARAM_STR);
        $stm -> bindParam(":nacionalidad", $datos["nacionalidad"], PDO::PARAM_STR);
        $stm -> bindParam(":profesion", $datos["profesion"], PDO::PARAM_STR);


    
        
        if ($stm->execute()){
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }

    static public function mdlEliminarPersona($tabla, $parametros){
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm -> bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
        

    }

 }