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

				<h2><i class="ico-cup ico-white"></i>Pelayanan Bengkel MMS</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: 
	<!-- end: Slider -->
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container-->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main herounit for a primary marketing message or call to action

            <blockquote style="font-size: medium;">
            <h3><b>Profil Kami : </b></h3>
            <br>
            <b>Marno Motor Speed</b> adalah Marno Motor Speed (MMS) didirikan pada tahun 2005 sebagai UMKM yang bergerak dalam bidang otomotif yang meliputi perbaikan (berat dan ringan) dan modifikasi/custom kendaraan bermotor roda 2. 
			   Marno Motor Speed (MMS) Didukung oleh mekanik yang berpengalaman dan handal serta peralatan yang lengkap, kami menyediakan jasa perbaikan dan modifikasi untuk kendaraan bermotor roda 2. 
			   Marno Motor Speed (MMS) juga melayani berbagai kebutuhan seperti: suku cadang, body % paint, perbaikan, dan modifikasi untuk kendaraan bermotor roda 2 anda.
			   Marno Motor Speed (MMS) berlokasi di Jl. Gilang Sawunggaling No.51, Gilang Utara, Gilang, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257.
            <br/><br /> <b>Marno Motor Speed (MMS)</b> Free Pengecekan Kondisi Mesin, Diskon Biaya Jasa Jika Servis Berat, Dan Pelayanan Cepat Dan Tepat. <br />
			<br/><br /> <b><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.3099726928697!2d112.67352645265706!3d-7.358429722260391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e32ed3084dc7%3A0x59e14003b501ff19!2sWarkop%20Mbak%20Koes!5e0!3m2!1sid!2sid!4v1614009871690!5m2!1sid!2sid" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>. </b><br /> 
            
            
            </blockquote>
            <!--<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            </div> -->
			<!-- end: Hero Unit -->

      		<!-- start: Row -->
            
      		
			<!-- end: Row -->
      		
		<!--	<hr>
		
			<!-- start Clients List -->	
		<!--<div class="clients-carousel">
		
				<ul class="slides clients">
					<li><img src="img/logos/1.png" alt=""/></li>
					<li><img src="img/logos/2.png" alt=""/></li>	
					<li><img src="img/logos/3.png" alt=""/></li>
					<li><img src="img/logos/4.png" alt=""/></li>
					<li><img src="img/logos/5.png" alt=""/></li>
					<li><img src="img/logos/6.png" alt=""/></li>
					<li><img src="img/logos/7.png" alt=""/></li>
					<li><img src="img/logos/8.png" alt=""/></li>
					<li><img src="img/logos/9.png" alt=""/></li>
					<li><img src="img/logos/10.png" alt=""/></li>		
				</ul>
		
			</div>
			<!-- end Clients List -->
		
			<hr>
			
			<!-- start: Row -->
			<div class="row">
				
				<!-- start: Icon Boxes -->
				<div class="icons-box-vert-container">

					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ok ico-white circle-color-full big-color"></i>
							<div class="icons-box-vert-info">
								<h3>Servis Tune Up Rutin</h3>
								<a href="tune-up.php" class="da-link">
								<p>Klik Untuk Melihat Lebih Detail tentang servis tune up.</p>
								</a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box-->

					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ok ico-color circle-color big"></i>
							<div class="icons-box-vert-info">
								<h3>Servis Ringan</h3>
								<a href="servis-ringan.php" class="da-link">
								<p>Klik Untuk Melihat Lebih Detail tentang servis ringan.</p>
								</a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->
					
					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ok ico-color circle-color big"></i>
							<div class="icons-box-vert-info">
								<h3>Servis Berat</h3>
								<a href="servis-berat.php" class="da-link">
								<p>Klik Untuk Melihat Lebih Detail tentang servis berat.</p>
								</a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box-->
					
					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ok  ico-white circle-color-full big-color"></i>
							<div class="icons-box-vert-info">
								<h3>Modifikasi Motor</h3>
								<a href="modif.php" class="da-link">
								<p>Klik Untuk Melihat Lebih Detail tentang Modifikasi.</p>
								</a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->
		
				</div>
				<!-- end: Icon Boxes -->
				<div class="clear"></div>
			</div>
			<!-- end: Row -->
			
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