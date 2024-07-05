<?php
class ControladorMatrimonio{

    //Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarPersonaMatrimonio($parametros, $datos){

        $res = ModeloMatrimonio::mdlMostrarPersonaMatrimonio($parametros, $datos);
        return $res;
    }

    //Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarMatrimonios($parametros, $datos){

        $res = ModeloMatrimonio::mdlMostrarMatrimonios($parametros, $datos);
        return $res;
    }
}