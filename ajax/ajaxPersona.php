<?php

require_once "../controladores/CtrlPersona.php";

require_once "../modelos/MdlPersona.php";

class personaAjax
{
    
    public $idPersona;
   
    public function EliminarPersonaAjax($idPersona){
        //$parametro = "idPersona";
        //$idPersona = $this->idPersona;
        $respuesta = (ControladorPerona::ctrlEliminarPersona($idPersona));
        echo json_encode($respuesta);

        
    }

    public function modificarPersonaAjax(){
        $parametro = "idPersona";
        $idPersona = $this->idPersona;
        $respuesta = ControladorPerona::ctrlMostrarPersona($parametro, $idPersona);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["idPersona"])){
     
    $obj_Persona = new  personaAjax();
    $obj_Persona -> idPersona = $_POST["idPersona"]; 
    switch($_POST["funcion"]){
        case "funcion1":
            $obj_Persona -> modificarPersonaAjax();   
        break;
        case "funcion2":
            $obj_Persona -> EliminarPersonaAjax($obj_Persona -> idPersona); 
    }
    
}