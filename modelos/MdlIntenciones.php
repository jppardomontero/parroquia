<?php

require_once("conexion.php");


class ModeloIntenciones
{

    // Modelo para guardar datos de Intenciones
    static public function mdlGuardarIntenciones($tabla, $datos)
    {

        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (id_eucaristia, nombres, valor ) VALUES(:id_eucaristia, :nombres, :valor)");
        $stm->bindParam(":id_eucaristia", $datos["id_eucaristia"], PDO::PARAM_INT);
        $stm->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stm->bindParam(":valor", $datos["valor"], PDO::PARAM_INT);

        if ($stm->execute()) {
            return "Suscribete";
        } else {

            return "Error";
        }
    }

    static public function mdlmostrarintencion()
    {
        try {
            $stm = conexion::conectar()->prepare("SELECT * FROM eucaristias
        WHERE DATE(STR_TO_DATE(fecha, '%e/%c/%Y')) >= Date_format(now(),'%Y-%c-%e') AND
        TIME(STR_TO_DATE(hora, '%H:%i'))>= Date_format(now(),'%H:%i')");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $eroor) {
        }
    }

    // Modelo para mostrar datos de Intenciones
    static public function mdlMostrarIntenciones($parametros, $datos)
    {

        if ($parametros != null) {
            $stm = conexion::conectar()->prepare("SELECT * FROM intenciones WHERE id=:datos");
            $stm->bindParam(":datos", $datos, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch();
        } else {
            $stm = conexion::conectar()->prepare("SELECT eucaristias.id, eucaristias.nombre as nombre_eucaristia, eucaristias.fecha, eucaristias.hora, intenciones.nombres as nombre_intension FROM eucaristias INNER JOIN intenciones ON intenciones.id_eucaristia = eucaristias.id");

            $stm->execute();
            return $stm->fetchAll();
        }
    }

    // Modelo para guardar datos de Intenciones
    static public function mdlModificarIntenciones($tabla, $datos)
    {


        $stm = conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, fecha=:fecha, hora=:hora, descripcion=:descripcion WHERE id=:id");
        $stm->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stm->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stm->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stm->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
        $stm->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);


        if ($stm->execute()) {
            return "Suscribete";
        } else {

            return "Error";
        }
    }

    static public function mdlEliminarIntenciones($tabla, $parametros)
    {
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm->bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
    }
}
