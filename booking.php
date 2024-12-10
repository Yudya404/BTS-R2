<?php require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php";?>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="https://repo.rachmat.id/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

<body>
    
	<?php include "header.php"; ?>
	
	<!-- start: Slider -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-book ico-white"></i>Menu Booking</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: 
	<!-- end: Slider -->
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main herounit for a primary marketing message or call to action -->
			
			<blockquote style="font-size: medium;">
            <h3><b>Ketentuan Booking Servis : </b></h3>
            <br>
			<ol>
							<li>Booking Servis Tidak Dikenakan Biaya Tambahan.</li>
							<li>Booking Servis minimal H-1, hari Senin-Kamis pukul 08:00 s/d 17:00, dan Sabtu s/d Minggu pukul 09:00 s/d 17:00.</li>
							<li>Khusus untuk Booking Servis hari Sabtu, lakukan pendaftaran paling lambat Kamis pukul 17:00 WIB.</li>
							<li>Pelanggan Wajib datang sesuai dengan waktu yang telah disepakati.</li>
							<li>Apabila ingin membatalkan atau mengubah hari/tanggal maka diwajibkan menginformasikan ke bengkel.</li>
							<li>Apabila pelanggan datang terlambat dan tanpa pemberitahuan maka silahkan booking ulang (jika dengan pemberitahuan akan dijadwalkan ulang sesuai kesepakatan bengkel dan pelanggan).</li>
							<li>Booking Servis pada hari libur akan diproses pada hari kerja.</li>
			</ol>
			</blockquote>

		<?php
		if(isset($_POST['input'])){
					
				if($_POST['select1']=="Tune Up"){
						$jenis=75000;
				}else if($_POST['select1']=="Servis Ringan"){
						$jenis=150000;
				}else if($_POST['select1']=="Fullservis"){
						$jenis=350000;
				}else if($_POST['select1']=="Modifikasi"){
						$jenis=35000;
				}
				
				$nama       	  	   = $_POST['nama'];
				$no_telp		  	   = $_POST['no_telp'];
				$no_plat		  	   = $_POST['no_plat'];
				$tipe      		  	   = $_POST['tipe'];
				$servis            	   = $_POST['select1'];
				$tgl_booking 	  	   = $_POST['tgl_booking'];
				$estimasi_biaya		   = $jenis;
				$catatan		  	   = $_POST['catatan'];
        
		
		$link = mysql_connect("localhost", "root", "");
		mysql_select_db("bengkel_bts_r2", $link);
		
		$batas = mysql_query("select * from booking where tgl_booking='$tgl_booking' and tgl_booking='$tgl_booking'", $link);
		$hb = mysql_num_rows($batas);
		
		$cek = mysql_query("select * from booking where tgl_booking='$tgl_booking' and no_plat='$no_plat'", $link);
		$hc = mysql_num_rows($cek);
		
		
		if($hb > 24){
			echo "<div class='alert alert-danger'>Maaf pemesanan untuk tanggal tersebut telah penuh,Silahkan pilih tanggal lainnya.</div>";
		}elseif($hc > 1){
			echo "<div class='alert alert-danger'>Nopol Tersebut sudah dipesan untuk tanggal tersebut.</div>";
		}
	else{
		
		$sql = "INSERT INTO booking (nama, no_telp,no_plat,tipe, jenis, estimasi_biaya, tgl_booking, catatan) 
		VALUES ('".$nama."' ,'".$no_telp."','".$no_plat."','".$tipe."', '".$servis."', '".$estimasi_biaya."', '".$tgl_booking."', '".$catatan."' )";
		
		$query = mysql_query($sql);
		if($query)
		{
			echo "<div class='alert alert-success'>Pesanan anda berhasil dikirim. Terima Kasih </div>";
			$last=mysql_insert_id();
			?>
			<script>
			if (confirm('Apakah Anda Ingin Mencetak Bukti Pesanan ?')) {
				document.location = "tiket.php?id=<?php echo $last;?>";
			} else {
			// Do nothing!
			}
			</script>
			<?php
			}else
			{
			echo "<div class='alert alert-danger'>Maaf terjadi kesalahan, pesan anda tidak berhasil dikirim, silahkan coba lagi.</div>";
			}
			
	}   
}
?>
            <blockquote style="font-size: medium;">
            <h3><b>Isi Data Terlebih Dahulu : </b></h3>
			<br>
			<form method="POST"	action="booking.php" enctype="multipart/form-data" >		
			<table>
				<tr>
					<td>Nama</td>
					<td><input type="text" name="nama" placeholder="Masukkan Nama" required="required" style="width:500px; border:3px border-style: inset; border-radius:4px; -moz-border-radius:4px; height:20px; font-family:Garamond; margin-left:10px;"></td>					
				</tr>
				<tr>
					<td>No, Telp</td>
					<td><input type="text" name="no_telp" placeholder="Masukkan No Telp" required="required" style="width:150px; border:3px border-style: inset; border-radius:4px; -moz-border-radius:4px; height:20px; font-family:Garamond; margin-left:10px;"></td>					
				</tr>
				<tr>
					<td>Nopol</td>
					<td><input type="text" name="no_plat" placeholder="Masukkan Nopol" required="required" style="width:150px; border:3px border-style: inset; border-radius:4px; -moz-border-radius:4px; height:20px; font-family:Garamond; margin-left:10px;"></td>					
				</tr>
				<tr>
					<td>Tipe Motor</td>
					<td>
						<select name="tipe" required="required" style="width:165px; border:3px border-style: inset; border-radius:4px; -moz-border-radius:4px; height:30px; font-family:Garamond; margin-left:10px;">
							<option selected="selected" value="">Pilih Tipe Motor</option>
							<option>Motor Matic</option>
							<option>Motor Bebek</option>
							<option>Motor Sport</option>
						</select>
					</td>					
				</tr>
				<tr>
					<td>Jenis Servis</td>
					<td>
						<select name="select1" id="select1" required="required" style="width:400px; border:3px border-style: inset; border-radius:4px; -moz-border-radius:4px; height:30px; font-family:Garamond; margin-left:10px;">
							<option class="sum">Pilih Servis</option>
							<option value="Tune Up" class="sum">Servis Tune Up : Estimasi Pengerjaan 15 Menit</option>
							<option value="Servis Ringan" class="sum">Servis Ringan : Estimasi Pengerjaan 30 Menit</option>
							<option value="Fullservis" class="sum">Fullservis : Estimasi Pengerjaan 45 Menit</option>
							<option disabled="disabled" value="Modifikasi" class="sum" >Modifikasi : : Estimasi Pengerjaan Sesuai Bagian Yang Dimodifikasi</option>
						</select>	
					</td>					
				</tr>
				<tr>
					<td>Tanggal Booking</td>
					<td><input type="date" id='datepicker' name="tgl_booking" required="required" style="width:150px; border:3px border-style: inset; border-radius:4px; -moz-border-radius:4px; height:20px; font-family:Garamond; margin-left:10px;"></td>					
				</tr>
				<tr>
					<td>Estimasi Biaya</td>
					<td><span type="text" name="payment-total" id="payment-total" placeholder="Estimasi Biaya" style="width:500px; border:3px border-style: inset; border-radius:4px; -moz-border-radius:4px; height:20px; font-family:Garamond; margin-left:10px;">0</span></td>					
				</tr>
				<tr>
					<td>Catatan</td>
					<td><input type="text" name="catatan" placeholder="Masukkan Catatan Tambahan" required="required" style="width:500px; border:3px border-style: inset; border-radius:4px; -moz-border-radius:4px; height:20px; font-family:Garamond; margin-left:10px;"></td>					
				</tr>
				<tr>
					<td></td>
					<td>
					<center><input type="submit" value="Booking" name="input">
					<button type="reset">Reset</button></center>
					</td>					
				</tr>				
			</table>
			</form>
            </blockquote> <!--min="2021-04-04" max="2021-04-06"-->
			<hr>
		</div>
		
		
