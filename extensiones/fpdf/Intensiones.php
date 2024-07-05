<?php
 require_once "../../controladores/CtrlReporteIntensiones.php";

 require_once "../../modelos/MdlReporteIntensiones.php";

require('fpdf.php');

class Reporte_Intensiones extends FPDF{
    public $codigo;
    function rptIntensiones()
    {
        $this->AddPage();
        $id_eucaristia = $this->codigo;

        //Consultas
        $fecha = date("d/m/Y");
        $eucaristia = ControladorReporteIntensiones::crtlConsultarEucaristia($id_eucaristia);

        $descripcion = $eucaristia['nombre'].'-'.$eucaristia['fecha'].'-'.$eucaristia['hora'];
        $valor = $eucaristia['valor'];
        $datos = array('fecha' => $fecha,
                        'descripcion' => $descripcion,
                        'costo' => $valor);
        $res = ControladorReporteIntensiones::crtlGuardarEucaristiaValor($datos);
        $intenciones = ControladorReporteIntensiones::crtlConsultarIntenciones($id_eucaristia);
        $parroquia = ControladorReporteIntensiones::crtlConsultarParroquia(($eucaristia['id_parroquia']));

        // 
        // . utf8_decode(strtoupper($eucaristia['nombre'])). ' '.$eucaristia['fecha']. ' '.$eucaristia['hora']


        //Encabezado
        $this->image('../../'.$parroquia['logo'], 20, 20, 10);
    

        $this->SetFont('Times', 'B', 18);
        $this->Text(110-$this->GetStringWidth(utf8_decode($parroquia['nombre']))/2,28,utf8_decode($parroquia['nombre']));

        $this->SetFont('Times', 'B', 14);
        $this->Text(110-$this->GetStringWidth(utf8_decode($parroquia['localidad']))/2,36,utf8_decode($parroquia['localidad']));



        $this->SetFont('Times', 'B', 14);
        $this->Text(105-$this->GetStringWidth(utf8_decode('INTENCIONES DE LA EUCARISTÍA '.(strtoupper($eucaristia['nombre']))))/2,55,utf8_decode('INTENCIONES DE LA EUCARISTÍA '.(strtoupper($eucaristia['nombre']))) );
        $this->Text(105-$this->GetStringWidth(utf8_decode($eucaristia['fecha']." ".$eucaristia['hora']))/2,61,utf8_decode($eucaristia['fecha']." ".$eucaristia['hora']) );

        $datos = 70;
        $this->SetFont('Times', '', 13);
        foreach($intenciones as $key=>$value){
            //$this->Text(20, $datos, utf8_decode($value['nombres']));
            $this->SetXY(15, $datos);
            $this->MultiCell(180, 8, utf8_decode($value['nombres']));
            $datos = $datos+20;
        }
        
        

        
    }

}
$pdf = new Reporte_Intensiones();
date_default_timezone_set('America/Guayaquil');
setlocale(LC_TIME, "spanish");
$pdf -> codigo = $_GET["codigo"];
$pdf->rptIntensiones();
$pdf->Output();