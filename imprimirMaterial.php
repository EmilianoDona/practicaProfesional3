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
			$this->Cell(0,10,'Material Especial - Biblioteca Central',1,0,'C');

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
	
		$consulta = "SELECT p.id,p.name,p.quantity,p.buy_price,p.titulo, p.titulo, p.descriptores, p.descriptores,p.sale_price,p.media_id,p.date,p.existencia,c.name
AS categorie,m.file_name AS image
FROM products2 p
LEFT JOIN categories2 c ON c.id = p.categorie_id
LEFT JOIN media m ON m.id = p.media_id
ORDER BY p.id ASC";
$resultado = $mysqli->query($consulta);	

	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

$pdf->SetTitle('Material Especial - Biblioteca Central');
	$pdf->SetFillColor(158,199,222); //Color
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(11,8,utf8_decode('Inv'),1,0,'C',1);
	$pdf->Cell(62,8,utf8_decode('Autor'),1,0,'C',1);
	$pdf->Cell(62,8,utf8_decode('Título'),1,0,'C',1);
	$pdf->Cell(18,8,utf8_decode('Soporte'),1,0,'C',1);
	$pdf->Cell(30,8,utf8_decode('Descriptores'),1,0,'C',1);
	$pdf->Cell(7,8,utf8_decode('EX'),1,0,'C',1);
	// $pdf->Cell(37,8,utf8_decode('Fecha'),1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Ln();

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(11,6,utf8_decode($row['quantity']),1,0,'C');
	$pdf->Cell(62,6,utf8_decode($row['name']),1,0,'C');
	$pdf->Cell(62,6,utf8_decode($row['titulo']),1,0,'C');
	$pdf->Cell(18,6,utf8_decode($row['categorie']),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($row['descriptores']),1,0,'C');
	$pdf->Cell(7,6,utf8_decode($row['existencia']),1,0,'C');
	// $pdf->Cell(37,6,utf8_decode($row['date']),1,0,'C');
	$pdf->Ln();

}

	$pdf->Output();

