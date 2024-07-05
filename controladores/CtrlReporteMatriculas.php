<?php
class ControladorReporteMatricula{


    //Consulta de los datos de la parroquia
    static public function crtlModificarEstadoMatricula ($estado, $idMatricula){
        $res = ModeloReporteMatricula::mdlModificarEstadoMatricula($estado, $idMatricula);
        return $res;
    }
    
    //Consulta de los datos de la parroquia
    static public function crtlConsultarParroquia ($parametros){
        $res = ModeloReporteMatricula::mdlConsutarParroquia($parametros);
        return $res;
    }


     //Consulta de los datos  de Mtricula
     static public function crtlConsultarmatricula ($parametros){
        $res = ModeloReporteMatricula::mdlConsutarMatricula($parametros);
        return $res;
    }

     //Contrador para consultar nombre de Parroco
     static public function ctrlConsultaBautizoParroco($datos){

        $lista = ['id_parroquia' => $datos,
                'tipo_empleado' => 'Sacerdote',
                'estado' => 'Activo',
                'rango' => 'Párroco'];
        $res = ModeloReporteMatricula::mdlConsultarParroco($lista);
        return $res;
    }
   

}