<?php

require_once "../controladores/CtrlUsuario.php";

require_once "../modelos/MdlUsuario.php";

class usuarioAjax
{
    
    public $idUsuario;
   
    public function EliminarUsuarioAjax($idUsuario){
        //$parametro = "idPersona";
        //$idPersona = $this->idPersona;
        $respuesta = (ControladorUsuario::ctrlEliminarUsuario($idUsuario));
        echo json_encode($respuesta);

        
    }

    public function modificarUsuarioAjax(){
        $parametro = "idUsuario";
        $idUsuario = $this->idUsuario;
        $respuesta = ControladorUsuario::ctrlMostrarUsuario($parametro, $idUsuario);
        
        echo json_encode($respuesta);
    }

}

if (isset($_POST["idUsuario"])){
     
    $objUsuario = new  usuarioAjax();
    $objUsuario -> idUsuario = $_POST["idUsuario"]; 
    switch($_POST["funcion"]){
        case "funcion1":
            $objUsuario -> modificarUsuarioAjax();   
        break;
        case "funcion2": 
            $objUsuario -> EliminarUsuarioAjax($objUsuario -> idUsuario); 
            break;
    }
    
}