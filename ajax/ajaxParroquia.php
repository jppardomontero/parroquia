<?php

require_once "../controladores/CtrlParroquia.php";

require_once "../modelos/MdlParroquia.php";

class personaAjax
{
    
    public $idParroquia;

    public function eliminarParroquiaAjax(){
        $parametro = "idParroquia";
        $idParroquia = $this->idParroquia;
        $respuesta = ControladorParroquia::ctrlMostrarParroquia($parametro, $idParroquia);
        unlink("../".$respuesta['logo']);
        unlink("../".$respuesta['wallpapers']);
        ControladorParroquia::ctrlEliminarParroquia($idParroquia);

        echo json_encode($respuesta);
    }
   
    
    public function modificarParroquiaAjax(){
        $parametro = "idParroquia";
        $idParroquia = $this->idParroquia;
        $respuesta = ControladorParroquia::ctrlMostrarParroquia($parametro, $idParroquia);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["idParroquia"])){
     
    $obj_Parroquia = new  personaAjax();
    $obj_Parroquia -> idParroquia = $_POST["idParroquia"]; 
    switch($_POST["funcion"]){
        case "funcion1":
            $obj_Parroquia -> modificarParroquiaAjax();   
        break;
        case "funcion2":
            $obj_Parroquia -> eliminarParroquiaAjax(); 
    }
    
}