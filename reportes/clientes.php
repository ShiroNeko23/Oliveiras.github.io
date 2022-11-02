<?php
$var=$_POST['cbBuscarClientes'];
if($var=='null'){
    include('alerta1.php');
}else{
ob_start();
include('fpdf/fpdf.php');
require_once './cn.php';$conex=new ConexionBD();
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
$this->Cell(50,10,'LISTA DE CLIENTES: ',0,0,'C');
// Salto de línea
$this->Ln(20);
$this->Cell(20);
$this->Cell(47, 10, utf8_decode('Tipo de Identificación'), 1, 0, 'C', 0);
$this->Cell(45, 10, utf8_decode('Identificación'), 1, 0, 'C', 0);
$this->Cell(67, 10, 'Cliente', 1, 0, 'C', 0);
$this->Cell(50, 10, 'Correo', 1, 0, 'C', 0);
$this->Cell(30, 10, utf8_decode('Teléfono'), 1, 0, 'C', 0);

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



foreach ($conex->conectar()->query("SELECT * FROM vt_clientes where tipo_identificacion='".
$_POST['cbBuscarClientes']."';") as $row) {
$report->Ln();$report->SetX(30);
$report->Cell(47, 10, utf8_decode($row['tipo_identificacion']), 1, 0, 'C', 0);
$report->Cell(45, 10, $row['identificacion'], 1, 0, 'C', 0);
$report->Cell(67, 10, utf8_decode($row['nombre']), 1, 0, 'C', 0);
$report->Cell(50, 10, utf8_decode($row['correo_p']), 1, 0, 'C', 0);
$report->Cell(30, 10, $row['telefono_p'], 1, 0, 'C', 0);
}

$report->Output();
ob_end_flush();
}
?>