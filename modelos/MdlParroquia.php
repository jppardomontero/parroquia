<?php

require_once("conexion.php");


class ModeloParroquia
{

    // Modelo para guardar datos de parroquia
    static public function mdlGuardarParroquia($tabla, $datos)
    {

        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (nombre, logo, wallpapers) VALUES(:nombre, :logo, :wallpapers)");
        $stm->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stm->bindParam(":logo", $datos["logo"], PDO::PARAM_STR);
        $stm->bindParam(":wallpapers", $datos["wallpapers"], PDO::PARAM_STR);

        if ($stm->execute()) {
            return "Suscribete";
        } else {

            return "Error";
        }
    }

    // Modelo para mostrar datos de parroquia
    static public function mdlMostrarparroquia($parametros, $datos)
    {

        if ($parametros != null) {
            $stm = conexion::conectar()->prepare("SELECT * FROM parroquias WHERE id=:datos");
            $stm->bindParam(":datos", $datos, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        } else {
            $stm = conexion::conectar()->prepare("SELECT * FROM parroquias");

            $stm->execute();
            return $stm->fetchAll();
        }
    }

    // Consultar el último registro
    static public function mdlMostrarUtimoResgistroParroquia()
    {
        $stm = conexion::conectar()->prepare("SELECT * FROM parroquias ORDER by id DESC limit 1");
        $stm->execute();
        return $stm->fetch();
    }
    static public function mdlModificarParroquia($tabla, $datos)
    {

        echo 'hola';
        $stm = conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, logo=:logo, wallpapers=:wallpapers WHERE id=:id");
        $stm->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stm->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stm->bindParam(":logo", $datos["logo"], PDO::PARAM_STR);
        $stm->bindParam(":wallpapers", $datos["wallpapers"], PDO::PARAM_STR);

        if ($stm->execute()) {
            return "Suscribete";
        } else {

            return "Error";
        }
    }

    static public function mdlEliminarParroquia($tabla, $parametros)
    {
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm->bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
    }
}
