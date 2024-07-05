<?php

require_once ("conexion.php");


class ModeloConfornmacionfamilia{

    // Modelo para mostrar datos de persona
    static public function mdlMostrarPersonaBatizo($parametros, $datos){

        if($parametros!=null){
            $stm = conexion::conectar()->prepare("SELECT * FROM persona WHERE id=:datos");
            $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();

        }else{
            $stm = conexion::conectar()->prepare("SELECT * FROM persona 
                WHERE NOT EXISTS (SELECT NULL FROM formacion_familia 
                WHERE formacion_familia.id_persona = persona.id)");
            
            $stm->execute();
            return $stm->fetchAll();
        }   
    }


    // Modelo para mostrar datos de familia
    static public function mdlMostrarFamilia($parametros, $datos){

        if($parametros!=null){
            $stm = conexion::conectar()->prepare("SELECT * FROM familia WHERE id=:datos");
            $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();

        }else{
            $stm = conexion::conectar()->prepare("SELECT * FROM familia");
            
            $stm->execute();
            return $stm->fetchAll();
        }       
    }







    // Modelo para Guardar conformacion de familia
    static public function mdlGuardarConformacionFamilia($tabla, $datos){

        try{

        echo "<script>console.log('datos a guardar: " . json_encode($datos) . "' );</script>";
        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (id_persona, id_familia, rol) VALUES(:id_persona, :id_familia, :rol)");
        $stm -> bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
        $stm -> bindParam(":id_familia", $datos["id_familia"], PDO::PARAM_INT);
        $stm -> bindParam(":rol", $datos["rol"], PDO::PARAM_STR);

 
        if ($stm->execute()){
           
            return "Suscribete";
        }else{
           
            return "Error";
       }
    } catch (PDOException $e){

    }
    }



    static public function mdlMostrarIdGuardado(){
        $stm = conexion::conectar()->prepare("SELECT MAX(id) AS id FROM formacion_familia");
         $stm->execute();
         return $stm->fetch();
    }





    // Modelo para mostrar datos de Conformacion familia
    static public function mdlMostrarConformacionfamilia($parametros, $datos){

        if($parametros!=null){
            $stm = conexion::conectar()->prepare("SELECT * FROM formacion_familia WHERE id=:datos");
            $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();

        }else{
            $stm = conexion::conectar()->prepare("SELECT formacion_familia.id, persona.nombres, persona.apellidos, familia.nombres AS nombrefamilia, formacion_familia.rol  FROM formacion_familia INNER JOIN persona ON persona.id = formacion_familia.id_persona INNER JOIN familia ON familia.id = formacion_familia.id_familia");

            $stm->execute();
            return $stm->fetchAll();
        }   
    }


 //Eliminar Conformacion Familia
     static public function mdlEliminarConformacionFamilia($tabla, $parametros){
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm -> bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
    }

 }