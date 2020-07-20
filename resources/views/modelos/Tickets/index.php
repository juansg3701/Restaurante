<?php
require('fpdf/fpdf.php');
require 'cn.php';

$consulta = $pedido;
$consulta2 = $productos;
$consulta3 = $impuestos;
$consulta4 = $descuentos;

$resultado = $mysqli->query($consulta);
$resultado2 = $mysqli->query($consulta2);
$resultado3 = $mysqli->query($consulta3);
$resultado4 = $mysqli->query($consulta4);
$resultado5 = $mysqli->query($consulta);

$pdf = new FPDF($orientation='P',$unit='mm', array(80,350));
$pdf->AddPage();
$pdf->SetFont('Arial','I',8);
$pdf->Cell(40,10,'TICKET DE PAGO',0,1);
$pdf->Cell(15, 5, 'NIT:', 0,1);
$pdf->Cell(15, 5, 'Direccion:', 0,1);
$pdf->Cell(15, 5, 'Resolucion DIAN:', 0,1);
$pdf->Cell(15, 5, 'Prefijo POS:', 0,1);


$pdf->Cell(15, 15, 'Detalle del pedido:', 0,1);

while($row = $resultado->fetch_assoc()){
    
    $pdf->Cell(30,5,'No. Remision:',0,0);
    $pdf->Cell(30,5,$row['id_pedido'],0,1,'C',0);
    $pdf->Cell(30,5, 'Fecha:', 0,0);
    $pdf->Cell(30,5,$row['fecha'],0,1,'C',0);
    $pdf->Cell(30,5,'Cliente:',0,0);
    $pdf->Cell(30,5,$row['nomCliente'],0,1,'C',0);
    $pdf->Cell(30,5,'Documento:',0,0);
    $pdf->Cell(30,5,$row['docCliente'],0,1,'C',0);
    $pdf->Cell(30,5,'Tipo de pago:',0,0);
    $pdf->Cell(30,5,$row['nomTP'],0,1,'C',0); 
}


$pdf->Cell(15, 15, 'Lista de Productos:', 0,1);

$pdf->Cell(30, 2, 'Producto',0,0,'L');
$pdf->Cell(10, 2, 'Precio',0,0,'L');
$pdf->Cell(10, 2, 'Cant.',0,0,'L');
$pdf->Cell(10, 2, 'Total',0,1,'L');
$pdf->Cell(1,1,'---------------------------------------------------------------',0,1);

while($row = $resultado2->fetch_assoc()){

    $pdf->Cell(30,7,$row['nomProd'],0,0,'L',0);
    $pdf->Cell(10,7,$row['preProd'],0,0,'L',0);
    $pdf->Cell(10,7,$row['cantidad'],0,0,'L',0);
    $pdf->Cell(10,7,$row['total'],0,1,'L',0);
   
}

$pdf->Cell(3, 3, '',0,1,'R');


$pdf->Cell(5, 10, 'Impuestos:', 0,1);

$pdf->Cell(30, 2, 'Nombre',0,0,'L');
$pdf->Cell(30, 2, 'Valor(%)',0,1,'L');

$pdf->Cell(1,1,'---------------------------------------------------------------',0,1);
while($row = $resultado3->fetch_assoc()){
    $pdf->Cell(30,7,$row['nombre'],0,0,'L',0);
    $pdf->Cell(30,7,$row['porcentaje'],0,1,'L',0);   
}


$pdf->Cell(3, 3, '',0,1,'R');

$pdf->Cell(5, 10, 'Descuentos:', 0,1);
$pdf->Cell(30, 2, 'Nombre',0,0,'L');
$pdf->Cell(30, 2, 'Valor(%)',0,1,'L');

$pdf->Cell(1,1,'---------------------------------------------------------------',0,1);
while($row = $resultado4->fetch_assoc()){
    $pdf->Cell(30,7,$row['nombre'],0,0,'L',0);
    $pdf->Cell(30,7,$row['porcentaje'],0,1,'L',0);   
}

$pdf->Cell(3, 8, '',0,1,'R');


while($row = $resultado5->fetch_assoc()){
    $pdf->Cell(30,5,'Total impuestos:',0,0);
    $pdf->Cell(15,5,$row['total_impuesto'],0,1,'L',0);
    $pdf->Cell(30,5,'Total descuentos:',0,0);
    $pdf->Cell(15,5,$row['total_descuento'],0,1,'L',0);
    $pdf->Cell(30,5,'Total a pagar:',0,0); 
    $pdf->Cell(15,5,$row['pago_total'],0,1,'L',0); 
}



$pdf->Output('D','ticket.pdf','UTF-8');
?>