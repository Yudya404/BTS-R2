<?php 
include('date-helper.php');
?>
<html>
<head>
        <meta charset="UTF-8">
        <title> Tiket Booking BTS R2</title>
		<link rel="icon" href="img/B1.png">
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
</html>
<?php
$id_booking = $_GET['id_booking'];

$link = mysql_connect("localhost", "root", "");
		mysql_select_db("bengkel_bts_r2", $link);

$q = mysql_query("select * from booking where id_booking='$id_booking'", $link);
$r = mysql_fetch_array($q);
?>
<body style="width:500px">
<center>
	<b>Bukti Booking</b><br>
	<b>MMS (Marno Motor Speed)</b>
</center><br><br>
<table align="center">
<tbody>
<tr>
<td>Kode Booking/ No Antrian</td>
<td>:</td>
<td><?php echo $r['id_booking'];?></td>
</tr>
<tr>
<td>Nama</td>
<td>:</td>
<td><?php echo $r['nama'];?></td>
</tr>
<tr>
<td>No Telp</td>
<td>:</td>
<td><?php echo $r['no_telp'];?></td>
</tr>
<tr>
<td>No Plat </td>
<td>:</td>
<td><?php echo $r['no_plat'];?></td>
</tr>
<tr>
<td>Tipe Motor</td>
<td>:</td>
<td><?php echo $r['tipe'];?></td>
</tr>
<tr>
<td>Jenis Servis</td>
<td>:</td>
<td><?php echo $r['jenis'];?></td>
</tr>
<tr>
<td>Tanggal Booking</td>
<td>:</td>
<td><?php echo convertDateDBtoIndo($r['tgl_booking']);?></td>
</tr>
<tr>
<td>Estimasi Biaya</td>
<td>:</td>
<td>Rp. <?php echo number_format($r['estimasi_biaya'],0,".",".")?></td>
</tr>
<tr>
<td>Catatan</td>
<td>:</td>
<td><?php echo $r['catatan'];?></td>
</tr>
</tbody>
</table>
<center>
<br><br>
	<b>
Terima kasih atas pemesanan anda
</b><br>
	<b>- Kepuasan Anda Adalah Kebanggaan Kami -</b>
</center>
<br >
<br >
<center>
<a href="report.php" class="btn btn-sm btn-warning"> Kembali <i class="fa fa-arrow-circle-right"></i></a>
<a class="btn btn-sm btn-success" onclick="myFunction()"> Cetak <i class="fa fa-arrow-circle-right"></i></a>
</center>
<!-- DivTable.com -->
</body>