<?php

require_once "../controladores/CtrlMatriculas.php";
require_once "../modelos/MdlMatriculas.php";

class matriculasAjax
{
    
    public $idMatriculas;
   
    public function EliminarMatriculasAjax($idMatriculas){
        //$parametro = "idMatriculas";
        //$idNieveles = $this->idMatriculas;
        $respuesta = (ControladorMatriculas::ctrlEliminarMatriculas($idMatriculas));
        echo json_encode($respuesta);

        
    }

    public function modificarMatriculasAjax(){
        $parametro = "idMatriculas";
        $idMatriculas = $this->idMatriculas;
        $respuesta = ControladorMatriculas::ctrlMostrarMatriculas($parametro, $idMatriculas);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["idMatriculas"])){
     
    $obj_Matriculas = new  matriculasAjax();
    $obj_Matriculas -> idMatriculas = $_POST["idMatriculas"]; 
    switch($_POST["funcion"]){
        case "funcion1":
            $obj_Matriculas -> modificarMatriculasAjax();   
        break;
        case "funcion2":
            $obj_Niveles -> EliminarMatriculasAjax($obj_Matriculas -> idMatriculas); 
    }
    
}