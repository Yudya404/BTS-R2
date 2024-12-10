<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
require('fpdf17/fpdf.php');
require('date-helper.php');

$id_booking = $_GET['id'];
//Select the Products you want to show in your PDF file
//$result=mysqli_query($koneksi, "SELECT * FROM po_terima where id like '%$kodesaya%' ");
$link = mysql_connect("localhost", "root", "");
		mysql_select_db("bengkel_bts_r2", $link);
$result=mysql_query("select * from booking where id_booking='$id_booking'", $link);

//Initialize the 3 columns and the total
$column_date = "";
$column_time = "";
$column_standmeter = "";
$column_factor = "";
$column_total = "";
$column_nilai = "";
$column_rata = "";
$column_test = "";

//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
	$id_booking    		= $row["id_booking"];
	$nama    			= $row["nama"];
	$no_telp    		= $row["no_telp"];
	$no_plat    		= $row["no_plat"];
	$tipe	    		= $row["tipe"];
	$jenis    			= $row["jenis"];
	$tgl_booking 		= convertDateDBtoIndo($row['tgl_booking']);
    $estimasi_biaya   	= number_format($row['estimasi_biaya'],0,",",".");
	$rupiah 			= "Rp.";
	$catatan    		= $row["catatan"];	

//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('img/B1.png',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'Tiket Booking',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'MMS',0,0,'C');
$pdf->Ln();

//Fields Name position
$Y_Fields_Name_position = 40;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(80,8,'Kode Booking: '.$id_booking,0,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 48;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Nama : '.$nama,0,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 56;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(200,8,'No Telepon : '.$no_telp,0,0,'L',1);
$pdf->SetX(205);
/**$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);**/
//$pdf->Cell(45,8,'Tanggal Beli : '.$tanggal,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 64;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Nopol : '.$no_plat,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(45,8,'Tanggal Booking : '.$tgl_booking,0,0,'R',1);
$pdf->Ln();
}
//Fields Name position
$Y_Fields_Name_position = 71;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Tipe Motor',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(80,8,'Jenis Servis',1,0,'C',1);
$pdf->SetX(125);
$pdf->Cell(40,8,'Estimasi Biaya',1,0,'C',1);
$pdf->SetX(165);
$pdf->Cell(40,8,'Catatan',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 79;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(40,6,$tipe,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(80,6,$jenis,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(40,6,$rupiah.$estimasi_biaya.'',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(40,6,$catatan,1,'C');

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
$pdf->Output("Tiket Booking.pdf","I");
}
?>
