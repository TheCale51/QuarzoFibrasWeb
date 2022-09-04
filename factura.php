<?php

require("fpdf/fpdf.php");
include("db.php");
session_start();

$id = $_GET['id'];

$consulta = $conexion->query("SELECT Codigo, Fecha, Celular1, Celular2, Telefono1, Telefono2, Direccion, Nombres, Apellidos, Barrio, Municipio, Valor, Nombre_Producto, Descripcion
FROM pedido 
INNER JOIN cliente on cliente.idCliente=pedido.Cliente_idCliente 
INNER JOIN detallesproducto on detallesproducto.idDetallesProducto=pedido.Producto_idProducto
INNER JOIN municipio on municipio.idMunicipio=cliente.Municipio_idMunicipio
INNER JOIN celular on celular.idCelular=cliente.Celular_idCelular
INNER JOIN telefono on telefono.idTelefono=cliente.Telefono_idTelefono
WHERE `idPedido`= $id;");
$col = $consulta->fetch_assoc();

$iva = $col['Valor'] * 0.19;
$total = $iva + $col['Valor'];

$p = new FPDF();
$p->SetTopMargin(20);
$p->AddPage();
$p->SetTitle("Factura - QuarzoFibras");
$p->SetAuthor("QuarzoFibras");

$p->SetFont("Arial", "B", "24");
$p->Cell(0, 10, "QUARZOFIBRAS", 0, 1);

$p->SetFont("Arial", "IB", "8");
$p->Cell(0, 2, utf8_decode("Elegancia, sencillez y tecnología a la vanguardia para las nuevas bañeras de hidromasaje"), 0, 1);
$p->Ln();
$p->Ln();
$p->Ln();
$p->SetFont("Arial", "", "8");
$p->Cell(40, 4, "Cll 8 #27-31", 0, 1);
$p->Cell(40, 4, "Neiva - Huila", 0, 0);

$p->SetFont("Arial", "B", "8");
$p->Cell(125, 4, "FECHA", 0, 0, "R");
$p->SetFont("Arial", "", "8");
$p->Cell(17.2, 4, "$col[Fecha]", 0, 1, "R");

$p->SetFont("Arial", "", "8");
$p->Cell(40, 4, "318 8213633 - 3167545245", 0, 0);

$p->SetFont("Arial", "B", "8");
$p->Cell(125, 4, "FACTURA", 0, 0, "R");
$p->SetFont("Arial", "", "8");
$p->Cell(17, 4, "$col[Codigo]", 0, 1, "R");
$p->Ln();
$p->Ln();

$p->SetFont("Arial", "B", "9");
$p->Cell(0, 5, "FACTURAR A:", 0, 1);

$p->SetFont("Arial", "", "8");
$p->Cell(0, 4, "$col[Nombres] $col[Apellidos]", 0, 1);
$p->Cell(0, 4, "$col[Direccion] - $col[Barrio]", 0, 1);
$p->Cell(0, 4, "$col[Municipio]", 0, 1);
$p->Cell(0, 4, "$col[Celular1]", 0, 1);
$p->Cell(0, 4, "$col[Telefono1]", 0, 1);
$p->Ln();
$p->Ln();

$p->SetFont("Arial", "B", "10");
$p->SetFillColor(200, 255, 255);
$p->Cell(0, 4, utf8_decode("DESCRIPCIÓN"), 1, 0, "C", true);
$p->Cell(0, 4, "CANTIDAD", 1, 1, "R");
$p->Cell(169, 10, utf8_decode("$col[Descripcion]"), 1, 0, "L");
$p->Cell(0, 10, "         1", 1, 1, "L");

$p->SetFont("Arial", "", "10");
$p->Cell(170, 6, "SUBTOTAL  ", 0, 0, "R");
$p->Cell(-1, 5, "$", 0, 0, "L");
$p->Cell(0, 5, "$col[Valor]", 1, 1, "R");

$p->Cell(170, 6, "IVA 19%  ", 0, 0, "R");
$p->Cell(-1, 5, "$", 0, 0, "L");
$p->Cell(0, 5, "$iva", 1, 1, "R");

$p->SetFont("Arial", "B", "10");
$p->Cell(170, 6, "TOTAL  ", 0, 0, "R");
$p->Cell(-1, 5, "$", 0, 0, "L");
$p->Cell(0, 5, "$total", 1, 1, "R");

$p->Output('', 'Factura_Electronica_QuarzoFibras.pdf');