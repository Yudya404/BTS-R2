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

				<h2><i class="ico-ok ico-white"></i>Servis Berat</h2>

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
            <h3><b>Servis Berat : </b></h3>
            <br />
            <p>Servis Berat merupakan kegiatan penggantian dan setting ulang komponen/sperpart mesin motor yang rusak berat dan memakan waktu Sedikit lebih lama dari Servis Ringan.</p>
			<br />
			<p> Meliputi : <p>
						
							<li>Turun mesin atau membelah mesin.</li>
							<li>Repair rangka motor.</li>
							<li>Repair body Motor.</li>
					
			</blockquote>
			
			<blockquote style="font-size: medium;">
            <p>Berikut detail-detail servis berat di bengkel MMS.</p>
			<img src="img/turun-mesin.jpg" style="border: 3px solid whitesmoke; border-radius: 10px;" "float:left;" width="250px" height="150px" alt="Turun Mesin" />
			<img src="img/supra.png" style="border: 3px solid whitesmoke; border-radius: 10px;" "float:left;" width="250px" height="150px" alt="Supra Belah Mesin" />
			<img src="img/turun-mesin1.jpg" style="border: 3px solid whitesmoke; border-radius: 10px;" "float:left;" width="359px" height="150px" alt="Turun Mesin" />
            </blockquote>
			
            <hr>
			
		</div>
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