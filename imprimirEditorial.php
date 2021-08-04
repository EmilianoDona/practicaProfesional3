<?php
$mysqli = new mysqli("localhost","root","","biblioteca");
  $page_title = 'Imprimir PDF Material Especial';
  require_once('includes/load.php');
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
			$this->Cell(0,10,'Editorial UMaza - Biblioteca Central',1,0,'C');

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
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
$consulta = "SELECT * from products";
$resultado = $mysqli->query($consulta);		// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

$pdf->SetTitle('Editorial UMaza - Biblioteca Central');
	$pdf->SetFillColor(158,199,222); //Color
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,8,utf8_decode('Autor-Titulo-Año'),1,0,'C',1);
	$pdf->Cell(30,8,utf8_decode('Procedencia'),1,0,'C',1);
	$pdf->Cell(45,8,utf8_decode('Temática'),1,0,'C',1);
	$pdf->Cell(20,8,utf8_decode('Pag'),1,0,'C',1);
	$pdf->Cell(25,8,utf8_decode('Editorial'),1,0,'C',1);
	// $pdf->Cell(34,8,utf8_decode('Fecha'),1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Ln();

	while($row = $resultado->fetch_assoc()){
	$pdf->Cell(70,6,utf8_decode($row['name']),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($row['titulo']),1,0,'C');
	$pdf->Cell(45,6,utf8_decode($row['descriptores']),1,0,'C');
	$pdf->Cell(20,6,utf8_decode($row['existencia']),1,0,'C');
	$pdf->Cell(25,6,utf8_decode($row['editorial']),1,0,'C');
	// $pdf->Cell(34,6,utf8_decode($row['date']),1,0,'C');


	$pdf->Ln();

}

	$pdf->Output();

