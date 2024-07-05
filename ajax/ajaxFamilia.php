<?php

require_once "../controladores/CtrlFamilia.php";

require_once "../modelos/MdlFamilia.php";

class familiaAjax
{
    
    public $idFamilia;
   
    public function EliminarFamiliaAjax($idFamilia){
        //$parametro = "idFamilia";
        //$idFamilia = $this->idFamilia;
        $respuesta = (ControladorFamilia::ctrlEliminarFamilia($idFamilia));
        echo json_encode($respuesta);

        
    }

    public function modificarFamiliaAjax(){
        $parametro = "idFamilia";
        $idFamilia = $this->idFamilia;
        $respuesta = ControladorFamilia::ctrlMostrarFamilia($parametro, $idFamilia);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["idFamilia"])){
     
    $obj_Familia = new  familiaAjax();
    $obj_Familia -> idFamilia = $_POST["idFamilia"]; 
    switch($_POST["funcion"]){
        case "funcion1":
            $obj_Familia -> modificarFamiliaAjax();   
        break;
        case "funcion2":
            $obj_Familia -> EliminarFamiliaAjax($obj_Familia -> idFamilia); 
    }
    
}