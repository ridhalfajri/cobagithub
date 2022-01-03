<?php
//koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "komoditas";
 
$conn = mysqli_connect($host, $user, $pass,$dbnm);

//akhir koneksi
 
#ambil data di tabel dan masukkan ke array
$query = "SELECT nama_komoditi, jumlah FROM komoditi ORDER BY nama_komoditi";
$sql = mysqli_query ($conn,$query);
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
	array_push($data, $row);
}
 
#setting judul laporan dan header tabel
$judul = "DATA KOMODITAS";
$header = array(
		array("label"=>"NAMA KOMODITAS", "length"=>50, "align"=>"L"),
		array("label"=>"JUMLAH", "length"=>20, "align"=>"C")
	);
 
#sertakan library FPDF dan bentuk objek
require_once('fpdf182/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
 
#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
 
#tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
//print_r($data);
foreach ($data as $baris) {
	//print_r($baris);
	//echo "<br>";
	$i = 0;
	foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
}
 
#output file PDF
$pdf->Output();
?>