<script>
$(document).ready(function () {
		$('#datepicker').datepicker({
			dateFormat: 'yy-mm-dd',          
            minDate: 0,
            maxDate: '+3'
		});  
	});
</script>

<style type="text/css">
	#demo{display:none;}
	#demo1{display:none;}
	#demo2{display:none;}
	#demo3{display:none;}
</style>

<script type="text/javascript">

var checkboxes = document.querySelectorAll('.sum')
var select = document.querySelector('#select1')
var total = document.querySelector('#payment-total')
var checkboxesTotal = 0
var selectTotal = 0



checkboxes.forEach(function(input) {
  input.addEventListener('change', onCheckboxSelect)
})

select.addEventListener('change', onSelectChange)

function onCheckboxSelect(e) {
  var sign = e.target.checked ? 1 : -1
  var sem1=0
  if(e.target.value=="spoorbal"){
				sem1=200000;
			}else if(e.target.value=="spoor"){
				sem1=120000;
			}else if (e.target.value=="bal") {
				
				sem1=80000;
			}else if(e.target.value=="optim"){
				sem1=200000;

			}else if (e.target.value=="tuneup") {
				
				sem1=300000;
			}else if(e.target.value=="acringan"){
				sem1=200000;

			}else if (e.target.value=="fullservice") {
				sem1=500000;
				
			}


  checkboxesTotal += sign * parseInt(sem1, 10)
  renderTotal()
}

