<?php 

session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
require('../fpdf17/fpdf.php');
require('date-helper.php');
require("../conn.php");

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',13);
$pdf->Image('img/B2.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'MMS',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Gilang Sawunggaling No.51, Gilang Utara, Gilang, Kec. Taman, Sidoarjo, Jawa Timur 61257',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Website : WWW.WBS.COM',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Data Booking',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
//$pdf->Cell(6,0.7,"Laporan Booking pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'No Telp', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nopol', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tipe', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jenis', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Catatan', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Biaya', 1, 1, 'C');
//$pdf->Cell(2, 0.8, 'Status', 1, 1, 'C');

//ambil paramater tanggal GET/POST
$tgl_awal = $_POST['tgl_awal']; //penamaan disesuaikan
$tgl_akhir = $_POST['tgl_akhir']; //penamaan disesuaikan

$no=1;
$qy = "select * from booking ";
if (isset($tgl_awal) and isset($tgl_akhir)) {
	$qy.=" where tgl_booking between '$tgl_awal' and '$tgl_akhir' "; //kolom disesuaikan
}
$query=mysqli_query($koneksi,$qy);
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['nama'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['no_telp'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['no_plat'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tipe'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['jenis'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['catatan'], 1, 0,'C');
	$pdf->Cell(3, 0.8, convertDateDBtoIndo($lihat['tgl_booking']),1, 0, 'C');
	$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat['estimasi_biaya'])." ,-", 1, 1,'C');
	//$pdf->Cell(2, 0.8, $lihat['status_antrian'], 1, 0,'C');
	
	$no++;
}

$qy = "select sum(estimasi_biaya) as total from booking";
if (isset($tgl_awal) and isset($tgl_akhir)) {
	$qy.=" where tgl_booking between '$tgl_awal' and '$tgl_akhir' "; //kolom disesuaikan
}
$q=mysqli_query($koneksi,$qy);
// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($total=mysqli_fetch_array($q)){
	$pdf->Cell(23, 0.8, "Total Pendapatan", 1, 0,'C');		
	$pdf->Cell(3, 0.8, "Rp. ".number_format($total['total'])." ,-", 1, 0,'C');	
}

/*$qy = "select sum(laba) as total_laba from barang_laku";
if (isset($tglawal) and isset($tglakhir)) {
	$qy.=" where tanggal between '$tglawal' and '$tglakhir' "; //kolom disesuaikan
}
$qu=mysqli_query($connect,$qy);
// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($tl=mysqli_fetch_array($qu)){
	$pdf->Cell(3, 0.8, "Rp. ".number_format($tl['total_laba'])." ,-", 1, 1,'C');	
}*/
$pdf->Output("laporan_Booking.pdf","I");
}
 ?> 