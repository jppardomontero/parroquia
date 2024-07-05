<?php
  require_once "../../controladores/CtrlReporteMatriculas.php";

  require_once "../../modelos/MdlReporteMatricula.php";

require('fpdf.php');

class Reporte_Matriculas extends FPDF{
    public $codigo;
    function rptMatricula()
    {
        $this->AddPage();
        $id_matricula = $this->codigo;
        $estado = $this->estado;

        $actualizar = ControladorReporteMatricula::crtlModificarEstadoMatricula($estado, $id_matricula);
        $matricula = ControladorReporteMatricula::crtlConsultarmatricula($id_matricula);
        $parroquia = ControladorReporteMatricula::crtlConsultarParroquia(($matricula['id_parroquia']));
        $sacerdote = ControladorReporteMatricula::ctrlConsultaBautizoParroco($parroquia['id']);


        //
       
        // // 
        // // . utf8_decode(strtoupper($eucaristia['nombre'])). ' '.$eucaristia['fecha']. ' '.$eucaristia['hora']


        //Encabezado
        $this->image('../../'.$parroquia['logo'], 20, 20, 10);
    

        $this->SetFont('Times', 'B', 18);
        $this->Text(110-$this->GetStringWidth(utf8_decode($parroquia['nombre']))/2,28,utf8_decode($parroquia['nombre']));

        $this->SetFont('Times', 'B', 14);
        $this->Text(110-$this->GetStringWidth(utf8_decode($parroquia['localidad']))/2,36,utf8_decode($parroquia['localidad']));

        $this->SetFont('Times', '', 13);
        $this->Text(120, 50,utf8_decode($parroquia['parroquia']. strftime(" %d de %B de %Y")));

        $this->SetFont('Times', 'b', 14);
        $this->Text(40, 70,utf8_decode('CERTIFICA,'));

        $this->SetFont('Times', '', 13);
        $this->SetXY(40, 85);
        $this->MultiCell(110, 8, utf8_decode('Que  el  alumno '.strtoupper($matricula['nombres']." ".$matricula['apellidos']).
        " ha cursado y ha ".$matricula['estado']. " ". strtoupper($matricula['nombre_nivel'])."  catequesis"));

        

        $this->Text(105-$this->GetStringWidth(utf8_decode("P. ".$sacerdote['nombres_apellidos']))/2,135,utf8_decode("P. ".$sacerdote['nombres_apellidos']));


        
        

        
    }

}
$pdf = new Reporte_Matriculas('L', 'mm', 'A5');
date_default_timezone_set('America/Guayaquil');
setlocale(LC_TIME, "spanish");
$pdf -> codigo = $_GET["codigo"];
$pdf -> estado = $_GET["estado"];

$pdf->rptMatricula();
$pdf->Output();