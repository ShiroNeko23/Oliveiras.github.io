<?php
ob_start();
include('fpdf/fpdf.php');
require_once 'cn.php';$conex=new ConexionBD();
class Report extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','I',11);
    // Movernos a la derecha
    $this->Cell(110);
     // Título
     $this->Ln(5);
     $this->Cell(500,10,'Hoy: '.date('d-m-Y').'',0,0,'C');
     $this->SetFont('Arial','B',12);
     $this->Ln(5);
     $this->Cell(280,10,'LIRIOS OLIVEIRA',0,0,'C');
     $this->Image('imagenes/lil2.png',170,20,10);
     $this->Ln(20);
     $this->Cell(10);
     $this->Cell(50,10,'LISTA DE PRODUCTOS: ',0,0,'C');
     $this->Ln(20);
     $this->Cell(10);
     $this->Cell(50,10,'Variedad: '.$_GET['idcb1'].'',0,0,'C'); 
     $this->Cell(200,10,'Estado: '.$_GET['idcb2'].'',0,0,'C'); 
    // Salto de línea
    $this->Ln(20);
    $this->Cell(45);
    $this->Cell(60, 10, utf8_decode('Descripción'), 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Tipo de Variedad', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Calibre', 1, 0, 'C', 0);
    $this->Cell(30, 10, utf8_decode('Cantidad'), 1, 0, 'C', 0);
    $this->Cell(40, 10, utf8_decode('Precio de Paquete'), 1, 0, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}


$report = new Report('L');
$report->AliasNbPages();
$report->AddPage();
$report->SetFont('Arial','B',11);
$report->SetDisplayMode('fullpage');



foreach ($conex->conectar()->query("SELECT * FROM v_producto  where nom_variedad='".$_GET['idcb1']."' and Disponibilad='".$_GET['idcb2']."';" ) as $row) {
    $report->Ln();$report->SetX(55);
    $report->Cell(60, 10, utf8_decode($row['descripcion']), 1, 0, 'C', 0);
    $report->Cell(40, 10, utf8_decode($row['Tipo_variedad']), 1, 0, 'C', 0);
    $report->Cell(30, 10, utf8_decode($row['calibre']), 1, 0, 'C', 0); 
    $report->Cell(30, 10, $row['cantidad_producto'], 1, 0, 'C', 0); 
    $report->Cell(40, 10, $row['precio_paquete'], 1, 0, 'C', 0); 
} 

$report->Output();
ob_end_flush(); 
?>