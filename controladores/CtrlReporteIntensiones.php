<?php
class ControladorReporteIntensiones{

    //Guardar datos de valores
    static public function crtlConsultarEucaristia ($parametros){
         $res = ModeloReporteIntensiones::mdlConsutarEucaristia($parametros);
         return $res;
    }

    //Guardardatos de valores
    static public function crtlGuardarEucaristiaValor ($parametros){
         $tabla= "valores";
         $res = ModeloReporteIntensiones::mdlGuardarEucaristiaValor($tabla, $parametros);
         return $res;
    }

       //Consulra de las intensiones
    static public function crtlConsultarIntenciones($parametros){
        $res = ModeloReporteIntensiones::mdlConsutarIntenciones($parametros);
        return $res;
        }

        //Consulta de los datos de la parroquia
    static public function crtlConsultarParroquia ($parametros){
        $res = ModeloReporteIntensiones::mdlConsutarParroquia($parametros);
        return $res;
    }
   

}