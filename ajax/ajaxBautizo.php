<?php


require_once "../controladores/CtrlBautizo.php";
require_once "../controladores/CtrlFamilia.php";



require_once "../modelos/MdlBautizo.php";
require_once "../modelos/MdlFamilia.php";


class bautizoAjax
{
    
    public $idPersona;
   

    public function traerPersonaAjax(){
        $parametro = "idPersona";
        $idPersona = $this->idPersona;
        $respuesta1 = ControladorBautizo::ctrlMostrarPersonaBautizo($parametro, $idPersona);
        $respuesta2 = ControladorBautizo::ctrlMostrarPersonaFamilia($idPersona);

        $respuesta= array_merge($respuesta1,$respuesta2);
        echo json_encode($respuesta);
    }

    public function modificarBautizoAjax(){
        $parametro = "idPersona";
        $idPersona = $this->idPersona;
        $respuesta = ControladorBautizo::ctrlDatosBautizo($idPersona);
        echo json_encode($respuesta);
    }

        public function EliminarBautizoAjax($idPersona){
        $respuesta = (ControladorBautizo::ctrlEliminarBautizo($idPersona));
        echo json_encode($respuesta);   
    }
}


if (isset($_POST["idPersona"])){
     
    $obj_Persona = new  bautizoAjax();
    $obj_Persona -> idPersona = $_POST["idPersona"]; 
    switch($_POST["funcion"]){
        case "funcion1":
            $obj_Persona -> traerPersonaAjax();   
        break;
        case "funcion2":
            $obj_Persona -> ModificarBautizoAjax(); 
        break;
        case "funcion3":
            $obj_Persona -> EliminarBautizoAjax($obj_Persona -> idPersona); 
        break;
        
    }
    
}



