<?php

require_once("conexion.php");


class ModeloPrimeraComunion
{
    // Modelo para mostrar datos de persona
    static public function mdlMostrarPersonaPrimeraComunion($parametros, $datos)
    {

        if ($parametros != null) {
            $stm = conexion::conectar()->prepare("SELECT * FROM persona WHERE id=:datos");
            $stm->bindParam(":datos", $datos, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        } else {
            $stm = conexion::conectar()->prepare("SELECT primera_comunion.id, persona.nombres, persona.apellidos, primera_comunion.lugar, primera_comunion.fecha FROM primera_comunion INNER JOIN persona ON persona.id = primera_comunion.id_persona");
            $stm->execute();
            return $stm->fetchAll();
        }
    }

    static public function mdlMostrarPersonaFamilia($idPersona)
    {
        $stm = conexion::conectar()->prepare("SELECT familia.nombres AS familia, familia.id AS CodigoFamilia FROM familia
                                            INNER JOIN formacion_familia ON familia.id = formacion_familia.id_familia
                                            INNER JOIN persona ON persona.id = formacion_familia.id_persona
                                            WHERE persona.id=:idPersona");
        $stm->bindParam(":idPersona", $idPersona, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }

    static public function mdlGuardarPrimeraComunion($tabla, $datos)
    {

        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (id_persona, id_familia, id_usuario, lugar, fecha, id_parroquia) VALUES(:id_persona, :id_familia, :id_usuario, :lugar, :fecha, :id_parroquia)");
        $stm->bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
        $stm->bindParam(":id_familia", $datos["id_familia"], PDO::PARAM_INT);
        $stm->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stm->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
        $stm->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stm->bindParam(":id_parroquia", $datos["id_parroquia"], PDO::PARAM_INT);



        if ($stm->execute()) {

            return "Suscribete";
        } else {

            return "Error";
        }
    }


    // Modelo para mostrar datos de persona
    static public function mdlMostrarPrimeraComunion($parametros, $datos)
    {

        if ($parametros != null) {
            $stm = conexion::conectar()->prepare("SELECT * FROM primera_comunion WHERE id=:datos");
            $stm->bindParam(":datos", $datos, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        } else {
            $stm = conexion::conectar()->prepare("SELECT primera_comunion.id, persona.nombres, persona.apellidos, primera_comunion.lugar, primera_comunion.fecha FROM primera_comunion
                                                        INNER JOIN persona ON persona.id = primera_comunion.id_persona");

            $stm->execute();
            return $stm->fetchAll();
        }
    }


    
    // Modelo para mostrar datos de persona
    static public function  mdlEditarPrimeraComunion($datos)
    {


        $stm = conexion::conectar()->prepare("SELECT primera_comunion.id, primera_comunion.id_persona, primera_comunion.id_familia, primera_comunion.lugar, primera_comunion.fecha, usuarios.nombres_apellidos AS sacerdote, persona.nombres, persona.apellidos FROM primera_comunion INNER JOIN persona on persona.id = primera_comunion.id_persona INNER JOIN usuarios ON usuarios.id = primera_comunion.id_usuario WHERE primera_comunion.id=:datos");
        $stm->bindParam(":datos", $datos, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }



    static public function mdlActualizarPrimeraComunion($tabla, $datos)
    {

        $stm = conexion::conectar()->prepare("UPDATE $tabla SET id_persona=:id_persona, id_familia=:id_familia, lugar=:lugar, fecha=:fecha WHERE id =:id");
        echo "<script>console.log('actualizar: " . json_encode($stm) . "' );</script>";
        $stm->bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
        $stm->bindParam(":id_familia", $datos["id_familia"], PDO::PARAM_INT);
        $stm->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
        $stm->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stm->bindParam(":id", $datos["id"], PDO::PARAM_INT);



        if ($stm->execute()) {

            return "Suscribete";
        } else {

            return "Error";
        }
    }

    static public function mdlEliminarPrimeraComunion($tabla, $parametros){
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm -> bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
        

    }
}
