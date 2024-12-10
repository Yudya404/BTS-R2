 <?php 
		if(isset($_POST['input']))
		{
		if($_POST['select1']=="Servis Ringan"){
			$jenis=350000;
		}else if($_POST['select1']=="Servis Berat"){
			$jenis=250000;
		}else if($_POST['select1']=="Modifikasi/Custom"){
			$jenis=200000;
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
  if(value=="Servis Ringan"){
			jenis=350000;
		}else if(value=="Servis Berat"){
			jenis=250000;
		}else if(value=="Modifikasi/Custom"){
			jenis=200000;
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
   if(elem.value == 'Servis Ringan'){
      document.getElementById('demo').style.display = "block";
      document.getElementById('demo1').style.display = "none";
      document.getElementById('demo2').style.display = "none";
      document.getElementById('demo3').style.display = "none";
      
   }else if(elem.value == 'Servis Berat'){
	   	document.getElementById('demo1').style.display = "block";
	   	document.getElementById('demo').style.display = "none";
	   	document.getElementById('demo2').style.display = "none";
	    document.getElementById('demo3').style.display = "none";
		
   }else if(elem.value == 'Modifikasi/Custom'){
   	document.getElementById('demo2').style.display = "block";
   	document.getElementById('demo1').style.display = "none";
	   	document.getElementById('demo').style.display = "none";
	   	 document.getElementById('demo3').style.display = "none";
   }
}
</script>