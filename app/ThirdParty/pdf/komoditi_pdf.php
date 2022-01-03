<?php
require('mysql_table.php');
require('models/M_Product.php');

class PDF extends PDF_MySQL_Table
{
    function Header()
    {
        // Title
        $this->Image('img/logo.png', 10, 6, 20);
        $this->SetFont('Arial','',18);
        $this->Cell(0,6,'DATA KOMODITAS V2',0,1,'C');
        $this->Ln(10);  
        // Ensure table header is printed
        parent::Header();
    }
}

// Connect to database
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "komoditas";
$link = mysqli_connect($host, $user, $pass,$dbnm);

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->Table($link,'select * from komoditi order by id_komoditi');
$pdf->AddPage();
// Second table: specify 3 columns
$pdf->AddCol('id_komoditi', 40, 'ID KOMODITAS', 'C');
$pdf->AddCol('nama_komoditi',40,'NAMA KOMODITAS');
$pdf->AddCol('jumlah',55,'JUMLAH','C');
$prop = array(
            'HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2
            );
$pdf->Table($link,'select * from komoditi order by id_komoditi',$prop);
$pdf->Output();
?>