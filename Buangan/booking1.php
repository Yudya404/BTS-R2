<?php require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
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

        <?php 
		if(isset($_POST['input']))
		{
		if($_POST['select1']=="Tune Up"){
			$jenis=350000;
		}else if($_POST['select1']=="Servis Ringan"){
			$jenis=250000;
		}else if($_POST['select1']=="Servis Berat"){
			$jenis=200000;
		}else if($_POST['select1']=="Modifikasi"){
			$jenis=150000;
		}

		$nama 				= $_POST['nama'];
		$no_telp  			= $_POST['no_telp'];
		$no_plat 			= $_POST['no_plat'];
		$tgl_booking		= $_POST['tgl_booking'];
		$pesanan 			= $_POST['select1'];
		$tipe		 		= $_POST['tipe'];

		$servis_tambahan = implode(",",$_REQUEST['tambahan']);
		$bia=explode(",", $servis_tambahan);
		$sam=0;
		foreach ($bia as $key => $value) {
			if($value=="spoorbal"){
				$sem=200000;
			}elseif($value=="spoor"){
				$sem=120000;
			}elseif ($value=="bal") {
				# code...
				$sem=80000;
			}elseif($value=="optim"){
				$sem=200000;
			}elseif ($value=="tuneup") {
				# code...
				$sem=300000;
			}elseif($value=="acringan"){
				$sem=200000;
				# code...
			}
			$sam+=$sem;
		}

		$estimasi_biaya=$sam+$jenis;
		
		$sql = "INSERT INTO booking (nama, no_telp, no_plat,tipe, jenis, servis_tambahan, estimasi_biaya, tgl_booking) 
		VALUES ('".$nama."' ,'".$no_telp."','".$no_plat."','".$tipe."', '".$pesanan."','".$servis_tambahan."','".$estimasi_biaya."', '".$tgl_booking."')";
		
		$query = mysql_query($sql);
		if($query)
		{
			echo "<div class='alert alert-success'>Pesanan anda berhasil dikirim. Terima Kasih </div>";
			$last=mysql_insert_id();
			?>
			<script>
				if (confirm('Apakah Anda Ingin Mencetak Bukti Pesanan ?')) {
   document.location = "cetak.php?id=<?php echo $last;?>";
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
?>
	
<div class="col-md-10">
<h1 style="text-align: center">Pemesanan</h1>
<br>
	<form  onsubmit="return checkform(this);" action='booking1.php' method='POST'>
		<div class="form-group col-md-3">
          <label class="control-label">Nama </label>
		</div>
		<div class="form-group col-md-9">
            <input type="text" name="nama" class="form-control" required="required">
        </div>
		<div class="form-group col-md-3">
          <label class="control-label">No Telepon </label>
		</div>
		
		<div class="form-group col-md-9">
            <input type="text" name="no_telp" class="form-control" required="required">
        </div>
        <div class="form-group col-md-3">
          <label class="control-label">No Plat </label>
		</div>
		
		<div class="form-group col-md-9">
            <input type="text" name="no_plat" class="form-control" required="required">
        </div>
        <div class="form-group col-md-3">
          <label class="control-label">Tipe Motor </label>
		</div>
		<div class="form-group col-md-9">
       
			<select name='tipe' class="form-control">
			<option  class="sum">Pilih Tipe Motor</option>
			 
			<option value="Motor Matic">Motor Matic</option>
			<option value="Motor 2 Tak">Motor 2 Tak</option>
			<option value="Motor 4 Tak">Motor 4 Tak</option>
			</select>
        </div>
		<div class="form-group col-md-3">
          <label class="control-label">Jenis Servis</label>
		</div>
		<div class="form-group col-md-9">
       
			<select name='select1' id="select1" class="form-control">
			<option  class="sum">Pilih Servis</option>
			<option value="Tune Up" class="sum">Servis Tune Up</option>
			<option value="Servis Ringan" class="sum">Servis Ringan</option>
			<option value="Servis Berat" class="sum">Servis Berat</option>
			<option value="Modifikasi/Custom" class="sum" >Modifikasi</option>
			</select>
        </div>
       
    	<div class="form-group col-md-4">
          <label class="control-label">Pesanan Tambahan </label>
		</div>
		<div class="form-group col-md-8" class="form-control">
             <input type="checkbox" name="tambahan[]" class="sum" value="spoorbal" >Spooring & Balancing (Rp. 200.000,-)<br/>
             <input type="checkbox" name="tambahan[]" class="sum" value="spoor" >Spooring (Rp. 120.000,-)<br/>
             <input type="checkbox" name="tambahan[]" class="sum" value="bal"  >Balancing (Rp. 80.000,-)<br/>
             <input type="checkbox" name="tambahan[]" class="sum" value="optim" >Optimalisasi Nitrogen (Rp. 200.000,-)<br/>
             <input type="checkbox" name="tambahan[]" class="sum" value="tuneup" >Tune Up (Rp. 300.000,-)<br/>
             <input type="checkbox" name="tambahan[]" class="sum" value="acringan" >Perawatan AC Ringan (Rp. 200.000,-)<br/>
             <input type="checkbox" name="tambahan[]" class="sum" value="fullservice" >Full Service AC (Rp. 500.000,-)
        </div>
    	<div class="form-group col-md-3">
          <label class="control-label">Estimasi Biaya</label>
		</div>
		<div class="form-group col-md-9">
		<span type="text" name="payment-total" id="payment-total" class="form-control" >0</span>
        </div>
		<div class="form-group col-md-3">
          <label class="control-label">Tanggal Booking </label>
		</div>
		<div class="form-group col-md-9">
            <input type="date" id="datepicker" name="tgl_booking" class="form-control" required="required">
        </div>
		<div class="form-group col-md-4">
          
            <tr>
					<td></td>
					<td>
					<center><input type="submit" value="Kirim" name="input">
					<button type="reset">Reset</button></center>
					</td>					
				</tr>
        </div>
	</form>
</div>
</div>


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
			jenis=350000;
		}else if(value=="Servis Ringan"){
			jenis=250000;
		}else if(value=="Servis Berat"){
			jenis=200000;
		}else if(value=="Modifikasi/Custom"){
			jenis=150000;
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
		
   }else if(elem.value == 'Servis Berat'){
   	document.getElementById('demo2').style.display = "block";
   	document.getElementById('demo1').style.display = "none";
	   	document.getElementById('demo').style.display = "none";
	   	 document.getElementById('demo3').style.display = "none";
		 
   }else if(elem.value == 'Modifikasi/Custom'){
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