<?php

require_once "../controladores/CtrlNiveles.php";
require_once "../modelos/MdlNiveles.php";

class nivelesAjax
{
    
    public $idNiveles;
   
    public function EliminarNivelesAjax($idNiveles){
        //$parametro = "idNiveles";
        //$idNieveles = $this->idNiveles;
        $respuesta = (ControladorNiveles::ctrlEliminarNiveles($idNiveles));
        echo json_encode($respuesta);

        
    }

    public function modificarNivelesAjax(){
        $parametro = "idNiveles";
        $idNiveles = $this->idNiveles;
        $respuesta = ControladorNiveles::ctrlMostrarNiveles($parametro, $idNiveles);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["idNiveles"])){
     
    $obj_Niveles = new  nivelesAjax();
    $obj_Niveles -> idNiveles = $_POST["idNiveles"]; 
    switch($_POST["funcion"]){
        case "funcion1":
            $obj_Niveles -> modificarNivelesAjax();   
        break;
        case "funcion2":
            $obj_Niveles -> EliminarNivelesAjax($obj_Niveles -> idNiveles); 
    }
    
}