<?php 
include('date-helper.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Halaman Admin | BTS R2</title>
	<link rel="icon" href="img/B2.png">
	<style>
		a, button,input[type=submit],input[type=reset] {
		font-family: sans-serif;
		font-size: 15px;
		background: #22a4cf;
		color: white;
		border: white 3px solid;
		border-radius: 5px;
		padding: 12px 20px;
		margin-top: 10px;
		}
		a {
		text-decoration: none;
		}
		a:hover, button:hover, input[type=submit]:hover, input[type=reset]:hover{
		opacity:0.9;
		}
	</style>
	<script>
	function myFunction() {
    window.print();
	}
	</script>
</head>
<body>

	<center>

		<h2>LAPORAN DATA BOOKING</h2>
		<h4>MMS</h4>

	</center>
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Nama</th>
			<th>No Telp</th>
			<th>Nopol</th>
			<th>Tipe Motor</th>
			<th>Jenis Servis</th>
			<th>Tanggal Booking</th>
			<th>Estimasi Biaya</th>
			<th>Catatan</th>
			<th>Status Pelayanan</th>
		</tr>
		<?php 
		$no = 1;
		
		$link = mysql_connect("localhost", "root", "");
				mysql_select_db("bengkel_bts_r2", $link);
		$sql = mysql_query("select * from booking where (tgl_booking between '$_POST[tgl_awal]' and '$_POST[tgl_akhir]')", $link);
		while($data = mysql_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['no_telp']; ?></td>
			<td><?php echo $data['no_plat']; ?></td>
			<td><?php echo $data['tipe']; ?></td>
			<td><?php echo $data['jenis']; ?></td>
			<td><?php echo convertDateDBtoIndo($data['tgl_booking']); ?></td>
			<td>Rp. <?php echo number_format($data['estimasi_biaya'],2,",",".");?></td>
			<td><?php echo $data['catatan']; ?></td>
			<td><?php echo $data['status_antrian']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
	<br >
	<br >
<center>
<a href="report.php" class="btn btn-sm btn-warning"> Kembali <i class="fa fa-arrow-circle-right"></i></a>
<a href="laporan-pdf.php" class="btn btn-sm btn-success"> Cetak <i class="fa fa-arrow-circle-right"></i></a>
</center>
</center>
</body>
</html>