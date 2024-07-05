<?php
class ControladorCertificadoPrimeraComunion{
     //Contrador para consultar el nombre de parroquia
     static public function ctrlConsultarNombre($datos){

        $res = ModeloCertificadoPrimeraComunion::mdlConsultarNombre($datos);
        return $res;
    }

    //Contrador para consultar nombre de la persosan condatos del bautismo
    static public function ctrlConsultaPrimeraComunionDatos($datos){

        $res = ModeloCertificadoPrimeraComunion::mdlConsultarPrimeraComunionDatos($datos);
        return $res;
    }

    //Contrador para consultar nombre de las padres  del bautisadp
    static public function ctrlConsultaPrimeraComunionPadres($datos, $rol){

        $res = ModeloCertificadoPrimeraComunion::mdlConsultarPrimeraComunionPadres($datos, $rol);
        return $res;
    }

    //Contrador para consultar nombre de Parroco
    static public function ctrlConsultaPrimeraComunionParroco($datos){

        $lista = ['id_parroquia' => $datos,
                'tipo_empleado' => 'Sacerdote',
                'estado' => 'Activo',
                'rango' => 'Párroco'];
        $res = ModeloCertificadoPrimeraComunion::mdlConsultarParroco($lista);
        return $res;
    }

}
