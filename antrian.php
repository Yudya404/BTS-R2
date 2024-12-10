<?php require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<?php 
include('date-helper.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php";?>
<body>
    
	<?php include "header.php"; ?>
	
	<!-- start: Slider -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">
				<h2><i class="ico-retweet ico-white"></i>Antrian</h2>
				
				<!-- start: Container -->
			<!-- <div class="table-responsive"> -->
			<?php
			$query1="select * from antrian order by id_antrian DESC limit 1";
			$hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
			?>
			<div class="container">
			<hr>
			<center>	
			<div class="box"><th><h3><font color=#F8F8FF><center>Antrian Saat Ini</center></color></h3></th></div>
			<div class="box1"><th><h3><font color=#F8F8FF><center>Nopol</center></color></h3></th></div>
			<div class="box2"><th><h3><font color=#F8F8FF><center>Waktu Pelayanan</center></color></h3></th></div>
			<?php 
			$no=0;
			while($data=mysqli_fetch_array($hasil))
			{ $no++; ?>
			<ul>
			<div class="box3"><td><h2><font color=#000000><center><?php echo $data['no_antrian'];?></center></color></h2></td></div>
			<div class="box3"><td><h2><font color=#000000><center><?php echo $data['no_plat'];?></center></color></h2></td></div>
			<div class="box3"><td><h2><font color=#000000><center><?php echo $data['status_antrian'];?></center></color></h2></td></div>
			
			<?php   
			} 
			?>
			</ul>
			</center>
			<hr>
			<center>
			<h2><b>Cek Data Booking Anda Disini : </b></h2>
            <br>
			<form id="searchbox" method="post" action="antrian.php">
				<!--<input name="tgl" type="date" size="15" placeholder="Masukkan Tanggal..." />-->
				<input name="nopol" type="text" size="15" placeholder="Masukkan Nopol..." />
				<input id="button-submit" type="submit" value="Search" name="cari"/>
				<a href='antrian.php' class="btn btn-sm btn-success" >Refresh</i></a>
			</form>
			<br >
			<?php
            //proses jika sudah klik tombol pencarian data
            /*if(isset($_POST['cari'])){
            //menangkap nilai form
            $tgl=$_POST['tgl'];
            $nopol=$_POST['nopol'];
			$gabung = "";
            if ($tgl != "") {
              $gabung .= "AND tgl_booking like '%".$tgl."%'";
            }
            if ($nopol != "") {
              $gabung .= "AND no_plat like '%".$nopol."%'";
            }
            $gabung = "WHERE " .ltrim($gabung, "AND ");
            if(empty($tgl) || empty($nopol)){*/
            //jika data tanggal kosong
            ?>
			<?php
			if(isset($_POST['cari'])){
	        $nopol=$_POST['nopol'];
	        $query1="SELECT * FROM booking where no_plat like '%$nopol%' order by id_booking DESC limit 1";
			if(empty($nopol)){
			?>
            <script language="JavaScript">
                alert('Nopol Harap di Isi!');
                document.location='antrian.php';
            </script>
			<?php
            }else{
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan Nopol<b>&nbsp;&nbsp; <b><?php echo $_POST['nopol']?></b></i>
            <?php
			//$query1="select * from booking order by id_booking DESC limit 1";
            //$query1="SELECT * FROM booking $gabung ";
            }
			$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
			?>
			<table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nama </center></th>
                        <th><center>No Telp </center></th>
                        <th><center>Nopol </center></th>
                        <th><center>Tipe Motor </center></th>
                        <th><center>Jenis Servis </center></th>
						<th><center>Tanggal Booking </center></th>
						<th><center>Estimasi Biaya </center></th>
						<th><center>Catatan </center></th>
                        <th><center>Alat</center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
					//menampilkan pencarian data
					while($data=mysqli_fetch_array($tampil)){
					$no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nama'];?></center></td>
                    <td><center><?php echo $data['no_telp'];?></center></td>
					<td><center><?php echo $data['no_plat'];?></center></td>
					<td><center><?php echo $data['tipe'];?></center></td>
					<td><center><?php echo $data['jenis'];?></center></td>
					<td><center><?php echo convertDateDBtoIndo($data['tgl_booking']);?></center></td>
					<td><center><?php echo $data['estimasi_biaya'];?></center></td>
					<td><center><?php echo $data['catatan'];?></center></td>
					
                    </center></td>
                    <td><center><div id="thanks">
					<a class="btn btn-sm btn-success" title="Cetak Tiket Booking" href="tiket.php?hal=cetak&id=<?php echo $data['id_booking'];?>">
					</a></center>
					</td></div>
					</tr>
					<?php   
					} 
					?>
					</tbody>
					<tr>
						<td colspan="10" align="center"> 
						<?php
						//jika pencarian data tidak ditemukan
						if(mysqli_num_rows($tampil)==0){
							echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
						}
						?>
						</td>
					</tr> 
                    </table>
					<?php
						}
						else{
							unset($_POST['cari']);
						}
					?>
			
			</center>
			</div>				
			<!-- end: Table -->
				
			</div>
			<!-- end: Container  -->
		</div>
	</div>
	<!-- end: 
	<!-- end: Slider -->
	
			
			
	<!-- end: Wrapper  -->			
	<!-- end: Container  -->	
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main herounit for a primary marketing message or call to action -->

           
		<!--end: Container-->
	</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
						<a href="#"><img src="img/B1.png" alt="logo" /></a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="span9">
					
					<div id="footer-menu-links">

						<ul id="footer-nav">

							<li><a href="#">Free Pengecekan Kondisi Mesin</a></li>

							<li><a href="#">Diskon Biaya Jasa Jika Servis Berat</a></li>

							<li><a href="#">Pelayanan Cepat Dan Tepat</a></li>

						</ul>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->
<?php include "footer.php"; ?>

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script defer="defer" src="js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>