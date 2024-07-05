<?php


require_once "../controladores/CtrlPrimeraComunion.php";
require_once "../controladores/CtrlFamilia.php";



require_once "../modelos/MdlPrimeraComunion.php";
require_once "../modelos/MdlFamilia.php";


class primera_comunionAjax
{
    
    public $idPersona;
   

    public function traerPersonaAjax(){
        $parametro = "idPersona";
        $idPersona = $this->idPersona;
        $respuesta1 = ControladorPrimeraComunion::ctrlMostrarPersonaPrimeraComunion($parametro, $idPersona);
        $respuesta2 = ControladorPrimeraComunion::ctrlMostrarPersonaFamilia($idPersona);

        $respuesta= array_merge($respuesta1,$respuesta2);
        echo json_encode($respuesta);
    }

    public function editarPrimeraComunionAjax(){
        $idPersona = $this->idPersona;
        $respuesta = ControladorPrimeraComunion::ctrlEditarPrimeraComunion($idPersona);
        echo json_encode($respuesta);
    }

    public function eliminarPrimeraComunionAjax($idPersona){
        
        $respuesta = (ControladorPrimeraComunion::ctrlEliminarPrimeraComunion($idPersona));
        echo json_encode($respuesta);
    }
}


if (isset($_POST["idPersona"])){
     
    $obj_Persona = new  primera_comunionAjax();
    $obj_Persona -> idPersona = $_POST["idPersona"]; 
    switch($_POST["funcion"])   {
        case "funcion1":
            $obj_Persona -> traerPersonaAjax();
        break;
        case "funcion2":
            $obj_Persona -> editarPrimeraComunionAjax();
        break;   

        case "funcion3":
            $obj_Persona -> eliminarPrimeraComunionAjax($obj_Persona -> idPersona);
        break;  
    }
}