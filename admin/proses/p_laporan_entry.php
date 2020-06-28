<?php

include 'init.php';
// cek udah login belom
fsesi_login();

require('../../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../../assets/gambar/1.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'KIOS WAT',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 081385999258',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Hantam Jaya',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'gmail : marrochiMOBILE@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Data Penjualan Barang',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(6,0.7,"Laporan Penjualan pada : ".$_GET['tanggal'],0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'harga', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Total harga', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'laba', 1, 1, 'C');

$no=1;
$tanggal=$_GET['tanggal'];
$query=xsql("SELECT * from barang_laku where tanggal=" . $tanggal, $x);
while($lihat=xfetch_a($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tanggal'],1, 0, 'C');
	$pdf->Cell(6, 0.8, $lihat['nama'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['jumlah'], 1, 0,'C');
	$pdf->Cell(4, 0.8, "Rp. ".Rp($lihat['harga'])." ,-", 1, 0,'C');
	$pdf->Cell(4.5, 0.8, "Rp. ".Rp($lihat['total_harga'])." ,-",1, 0, 'C');
	$pdf->Cell(4, 0.8, "Rp. ".Rp($lihat['laba'])." ,-", 1, 1,'C');	
	
	$no++;
}
$q=xsql("SELECT sum(total_harga) as total from barang_laku where tanggal=".$tanggal,$x);
// SELECT sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($total=xfetch_a($q)){
	$pdf->Cell(17, 0.8, "Total Pendapatan", 1, 0,'C');		
	$pdf->Cell(4.5, 0.8, "Rp. ".Rp($total['total'])." ,-", 1, 0,'C');	
}
$qu=xsql("SELECT sum(laba) as total_laba from barang_laku where tanggal=".$tanggal,$x);
// SELECT sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($tl=xfetch_a($qu)){
	$pdf->Cell(4, 0.8, "Rp. ".Rp($tl['total_laba'])." ,-", 1, 1,'C');	
}
$pdf->Output("laporan_buku.pdf","I");
xclose($x);
?>

