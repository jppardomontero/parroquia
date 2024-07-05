<?php
require_once ("conexion.php");
class ModeloCertificadoPrimeraComunion{
    //Contrador para consultar el nombre de parroquia
    static public function mdlConsultarNombre($datos){

        $stm = conexion::conectar()->prepare("SELECT parroquias.id, parroquias.nombre as parroquias, parroquias.localidad, parroquias.parroquia FROM parroquias 
        INNER JOIN primera_comunion on primera_comunion.id_parroquia = parroquias.id
        WHERE primera_comunion.id = :datos");
 		$stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
    }


     //Contrador para consultar nombre de la persosan condatos del bautismo
     static public function mdlConsultarPrimeraComunionDatos($datos){

        $stm = conexion::conectar()->prepare("SELECT persona.nombres, persona.apellidos, persona.lugar_nacimiento, persona.f_nacimiento, primera_comunion.lugar, primera_comunion.fecha FROM persona
        INNER JOIN primera_comunion ON primera_comunion.id_persona = persona.id
        
        WHERE primera_comunion.id = :datos");
 		$stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
    }

      //Contrador para consultar nombre de la persosan condatos del bautismo
      static public function mdlConsultarPrimeraComunionPadres($datos, $rol){

        $stm = conexion::conectar()->prepare("SELECT persona.nombres, persona.apellidos FROM primera_comunion
        INNER JOIN familia on familia.id = primera_comunion.id_familia
        INNER JOIN formacion_familia on formacion_familia.id_familia = familia.id
        INNER JOIN persona ON persona.id = formacion_familia.id_persona
        
        WHERE formacion_familia.rol =:rol AND primera_comunion.id = :datos");
 		$stm -> bindParam(":rol", $rol, PDO::PARAM_STR);
 		$stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
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