<?php 
header("Content-Type: text/html;charset=utf-8");
?>
<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
  /*$this->Image('./lil2.png',15,0,45);*/
    // Arial bold 15
    $this->SetFont('Arial','B',22);
    $this->SetTextColor(0,0,0);
     $this->SetFillColor(215,116,0); //rgb
     $this->SetDrawColor(0,0,0);
    $this->Cell(660, 10, "FACTURA", 0, 0, "C");
    // Salto de línea

    //cabecera/ cuerpo
    $this->SetTextColor(35,32,29);
    $this->SetFont('Arial','B',14);
    $this->Cell(108,7,'Datos del Negocio',1,1,'C',1);

    $this->Cell(35,7,'Datos',1,0,'C',1);
    $this->Cell(70,7,'Lirios Oliveira',0,1,'C',0);
    $this->Cell(35,7,'Departamento',1,0,'C',1);
    $this->Cell(70,7,'Ancash',0,1,'C',0);
    $this->Cell(35,7,'Provincia',1,0,'C',1);
    $this->Cell(70,7,'Huaraz',0,1,'C',0);
    $this->Cell(35,7,'Direccion',1,0,'C',1);
    $this->Cell(70,7,'JR. SAL Y ROSAS NRO.856',0,1,'C',0);
    $this->Cell(35,7,'Postal',1,0,'C',1);
    $this->Cell(70,7,'02002',0,1,'C',0);
    $this->Cell(35,7,'Celular',1,0,'C',1);
    $this->Cell(70,7,'983 470 161',0,1,'C',0);
    $this->Ln(5);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//conexion
require_once './coneccion.php'; $conex=new ConexionBD();

/*$resultado1=mysqli_query($conec,$consulta1);*/
// Creación del objeto de la clase heredada

$pdf = new PDF(); //L HORIZONTAL
$pdf->Ln(25);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(56, 225, 6);
$pdf->SetTextColor(20,20,120);
//$pdf->SetTextColor(100); //color

foreach ($conex->conectar()->query("SELECT * FROM vt_compro WHERE id_venta=(select max(id_venta) from venta);") as $row) {
$pdf->Cell(25,7,'N COMP',1,0,'C',1);
$pdf->SetX(45);    
$pdf->Cell(25,7,'Fecha',1,0,'C',1);
$pdf->SetX(100);
$pdf->Cell(40,7,'DNI',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(55,7,'Cliente',1,0,'C',1);
$pdf->Ln(7);
$pdf->Cell(25,7,$row['id_comprobante'],1,0,'C',0);
$pdf->SetX(45);
$pdf->Cell(25,7,$row['fechaventa'],1,0,'C',0);
$pdf->SetX(100);
$pdf->Cell(40,7,$row['identificacion'],1,0,'C',0);
$pdf->SetX(150);
$pdf->Cell(55,7,utf8_decode($row['Nombre']),1,0,'C',0);
$pdf->Ln(7);
$pdf->Cell(60,7,'Correo',1,0,'C',1);
$pdf->SetX(100);
$pdf->Cell(40,7,'destino',1,0,'C',1);
$pdf->SetX(150);  
$pdf->Cell(25,7,'Telefono',1,0,'C',1);
$pdf->Cell(30,7,'Tipo Pago',1,0,'C',1);

$pdf->Ln(7);
$pdf->Cell(60,7,$row['correo_p'],1,0,'L',0);
$pdf->SetX(100);
$pdf->Cell(40,7,$row['destino'],1,0,'L',0);

$pdf->SetX(150);  
$pdf->Cell(25,7,$row['telefono_p'],1,0,'C',0);
$pdf->Cell(30,7,$row['tipo_pago'],1,0,'C',0);
$pdf->Ln(25);
$pdf->SetX(25);
$pdf->Cell(165,7,'LISTA DE PRODUCTOS',1,0,'C',1);
$pdf->Ln(7);
$pdf->SetX(25);
  $pdf->Cell(15,7,'COD',1,0,'C',1);
  $pdf->Cell(30,7,'VARIEDAD',1,0,'C',1);
  $pdf->Cell(30,7,'CALiBRE',1,0,'C',1);
  $pdf->Cell(30,7,'CANTIDAD',1,0,'C',1);
  $pdf->Cell(30,7,'P. PAQUETE',1,0,'C',1);
  $pdf->Cell(30,7,'COSTO',1,0,'C',1);
  $pdf->Ln(7);
foreach ($conex->conectar()->query("SELECT * from vt_pv where idventa=".$row['id_venta'].";") as $row2) {
  $pdf->SetX(25);
  $pdf->Cell(15,7,$row2['idproducto'],1,0,'C',0);
  $pdf->Cell(30,7,$row2['nom_variedad'],1,0,'C',0);
  $pdf->Cell(30,7,$row2['calibre'],1,0,'C',0);
  $pdf->Cell(30,7,$row2['cantidadproducto'],1,0,'C',0);
  $pdf->Cell(30,7,$row2['precio_paquete'],1,0,'C',0);
  $pdf->Cell(30,7,$row2['preciof'],1,0,'C',0);
  $pdf->Ln(7);
}
$pdf->Ln(25);
$pdf->SetX(150);
$pdf->Cell(20,7,'Monto',1,0,'C',1);
$pdf->Cell(20,7,'IGV',1,0,'C',1);
$pdf->Ln(7);
$pdf->SetX(150);
$pdf->Cell(20,7,$row['montoventa'],1,0,'C',0);
$pdf->Cell(20,7,$row['igv'],1,0,'C',0);
}


$pdf->Ln(25);
$pdf->Cell(80, 5,'Ancash, Huaraz ,  '. date('d') . ' de '. date('F'). ' de '. date('Y'), 0,1,'C');
$pdf->Output();

?>