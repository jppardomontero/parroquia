<?php

require_once("conexion.php");


class ModeloMatriculas
{

    // Modelo para guardar datos de Matriculas
    static public function mdlGuardaMatriculas($tabla, $datos)
    {

        try {
            echo "<script>console.log('datos a guardar: " . json_encode($datos) . "' );</script>";

            $stm = conexion::conectar()->prepare("INSERT INTO $tabla (id_persona, id_nivel_catesismo, partida_matrimonio, fe_bautismo, tarjeta_parroquial, estado, id_parroquia) VALUES(:id_persona, :id_nivel_catesismo, :partida_matrimonio, :fe_bautismo, :tarjeta_parroquial, :estado, :id_parroquia)");

            $stm->bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
            $stm->bindParam(":id_nivel_catesismo", $datos["id_nivel_catesismo"], PDO::PARAM_INT);
            $stm->bindParam(":partida_matrimonio", $datos["partida_matrimonio"], PDO::PARAM_STR);
            $stm->bindParam(":fe_bautismo", $datos["fe_bautismo"], PDO::PARAM_STR);
            $stm->bindParam(":tarjeta_parroquial", $datos["tarjeta_parroquial"], PDO::PARAM_STR);
            $stm->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stm->bindParam(":id_parroquia", $datos["id_parroquia"], PDO::PARAM_INT);


            echo "<script>console.log('datos a consulta: " . json_encode($stm) . "' );</script>";
            if ($stm->execute()) {
                return "Suscribete";
            } else {

                return "Error";
            }
        } catch (PDOException $error) {
        }
    }
    // Modelo para mostrar datos de matriculas
    static public function mdlMostrarMatriculas($parametros, $datos)
    {

        if ($parametros != null) {
            $stm = conexion::conectar()->prepare("SELECT * FROM matriculas_catesismo WHERE id=:datos");
            $stm->bindParam(":datos", $datos, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        } else {

            $stm = conexion::conectar()->prepare("SELECT matriculas_catesismo.id, persona.nombres, persona.apellidos, niveles_catesismo.nombres as nombre_nivel, matriculas_catesismo.estado FROM matriculas_catesismo INNER JOIN persona ON persona.id = matriculas_catesismo.id_persona INNER JOIN niveles_catesismo ON niveles_catesismo.id = matriculas_catesismo.id_nivel_catesismo WHERE matriculas_catesismo.estado = 'En curso' AND matriculas_catesismo.id_parroquia = :id_parroquia");
            $stm->bindParam(":id_parroquia", $_SESSION['parroquia'], PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetchAll();
        }
    }

    // Modelo para guardar datos de matricula
    static public function mdlModificarMatriculas($tabla, $datos)
    {


        $stm = conexion::conectar()->prepare("UPDATE $tabla SET partida_matrimonio=:partida_matrimonio, fe_bautismo=:fe_bautismo, tarjeta_parroquial=:tarjeta_parroquial, estado=:estado WHERE id=:id");

        $stm->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stm->bindParam(":partida_matrimonio", $datos["partida_matrimonio"], PDO::PARAM_STR);
        $stm->bindParam(":fe_bautismo", $datos["fe_bautismo"], PDO::PARAM_STR);
        $stm->bindParam(":tarjeta_parroquial", $datos["tarjeta_ parroquial"], PDO::PARAM_STR);
        $stm->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

        if ($stm->execute()) {
            return "Suscribete";
        } else {

            return "Error";
        }
    }
    // Modelo para eliminar datos de matricula
    static public function mdlEliminarMatriculas($tabla, $parametros)
    {
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm->bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
    }


    static public function mdlMostrarPersona($parametros, $datos)
    {

        $stm = conexion::conectar()->prepare("SELECT * FROM persona 
                                                WHERE NOT EXISTS (SELECT NULL FROM matriculas_catesismo
                                                WHERE matriculas_catesismo.id_persona = persona.id)");

        $stm->execute();
        return $stm->fetchAll();
    }
}
