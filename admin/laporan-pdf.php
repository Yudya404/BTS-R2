<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
require('../fpdf17/fpdf.php');
require('date-helper.php');
require("../conn.php");

//Select the Products you want to show in your PDF file
//$result=mysqli_query($koneksi, "SELECT * FROM po_terima where id like '%$kodesaya%' ");
$no = 1;

$tgl_awal   = $_POST['tgl_awal'];
$tgl_akhir  = $_POST['tgl_akhir'];
		
$result=mysqli_query($koneksi,"select * from booking where (tgl_booking between '$_POST[tgl_awal]' and '$_POST[tgl_akhir]')");

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$no++;
    $nama    			= $row["nama"];
	$no_telp    		= $row["no_telp"];
	$no_plat    		= $row["no_plat"];
	$tipe	    		= $row["tipe"];
	$jenis    			= $row["jenis"];
	$tgl_booking 		= convertDateDBtoIndo($row['tgl_booking']);
    $estimasi_biaya   	= number_format($row['estimasi_biaya'],0,",",".");
	$catatan    		= $row["catatan"];
	$status_antrian    	= $row["status_antrian"];		


//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('img/B2.png',10,10,-175);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'Laporan Data Booking',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'MMS',0,0,'C');
$pdf->Ln();
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
}
//Fields Name position
$Y_Fields_Name_position = 50;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Nama',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(60,8,'No Telepon',1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(20,8,'Nopol ',1,0,'C',1);
$pdf->SetX(125);
$pdf->Cell(40,8,'Tanggal',1,0,'C',1);
$pdf->SetX(165);
$pdf->Cell(40,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 58;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(40,6,$nama,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(60,6,$no_telp,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(20,6,$no_plat,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(40,6,$tgl_booking,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(40,6,$status_antrian,1,'C');


//After Footer

//$Y_Fields_Name_position = 150;
//$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
/**$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Kepala Sekolah,',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 170;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Hakko Bio Richard, A.Md Kom',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();

/**$pdf->SetY(-55);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10);
$pdf->Cell(30,10,'PT. BBG',0,0,'C');
$pdf->Cell(105);
$pdf->Cell(30,10,'PT. BBRI',0,0,'C');
$pdf->Ln(20);
$pdf->Cell(10);
$pdf->Cell(30,10,'( ............................................................)',0,0,'C');
$pdf->Cell(107);
$pdf->Cell(30,10,'( ............................................................)',0,0,'C');
**/
$pdf->Output("laporan_Booking.pdf","I");
}
?>
