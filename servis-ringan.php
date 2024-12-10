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

				<h2><i class="ico-ok ico-white"></i>Servis Ringan</h2>

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
            <h3><b>Servis Ringan : </b></h3>
            <br />
            <p>Servis Ringan merupakan kegiatan penggantian dan setting ulang komponen/sperpart motor yang aus atau rusak.</p>
			<br />
			<p> Meliputi : <p>
						
							<li>Penggantian Saringan Udara.</li>
							<li>Periksa dan penggantian Busi.</li>
							<li>Periksa Jarak Renggang Klep.</li>
							<li>Penggantian Oli Mesin.</li>
							<li>Penggantian Oli Gear Transimisi (matic).</li>
							<li>Penggantian kampas rem.</li>
					
			</blockquote>
			
			<blockquote style="font-size: medium;">
            <p>Berikut detail-detail servis ringan di bengkel MMS.</p>
			<img src="img/karbu.jpg" style="border: 3px solid whitesmoke; border-radius: 10px;" "float:left;" width="250px" height="150px" alt="Setting Karbulator" />
			<img src="img/filter.png" style="border: 3px solid whitesmoke; border-radius: 10px;" "float:left;" width="250px" height="150px" alt="Ganti Filter Udara" />
			<img src="img/rem.png" style="border: 3px solid whitesmoke; border-radius: 10px;" "float:left;" width="359px" height="150px" alt="Ganti Kampas Rem" />
			<img src="img/klep.png" style="border: 3px solid whitesmoke; border-radius: 10px;" "float:left;" width="359px" height="150px" alt="Stel Klep" />
			<img src="img/kopling.jpg" style="border: 3px solid whitesmoke; border-radius: 10px;" "float:left;" width="359px" height="150px" alt="Ganti Kampas Kopling" />
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