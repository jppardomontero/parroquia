<?php
require_once("conexion.php");
class ModeloReporteIntensiones
{

    //Datos de Eucaristia
    static public function mdlConsutarEucaristia($parametros)
    {


        $stm = conexion::conectar()->prepare("SELECT eucaristias.nombre, eucaristias.fecha, eucaristias.hora, eucaristias.descripcion,eucaristias.id_parroquia,SUM(intenciones.valor) as valor FROM eucaristias  INNER JOIN intenciones ON intenciones.id_eucaristia = eucaristias.id WHERE eucaristias.id=:datos");
        $stm->bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
        
    }


    //guardar valores 
    static public function mdlGuardarEucaristiaValor($tabla, $datos)
    {
        try{
            $stm = conexion::conectar()->prepare("INSERT INTO $tabla (fecha, costo, descripcion) VALUES(:fecha, :costo, :descripcion)");
            $stm->bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
            $stm->bindParam(":costo", $datos['costo'], PDO::PARAM_STR);
            $stm->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
            return $stm->execute();
        }catch(PDOException $e){

        }
      
    }

    static public function mdlConsutarIntenciones($parametros)
    {


        $stm = conexion::conectar()->prepare("SELECT * FROM intenciones WHERE id_eucaristia=:datos");
        $stm->bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll();
        
    }

    //Datos de Parroquia
    static public function mdlConsutarParroquia($parametros)
    {


        $stm = conexion::conectar()->prepare("SELECT * FROM parroquias WHERE id=:datos");
        $stm->bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
        
    }

}
