<?php
require_once("conexion.php");
class ModeloReporteMatricula
{

    //Modificar Estado de Matricula
    static public function mdlModificarEstadoMatricula($estado, $idMatricula)
    {


        $stm = conexion::conectar()->prepare("UPDATE matriculas_catesismo  SET estado=:estado WHERE id=:id");
        $stm->bindParam(":id", $idMatricula, PDO::PARAM_INT);
        $stm->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stm->execute();
        return $stm;
        
    }


     //Datos de Parroquia
     static public function mdlConsutarMatricula($idMatricula)
     {
 
 
        $stm = conexion::conectar()->prepare("SELECT matriculas_catesismo.id_parroquia, matriculas_catesismo.id, persona.nombres, persona.apellidos, niveles_catesismo.nombres as nombre_nivel, matriculas_catesismo.estado FROM matriculas_catesismo INNER JOIN persona ON persona.id = matriculas_catesismo.id_persona INNER JOIN niveles_catesismo ON niveles_catesismo.id = matriculas_catesismo.id_nivel_catesismo WHERE matriculas_catesismo.id = :id");
        $stm->bindParam(":id", $idMatricula, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
         
     }
 
  //Datos de Parroquia
    static public function mdlConsutarParroquia($parametros)
    {


        $stm = conexion::conectar()->prepare("SELECT * FROM parroquias WHERE id=:datos");
        $stm->bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
        
    }

     //Contrador para consultar nombre del parroco
     static public function mdlConsultarParroco($datos){

        $stm = conexion::conectar()->prepare("SELECT nombres_apellidos FROM usuarios
        WHERE id_parroquia = :id_parroquia AND tipo_empleado = :tipo_empleado
        AND estado = :estado AND rango = :rango");
 		$stm -> bindParam(":id_parroquia", $datos['id_parroquia'], PDO::PARAM_INT);
 		$stm -> bindParam(":tipo_empleado", $datos['tipo_empleado'], PDO::PARAM_STR);
 		$stm -> bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
 		$stm -> bindParam(":rango", $datos['rango'], PDO::PARAM_STR);
 		$stm->execute();
 		return $stm->fetch();
    }

}