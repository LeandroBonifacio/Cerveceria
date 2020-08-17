<?php
require('fpdf/fpdf.php');
require('database/conexion.php');
$reporte = new FPDF('L','mm','A4');
class PDF extends FPDF {
	function Header(){
		$this->Image('img/icon/clientes.png',10,10,20);
		$this->SetFont('Times','B','16');
		$this->Cell(80);
		$this->Cell(30,10,utf8_decode('Listado de Clientes'),0,0,'C');
		$this->Ln(20);
		$this->SetFont('Arial','','12');
		$this->Cell(0,10,utf8_decode('Hecho en PHP & MySQL:'),0,'L');
		$this->Ln(4);
		$this->Cell(0,10,utf8_decode('Direccion:'),0,'L');
		$this->Ln(4);
		$this->Cell(0,10,utf8_decode('Tel.'),0,'L');
		$this->Ln(4);
		$this->Cell(0,10,utf8_decode('E-mail:'),0,'L');
		$this->Cell(4);
		//$this->Cell(30,10,utf8_decode('Usuario: '.$_SESSION['user']." |"),0,'L');
		//$fecha=date("d-m-y");
		//$this->Cell(0,10,$fecha,0,'L');
		$this->Ln(10);
		$this->SetFont('Times','B','14');
		$this->Cell(0,10,utf8_decode('Listado de Clientes Registrados'),0,0,'C');
		$this->Ln();
	}
	function BasicTable($header,$datos){
		foreach($header as $col)
			$this->Cell(23.3,5,$col,0);
		$this->Ln();
	}
	function Footer (){
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,utf8_decode('Pagina').$this->PageNo().'',0,0,'C');
		//$this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
	}
}
$pdf = new PDF();
$header = array('ID Registro','Nombres','Apellidos','Telefono','Direccion','E-mail');
$datos = $reporte;
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->BasicTable($header,$datos);
$pdf->SetFont('Arial','',8);
$query="SELECT * FROM clientes;";
$resultado=$mysql->query($query);
	while($datos = $resultado->fetch_object()){
		$pdf->Cell(20,6, $datos->id,0,0,'C');
		$pdf->Cell(30,6, $datos->nombres,0,0,'C');
		$pdf->Cell(15,6, $datos->apellidos,0,0,'C');
		$pdf->Cell(28,6, $datos->telefono,0,0,'C');
		$pdf->Cell(13,6, $datos->direccion,0,0,'C');
		$pdf->Cell(48,6, $datos->correo_electronico,0,0,'C');
	}
$pdf->Output();
//$pdf->Output('Registro_Ususarios.pdf','D');
?>