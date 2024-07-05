<?php

require_once("conexion.php");


class ModeloEucaristia
{

    // Modelo para guardar datos de eucaristia
    static public function mdlGuardarEucaristia($tabla, $datos)
    {

        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (nombre, fecha, hora, descripcion, id_parroquia ) VALUES(:nombre, :fecha, :hora, :descripcion, :id_parroquia )");
        $stm->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stm->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stm->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
        $stm->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stm->bindParam(":id_parroquia", $datos["id_parroquia"], PDO::PARAM_INT);

        if ($stm->execute()) {
            return "Suscribete";
        } else {

            return "Error";
        }
    }

    // Modelo para mostrar datos de eucaristia
    static public function mdlMostrarEucaristia($parametros, $datos)
    {

        if ($parametros != null) {
            $stm = conexion::conectar()->prepare("SELECT * FROM eucaristias WHERE id=:datos");
            $stm->bindParam(":datos", $datos, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch();
        } else {
            $parroquia = $_SESSION['parroquia'];
            $stm = conexion::conectar()->prepare("SELECT * FROM eucaristias WHERE id_parroquia=$parroquia");

            $stm->execute();
            return $stm->fetchAll();
        }
    }

    // Modelo para guardar datos de eucaristia
    static public function mdlModificarEucaristia($tabla, $datos)
    {

        echo 'hola';
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

    static public function mdlEliminarEucaristia($tabla, $parametros)
    {
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm->bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        $stm->fetch();
        return 1;
    }
    



   
}
