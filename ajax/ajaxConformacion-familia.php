<?php


require_once "../controladores/CtrlConformacion-familia.php";
require_once "../controladores/CtrlPersona.php";
require_once "../controladores/CtrlFamilia.php";



require_once "../modelos/MdlConformacion-familia.php";
require_once "../modelos/MdlPersona.php";
require_once "../modelos/MdlFamilia.php";


class conformacionfamiliaAjax
{
    
    public $idPersona;
   

    public function traerPersonaAjax(){
        $parametro = "idPersona";
        $idPersona = $this->idPersona;
        $respuesta = ControladorConfornmacionfamilia::ctrlMostrarPersonaBautizo($parametro, $idPersona);

        echo json_encode($respuesta);
    }


    public function traerFamiliaAjax(){
        $parametro = "idPersona";
        $idPersona = $this->idPersona;
        $respuesta2 = ControladorConfornmacionfamilia::ctrlMostrarFamilia($parametro, $idPersona);

        $respuesta= array_merge($respuesta2);
        echo json_encode($respuesta);
    }







    public function EliminarConformacionFamiliaAjax($idPersona){
        $parametro = "idPersona";
        $idPersona = $this->idPersona;
        $respuesta = ControladorConfornmacionfamilia::ctrlEliminarConformacionFamilia($idPersona);
        echo json_encode($respuesta);   
    }



}


if (isset($_POST["idPersona"])){
     
    $obj_Persona = new  conformacionfamiliaAjax();
    $obj_Persona -> idPersona = $_POST["idPersona"];
    

     switch($_POST["funcion"]){
        case "funcion2":
            $obj_Persona -> traerFamiliaAjax(); 
        break;
        case "funcion1":
            $obj_Persona -> traerPersonaAjax(); 
        break;
        }    
}