function onSelectChange(e) {
  var value = document.getElementById('select1').value
  var jenis = 0
  if(value=="Tune Up"){
			jenis=75000;
		}else if(value=="Servis Ringan"){
			jenis=150000;
		}else if(value=="Fullservis"){
			jenis=350000;
		}else if(value=="Modifikasi"){
			jenis=35000;
		}

  var harga = parseInt(jenis, 10)
  if (!isNaN(harga)) {
    selectTotal = harga
    renderTotal()
  }
}

function renderTotal() {
  total.innerHTML = formatCurrency(checkboxesTotal + selectTotal)
}



function formatCurrency(num){
 num = num.toString().replace(/\$|\,/g,'');
 if(isNaN(num)) num = "0";
  cents = Math.floor((num*100+0.5)%100);
  num = Math.floor((num*100+0.5)/100).toString();
 if(cents < 10) cents = "0" + cents;
  for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
  num = num.substring(0,num.length-(4*i+3))+'.'+num.substring(num.length-(4*i+3));
  return ("Rp. " + num + "," + cents);
}

function showDiv(elem){
   if(elem.value == 'Tune Up'){
      document.getElementById('demo').style.display = "block";
      document.getElementById('demo1').style.display = "none";
      document.getElementById('demo2').style.display = "none";
      document.getElementById('demo3').style.display = "none";
      
   }else if(elem.value == 'Servis Ringan'){
	   	document.getElementById('demo1').style.display = "block";
	   	document.getElementById('demo').style.display = "none";
	   	document.getElementById('demo2').style.display = "none";
	    document.getElementById('demo3').style.display = "none";
		
   }else if(elem.value == 'Fullservis'){
   	document.getElementById('demo2').style.display = "block";
   	document.getElementById('demo1').style.display = "none";
	   	document.getElementById('demo').style.display = "none";
	   	 document.getElementById('demo3').style.display = "none";
		 
   }else if(elem.value == 'Modifikasi'){
   	document.getElementById('demo2').style.display = "block";
   	document.getElementById('demo1').style.display = "none";
	   	document.getElementById('demo').style.display = "none";
	   	 document.getElementById('demo3').style.display = "none";
   }
}
</script>
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