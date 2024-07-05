<?php 
require_once "../../controladores/CtrlCertificadoPrimeraComunion.php";

require_once "../../modelos/MdlCertificadoPrimeraComunion.php";
require('fpdf.php');

class Reporte_Primera_Comunion extends FPDF
{
    public $codigo;
    function PrimeraComunion()
    {
        $persona = $this->codigo;

        $this->AddPage();
        $this->SetDrawColor(0, 80, 180);
        $this->SetLineWidth(1);
        $this->SetFont('Times', 'B', 20);
       

        //Consultas
        $parroquia = ControladorCertificadoPrimeraComunion::ctrlConsultarNombre($persona);
        $primera_comunion = ControladorCertificadoPrimeraComunion::ctrlConsultaPrimeraComunionDatos($persona);
        $padre = ControladorCertificadoPrimeraComunion::ctrlConsultaPrimeraComunionPadres($persona, 'Padre');
        $madre = ControladorCertificadoPrimeraComunion::ctrlConsultaPrimeraComunionPadres($persona, 'Madre');
        $sacerdote = ControladorCertificadoPrimeraComunion::ctrlConsultaPrimeraComunionParroco($parroquia['id']);

        //$fechaNacimento  = date("Y-m-d", strtotime($bautizo['f_nacimiento']));
        $fechaNacimento = DateTime::createFromFormat('d/m/Y', $primera_comunion['f_nacimiento'])->format('Y-m-d');
        $fechaPrimeraComunion = DateTime::createFromFormat('d/m/Y', $primera_comunion['fecha'])->format('Y-m-d');
        //Encabezado
        
        $this->Image('img/Primera Comunion.jpg', 18, 15, 33);

        $this->SetFont('Times', 'B', 16);
        $this->Text(110-$this->GetStringWidth(utf8_decode($parroquia['parroquias']))/2,28,utf8_decode($parroquia['parroquias']));

        $this->SetFont('Times', '', 16);
        $this->Text(110-$this->GetStringWidth(utf8_decode($parroquia['localidad']))/2,34,utf8_decode($parroquia['localidad']));
        
        $this->SetFont('Times', '', 13);
        $this->Text(100, 45,utf8_decode($parroquia['parroquia']. strftime(" %d de %B de %Y")));

        //Cuerpo
        $this->SetFont('Times', 'b', 13);
        

        $this->Text(20, 72, utf8_decode('NOMBRES:'));
        $this->Text(100, 72, utf8_decode('APELLIDOS:'));
        $this->Text(20, 78, utf8_decode('PADRE:'));
        $this->Text(100, 78, utf8_decode('MADRE:'));
        $this->Text(20, 84, utf8_decode('NACIÓ:'));
        $this->Text(20, 89, utf8_decode('REALIZÓ LA PRIMERA COMUNION EL:'));
        $this->Text(20, 101, utf8_decode('Así consta en el Libro de Primera Comunion de esta Parroquia.- LO CERTIFICO'));
        $this->Text(105-$this->GetStringWidth(utf8_decode("PÁRROCO"))/2,130,utf8_decode("PÁRROCO"));

        $this->SetFont('Times', '', 12);
        
        $this->Text(47, 72, utf8_decode(strtoupper($primera_comunion['nombres'])));
        $this->Text(130, 72, utf8_decode(strtoupper($primera_comunion['apellidos'])));

        $this->Text(40, 78, utf8_decode(strtoupper($padre['nombres']." ". $padre['apellidos'])));
        $this->Text(122, 77, utf8_decode(strtoupper($madre['nombres']." ". $madre['apellidos'])));

        $this->Text(40, 84, utf8_decode($primera_comunion['lugar_nacimiento']). " ". strftime("%d de %B de %Y", strtotime($fechaNacimento)));
        $this->Text(20, 95, utf8_decode($primera_comunion['lugar']). " ". strftime("%d de %B de %Y", strtotime($fechaPrimeraComunion)));
        


        $this->Text(105-$this->GetStringWidth(utf8_decode("P. ".$sacerdote['nombres_apellidos']))/2,125,utf8_decode("P. ".$sacerdote['nombres_apellidos']));
        
        

        //Cuadro
        $this->Line(14, 13, 196, 13);
        $this->Line(14, 135, 196, 135);
        $this->Line(14, 13, 14, 135);
        $this->Line(196, 13, 196, 135);

        $this->Output();
    }
}
$pdf = new Reporte_Primera_Comunion('L', 'mm', 'A5');
date_default_timezone_set('America/Guayaquil');
setlocale(LC_TIME, "spanish");
$pdf -> codigo = $_GET["codigo"];
$pdf->PrimeraComunion();
$pdf->Output();
