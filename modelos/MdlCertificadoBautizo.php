<?php
require_once ("conexion.php");
class ModeloCertificadoBautizo{
    //Contrador para consultar el nombre de parroquia
    static public function mdlConsultarNombre($datos){

        $stm = conexion::conectar()->prepare("SELECT parroquias.id, parroquias.nombre as parroquias, parroquias.localidad, parroquias.parroquia FROM parroquias 
        INNER JOIN bautizo on bautizo.id_parroquia = parroquias.id
        WHERE bautizo.id = :datos");
 		$stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
    }

    
     //Contrador para consultar nombre de la persosan condatos del bautismo
     static public function mdlConsultarBautizoDatos($datos){

        $stm = conexion::conectar()->prepare("SELECT persona.nombres, persona.apellidos, persona.lugar_nacimiento, persona.f_nacimiento, bautizo.tomo, bautizo.acta, bautizo.pagina, bautizo.lugar, bautizo.fecha, bautizo.nota_marginal FROM persona
        INNER JOIN bautizo ON bautizo.id_persona = persona.id
        
        WHERE bautizo.id = :datos");
 		$stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
    }

      //Contrador para consultar nombre de la persosan condatos del bautismo
      static public function mdlConsultarBautizoPadres($datos, $rol){

        $stm = conexion::conectar()->prepare("SELECT persona.nombres, persona.apellidos FROM bautizo
        INNER JOIN familia on familia.id = bautizo.id_familia
        INNER JOIN formacion_familia on formacion_familia.id_familia = familia.id
        INNER JOIN persona ON persona.id = formacion_familia.id_persona
        
        WHERE formacion_familia.rol =:rol AND bautizo.id = :datos");
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