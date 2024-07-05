<?php

require_once "../controladores/CtrlEucaristia.php";

require_once "../modelos/MdlEucaristia.php";

class eucaristiaAjax
{
    
    public $idEucaristia;
   
    public function EliminarEucaristiaAjax($idEucaristia){
        //$parametro = "idEucaristia";
        //$idEucaristia = $this->idEucaristia;
        $respuesta = (ControladorEucaristia::ctrlEliminarEucaristia($idEucaristia));
        echo json_encode($respuesta);

        
    }

    public function GuardarValoresAjax($idEucaristia){
        //$parametro = "idEucaristia";
        //$idEucaristia = $this->idEucaristia;
        $respuesta = (ControladorEucaristia::ctrlEliminarEucaristia($idEucaristia));
        echo json_encode($respuesta);

        
    }

    public function modificarEucaristiaAjax(){
        $parametro = "idEucaristia";
        $idEucaristia = $this->idEucaristia;
        $respuesta = ControladorEucaristia::ctrlMostrarEucaristia($parametro, $idEucaristia);

        echo json_encode($respuesta);
    }

}

if (isset($_POST["idEucaristia"])){
     
    $obj_Eucaristia = new  eucaristiaAjax();
    $obj_Eucaristia -> idEucaristia = $_POST["idEucaristia"];
    switch($_POST["funcion"]){
        case "funcion1":
            $obj_Eucaristia -> modificarEucaristiaAjax();   
        break;
        case "funcion2":
            $obj_Eucaristia -> EliminarEucaristiaAjax($obj_Eucaristia -> idEucaristia); 
        break;

        case "funcion3":
            $obj_Eucaristia -> GuardarValoresAjax($obj_Eucaristia -> idEucaristia); 
        break;
    }
    
}