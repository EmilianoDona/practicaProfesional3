<?php
$mysqli = new mysqli("localhost","root","","biblioteca");

  require('libs/fpdf.php');

 //Creamos clase PDF que herada de FPDF
	class PDF extends FPDF
	{
		// Cabecera de página
		function Header()
		{
			// Logo

			// Arial bold 15
			$this->SetFont('Arial','B',15);
			// Movernos a la derecha

			// Título
			$this->Cell(0,10,'Control de Mobiliario - Biblioteca Central',1,0,'C');

			// Salto de línea
			$this->Ln(10);
		}

		
		// Pie de página
		function Footer()
		{
			// Posición: a 1,5 cm del final
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Número de página
			$this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
		}
	}
	


	$consulta = "SELECT p.id,p.name,p.quantity,p.buy_price,p.sale_price,p.media_id,p.date,c.name
AS categorie,m.file_name AS image
FROM products3 p
LEFT JOIN categories3 c ON c.id = p.categorie_id
LEFT JOIN media m ON m.id = p.media_id
ORDER BY p.id ASC";
$resultado = $mysqli->query($consulta);	
	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
$pdf->SetTitle('Control de Mobiliario - Biblioteca Central');
$pdf->SetFillColor(158,199,222); //Color
$pdf->SetFont('Arial','B',12);
$pdf->Cell(18,8,utf8_decode('Inv'),1,0,'C',1);
$pdf->Cell(120,8,utf8_decode('Descripción'),1,0,'C',1);
$pdf->Cell(52,8,utf8_decode('Sala'),1,0,'C',1);
// $pdf->Cell(50,8,utf8_decode('Fecha'),1,0,'C',1);
$pdf->SetFont('Arial','',10);
$pdf->Ln();
while($row = $resultado->fetch_assoc()){
	$pdf->Cell(18,6,utf8_decode($row['quantity']),1,0,'C');
	$pdf->Cell(120,6,utf8_decode($row['name']),1,0,'C');
	$pdf->Cell(52,6,utf8_decode($row['categorie']),1,0,'C');
	// $pdf->Cell(50,6	,utf8_decode($row['date']),1,0,'C');
	$pdf->Ln();

}	





/*function imprimirMobiliario(){
     global $db;
     $sql  =" SELECT p.id,p.name,p.quantity,p.date,c.name";
    $sql  .="AS categories3";
    $sql  .="FROM products3 p";
    $sql  .="LEFT JOIN categories3 c ON c.id = p.categorie_id";
    $sql  .="LEFT JOIN media m ON m.id = p.media_id";
    $sql  .="ORDER BY p.id ASC";
    return resultadoMobiliario($sql);

   }*/




	$pdf->Output();

