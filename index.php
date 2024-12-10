<?php require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body>
    
	<?php include "header.php"; ?>
	
	<!-- start: Slider -->
	<div class="slider-wrapper">

		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2>MMS</h2>
				<p> adalah UMKM yang bergerak dalam bidang otomotif yang meliputi perbaikan (berat dan ringan) dan modifikas kendaraan bermotor roda 2. 
					MMS juga melayani berbagai kebutuhan seperti: suku cadang, body paint, perbaikan, dan modifikasi untuk kendaraan bermotor roda 2 anda.</p>
				<a href="profil.php" class="da-link">Lihat Detail</a>
				<div class="da-img"><img src="img/parallax-slider/bengkel.png" style="border: 3px solid whitesmoke; border-radius: 10px;" alt="Nmax" /></div>
			</div>
			<div class="da-slide">
				<h2>Jam Pelayanan :</h2>
				<p>			
					Senin - Kamis : &nbsp;08.00 - 17.00 WIB. <br >
					Jum'at : &nbsp;Libur. <br >
					Sabtu - Minggu &nbsp;09.00 - 17.00 WIB.
				</p>
				<a href="profil.php" class="da-link">Lihat Detail</a>
				<div class="da-img"><img src="img/parallax-slider/bengkel.png" style="border: 3px solid whitesmoke; border-radius: 10px;" alt="CBR" /></div>
			</div>
			<div class="da-slide">
			<h2>Contact Us</h2>
				<p> 
					Jl. Gilang Sawunggaling No.51, Gilang Utara, Gilang, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257. <br >
					No, Telp : 082141833935. <br >
					No. WA : 089530583955. <br >
				</p>
				<a href="https://oto.detik.com/motor/d-5379458/viral-motor-bebek-2-tak-seharga-rp-125-juta-apa-spesialnya" class="da-link">Lihat Berita</a>
				<div class="da-img"><img src="img/parallax-slider/bengkel.png" style="border: 3px solid whitesmoke; border-radius: 10px;" alt="Motor Bebek" /></div>
			</div>
			<!--<div class="da-slide">
				<h2>Harley Patenkan V-Twin</h2>
				<p>Jakarta - Harley-Davidson resmi mematenkan design mesin supercharged terbaru, kerennya sistem supercharged ini diselipkan pada mesin V-Twin ciri khas produsen motor besar asal Amerika Serikat ini.
				   Dikutip dari Visordown, posisi belt supercharged terlihat diletakkan tepat di atas gearbox dan silinder.</p>
				<a href="https://oto.detik.com/motor/d-5371246/makin-blarrr-harley-davidson-patenkan-mesin-v-twin-supercharged?_ga=2.195818350.339766566.1614762859-397809615.1613999039" class="da-link">Lihat Berita</a>
				<div class="da-img"><img src="img/parallax-slider/HD.png" style="border: 3px solid whitesmoke; border-radius: 10px;" alt="Harley Davidson" /></div>
			</div>
			<div class="da-slide">
				<h2>China Bikin Motor Adventure</h2>
				<p>Jakarta - Pabrikan sepeda motor asal China, Lifan, membuat sebuah produk yang menggabungkan motor bebek dengan gaya adventure. 
				   Niatnya sudah bagus, ingin membuat jenis motor yang berbeda dari pabrikan manapun. 
				   Tapi jujur, motor bebek adventure Lifan ini bentuknya aneh banget.</p>
				<a href="https://oto.detik.com/motor/d-5366977/pabrikan-china-bikin-motor-bebek-adventure-bentuknya-aneh-banget?_ga=2.3325042.339766566.1614762859-397809615.1613999039" class="da-link">Lihat Berita</a>
				<div class="da-img"><img src="img/parallax-slider/MC.jpeg" style="border: 3px solid whitesmoke; border-radius: 10px;" alt="MotorCina" /></div>
			</div>-->
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>
		
	</div>
	<!-- end: Slider -->
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		<div class="hero-unit">
        		<p>
                 Kami Hadir Untuk Memudahkan Anda dalam Melakukan Servis Kendaraan Bermotor roda 2 di bengkel MMS.
				 Kini Anda Tidak Perlu menunggu Berjam - Jam Dibengkel Untuk Servis.
				</p>
        		<p><a class="btn btn-success btn-large" href="booking.php">Booking Sekarang &raquo;</a></p>
                                
      		</div>
            <!--<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            </div> -->
			<!-- end: Hero Unit -->

      		<!-- start: Row -->
			
			<hr>
        		<p><h4>
					NB : Jika Tiket Booking Hilang Atau Rusak Dapat Menghubungi Admin Di Nomer Berikut. <br >
					No WA : 089530583955 Atau Bisa Cek Dan Cetak Kembali Di Menu Antrian.
				</h4></p>
			
			<!-- start: Row -->
			<div class="row">
				
				<!-- start: Icon Boxes -->
				<!--<div class="icons-box-vert-container">

					<!-- start: Icon Box Start -->
					<!--<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ok ico-color circle-color big"></i>
							<div class="icons-box-vert-info">
								<h3>Servis Aman Dan Berkualitas</h3>
								<p>MMS menjamin kualitas servis untuk kendaraan anda dan keamanan kendaraan anda setelah servis.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box-->

					<!-- start: Icon Box Start -->
					<!--<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-user  ico-white circle-color-full big-color"></i>
							<div class="icons-box-vert-info">
								<h3>Mekanik Ahli</h3>
								<p>Mekanik Yang Ahli Dalam Repair Kerusakan Berat Maupun Ringan Dan Custom/Modifikasi Mesin.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

				<!--</div>
				<!-- end: Icon Boxes -->
				<div class="clear"></div>
			</div>
			<!-- end: Row -->
			
			<!--<hr>
			
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