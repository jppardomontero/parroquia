<?php
class ControladorCertificadoBautizo{
     //Contrador para consultar el nombre de parroquia
     static public function ctrlConsultarNombre($datos){

        $res = ModeloCertificadoBautizo::mdlConsultarNombre($datos);
        return $res;
    }

    //Contrador para consultar nombre de la persosan condatos del bautismo
    static public function ctrlConsultaBautizoDatos($datos){

        $res = ModeloCertificadoBautizo::mdlConsultarBautizoDatos($datos);
        return $res;
    }

    //Contrador para consultar nombre de las padres  del bautisadp
    static public function ctrlConsultaBautizoPadres($datos, $rol){

        $res = ModeloCertificadoBautizo::mdlConsultarBautizoPadres($datos, $rol);
        return $res;
    }

    //Contrador para consultar nombre de Parroco
    static public function ctrlConsultaBautizoParroco($datos){

        $lista = ['id_parroquia' => $datos,
                'tipo_empleado' => 'Sacerdote',
                'estado' => 'Activo',
                'rango' => 'Párroco'];
        $res = ModeloCertificadoBautizo::mdlConsultarParroco($lista);
        return $res;
    }

}