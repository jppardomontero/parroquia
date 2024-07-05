<?php
require_once "../../controladores/CtrlCertificadoBautizo.php";

require_once "../../modelos/MdlCertificadoBautizo.php";
require('fpdf.php');

class Reporte_Bautizo extends FPDF
{
    public $codigo;
    function FeBautizo()
    {
        $persona = $this->codigo;

        $this->AddPage();
        $this->SetDrawColor(0, 80, 180);
        $this->SetLineWidth(1);
        $this->SetFont('Times', 'B', 20);
       

        //Consultas
        $parroquia = ControladorCertificadoBautizo::ctrlConsultarNombre($persona);
        $bautizo = ControladorCertificadoBautizo::ctrlConsultaBautizoDatos($persona);
        $padre = ControladorCertificadoBautizo::ctrlConsultaBautizoPadres($persona, 'Padre');
        $madre = ControladorCertificadoBautizo::ctrlConsultaBautizoPadres($persona, 'Madre');
        $sacerdote = ControladorCertificadoBautizo::ctrlConsultaBautizoParroco($parroquia['id']);

        //$fechaNacimento  = date("Y-m-d", strtotime($bautizo['f_nacimiento']));
        $fechaNacimento = DateTime::createFromFormat('d/m/Y', $bautizo['f_nacimiento'])->format('Y-m-d');
        $fechaBautismo = DateTime::createFromFormat('d/m/Y', $bautizo['fecha'])->format('Y-m-d');

        
       
        //Encabezado
        $this->Image('img/Fe-Bautizo.jpg', 18, 15, 33);
        $this->Text(110-$this->GetStringWidth(utf8_decode("Fé Bautismo"))/2,22,utf8_decode("Fé Bautismo"));

        $this->SetFont('Times', 'B', 16);
        $this->Text(110-$this->GetStringWidth(utf8_decode($parroquia['parroquias']))/2,28,utf8_decode($parroquia['parroquias']));

        $this->SetFont('Times', '', 16);
        $this->Text(110-$this->GetStringWidth(utf8_decode($parroquia['localidad']))/2,34,utf8_decode($parroquia['localidad']));
        
        $this->SetFont('Times', '', 13);
        $this->Text(100, 45,utf8_decode($parroquia['parroquia']. strftime(" %d de %B de %Y")));

        //Cuerpo
        $this->SetFont('Times', 'b', 13);
        $this->Text(20, 50, utf8_decode('Libro:'));
        $this->Text(20, 56, utf8_decode('Página:'));
        $this->Text(20, 62, utf8_decode('Acta:'));

        $this->Text(20, 72, utf8_decode('NOMBRES:'));
        $this->Text(100, 72, utf8_decode('APELLIDOS:'));
        $this->Text(20, 78, utf8_decode('PADRE:'));
        $this->Text(100, 78, utf8_decode('MADRE:'));
        $this->Text(20, 84, utf8_decode('NACIÓ:'));
        $this->Text(20, 89, utf8_decode('BAUTIZADO EL:'));
        $this->Text(20, 95, utf8_decode('NOTA MARGINAL:'));
        $this->Text(20, 101, utf8_decode('Así consta en el Libro de Bautismo de esta Parroquia.- LO CERTIFICO'));
        $this->Text(105-$this->GetStringWidth(utf8_decode("PÁRROCO"))/2,130,utf8_decode("PÁRROCO"));

        $this->SetFont('Times', '', 12);
        $this->Text(37, 50, utf8_decode($bautizo['tomo']));
        $this->Text(37, 56, utf8_decode($bautizo['pagina']));
        $this->Text(37, 62, utf8_decode($bautizo['acta']));

        $this->Text(47, 72, utf8_decode($bautizo['nombres']));
        $this->Text(130, 72, utf8_decode($bautizo['apellidos']));

        $this->Text(40, 78, utf8_decode($padre['nombres']." ". $padre['apellidos']));
        $this->Text(122, 77, utf8_decode($madre['nombres']." ". $madre['apellidos']));

        $this->Text(40, 84, utf8_decode($bautizo['lugar_nacimiento']). " ". strftime("%d de %B de %Y", strtotime($fechaNacimento)));
        $this->Text(60, 89, utf8_decode($bautizo['lugar']). " ". strftime("%d de %B de %Y", strtotime($fechaBautismo)));
        $this->Text(65, 95, utf8_decode($bautizo['nota_marginal']));


        $this->Text(65, 95, utf8_decode($bautizo['nota_marginal']));

        $this->Text(105-$this->GetStringWidth(utf8_decode("P. ".$sacerdote['nombres_apellidos']))/2,125,utf8_decode("P. ".$sacerdote['nombres_apellidos']));
        
        

        //Cuadro
        $this->Line(14, 13, 196, 13);
        $this->Line(14, 135, 196, 135);
        $this->Line(14, 13, 14, 135);
        $this->Line(196, 13, 196, 135);

        $this->Output();
    }
}
$pdf = new Reporte_Bautizo('L', 'mm', 'A5');
date_default_timezone_set('America/Guayaquil');
setlocale(LC_TIME, "spanish");
$pdf -> codigo = $_GET["codigo"];
$pdf->FeBautizo();
$pdf->Output();

