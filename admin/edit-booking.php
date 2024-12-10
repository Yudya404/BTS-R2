<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Admin | BTS R2</title>
		<link rel="icon" href="img/B2.png">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="../dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Data Tables -->
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="https://repo.rachmat.id/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function () {
		$('#datepicker').datepicker({
			dateFormat: 'yy-mm-dd',          
            minDate: 0,
            maxDate: '+0'
		});  
	});
</script>
<script src="responsive-calendar/js/responsive-calendar.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $(".responsive-calendar").responsiveCalendar({
          //time: '2013-05',
          events: {
            "<?php echo date("Y-m-d")?>": {},
            }
        });
      });
    </script>
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Administrator
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['fullname']; ?>
                                    </p>
                                </li>
                                <?php
								$timeout = 120; // Set timeout minutes
								$logout_redirect_url = "../index.php"; // Set logout URL
								$timeout = $timeout * 60; // Converts minutes to seconds
								if (isset($_SESSION['start_time'])) {
								$elapsed_time = time() - $_SESSION['start_time'];
								if ($elapsed_time >= $timeout) {
								session_destroy();
								echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
									}
								}
								$_SESSION['start_time'] = time();
								?>
								<?php } ?>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="admin.php?hal=edit&id=<?php echo $_SESSION['user_id'];?>" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat" onclick="return confirm ('Apakah Anda Akan Keluar.?');"> Keluar </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" />
                        </div>
                        <div class="pull-left info">
                            <p>Selamat Datang,<br /><?php echo $_SESSION['fullname']; ?></p>

                            <a><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <?php include "menu.php"; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Data Booking
                        <small>Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
                        <li class="active">Edit Data Booking</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php
				$id = $_GET['id_booking'];
				$sql = mysqli_query($koneksi, "SELECT * FROM booking WHERE id_booking='$id'");
				if(mysqli_num_rows($sql) == 0){
				header("Location: booking.php");
				}else{
				$row = mysqli_fetch_assoc($sql);
				}

				if(isset($_POST['update'])){
					
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
				$status_antrian		   = $_POST['status_antrian'];

				$sql="UPDATE booking SET nama='$nama', no_telp='$no_telp', no_plat='$no_plat', tipe='$tipe', jenis='$servis', tgl_booking='$tgl_booking', estimasi_biaya='$estimasi_biaya', catatan='$catatan', status_antrian='$status_antrian' WHERE id_booking='$id'" or die(mysqli_error());
				$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
				//echo "Gambar berhasil dikirim ke direktori".$gambar;
				echo "<script>alert('Data Booking berhasil diupdate!'); window.location = 'booking.php'</script>";	   
				}
				?>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Edit Data Booking </h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID Booking</label>
                              <div class="col-sm-8">
                                  <input name="id_booking" type="text" id="id_booking" value="<?php echo $row['id_booking']; ?>" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-3">
                            <input name="nama" type="text" id="nama" value="<?php echo $row['nama']; ?>" class="form-control" autocomplete="off" placeholder="Nama Pelanggan" autocomplete="off" required="required" />
                            </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Telp</label>
                              <div class="col-sm-3">
                            <input name="no_telp" type="text" id="no_telp" value="<?php echo $row['no_telp']; ?>" class="form-control" autocomplete="off" placeholder="No Telp Pelanggan" autocomplete="off" required="required" />
                            </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nopol</label>
                              <div class="col-sm-3">
                            <input name="no_plat" type="text" id="no_plat" value="<?php echo $row['no_plat']; ?>" class="form-control" autocomplete="off" placeholder="Nopol Motor Pelanggan" autocomplete="off" required="required" />
                            </div>
                          </div>
						  <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tipe Motor</label>
							<div class="col-sm-3">
								<select id="tipe" name="tipe" value="<?php echo $row['tipe']; ?>" class="form-control" required="required">
									<option selected="selected" value="">Pilih Tipe Motor</option>
									<option value="Motor Matic">Motor Matic</option>
									<option value="Motor Bebek">Motor Bebek</option>
									<option value="Motor Sport">Motor Sport</option>
								</select> 
                            </div>
							<label class="col-sm-2 col-sm-2 control-label">Tipe Motor Sebelumnya : </label>
                            <div class="col-sm-3">
                            <?php
                            if($row['tipe'] == 'Motor Matic'){
								echo '<span class="label label-success">Motor Matic</span>';
							}
                            else if ($row['tipe'] == 'Motor Bebek' ){
								echo '<span class="label label-success">Motor Bebek</span>';
							}
							else if ($row['tipe'] == 'Motor Sport' ){
								echo '<span class="label label-success">Motor Sport</span>';
							}
							?>
                            </span>
                            </div>
                          </div>
						  <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Jenis Servis</label>
							<div class="col-sm-3">
								<select name="select1" id="select1" value="<?php echo $row['jenis']; ?>" class="form-control" required="required">
									<option class="sum">Pilih Servis</option>
										<option value="Tune Up" class="sum">Servis Tune Up &nbsp;: Estimasi Pengerjaan 15 Menit</option>
										<option value="Servis Ringan" class="sum">Servis Ringan &nbsp;: Estimasi Pengerjaan 30 Menit</option>
										<option value="Fullservis" class="sum">Fullservis &nbsp;: Estimasi Pengerjaan 45 Menit</option>
										<option disabled="disabled" value="Modifikasi" class="sum" >Modifikasi : Estimasi Pengerjaan Sesuai Bagian Yang Dimodifikasi</option>
								</select> 
                            </div>
							<label class="col-sm-2 col-sm-2 control-label">Servis Sebelumnya : </label>
                            <div class="col-sm-3">
                            <?php
                            if($row['jenis'] == 'Tune Up'){
								echo '<span class="label label-success">Servis Tune Up : Estimasi Pengerjaan 15 Menit</span>';
							}
                            else if ($row['jenis'] == 'Servis Ringan' ){
								echo '<span class="label label-warning">Servis Ringan : Estimasi Pengerjaan 30 Menit</span>';
							}
							else if ($row['jenis'] == 'Fullservis' ){
								echo '<span class="label label-danger">Fullservis : Estimasi Pengerjaan 45 Menit</span>';
							}
							else if ($row['jenis'] == 'Modifikasi' ){
								echo '<span class="label label-process">Modifikasi : : Estimasi Pengerjaan Sesuai Bagian Yang Dimodifikasi</span>';
							}
							?>
                            </span>
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Booking</label>
                              <div class="col-sm-3">
                            <input name="tgl_booking" type="date" id="tgl_booking" value="<?php echo $row['tgl_booking']; ?>" class="form-control" autocomplete="off" placeholder="Tanggal Booking Servis" autocomplete="off" required="required" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Estimasi Biaya</label>
                            <div class="col-sm-3">
                            <span type="text" name="payment-total" id="payment-total" value="<?php echo $row['estimasi_biaya']; ?>" class="form-control" autocomplete="off" placeholder="Estimasi Biaya" autocomplete="off" required="required" />0</span>
                            </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Catatan</label>
                              <div class="col-sm-3">
                            <input name="catatan" type="text" id="catatan" value="<?php echo $row['catatan']; ?>" class="form-control" autocomplete="off" placeholder="Tambahan Servis" autocomplete="off" required="required" />
                            </div>
                          </div>
						  <div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Status Pelayanan</label>
								<div class="col-sm-3">
									<select id="status_antrian" name="status_antrian" class="form-control" required="required">
										<option> -- Pilih Status --</option>
										<option value="Belum">Menunggu Antrian</option>
										<option value="Proses">Antrian Sedang Diproses</option>
										<option value="Selesai">Antrian Sudah Dilayani</option>
										<option value="Batal">Antrian Batal</option>
									</select>
								</div>
							<label class="col-sm-2 col-sm-2 control-label">Status Sebelumnya : </label>
                            <div class="col-sm-3">
                            <?php
                            if ($row['status_antrian'] == 'Belum' ){
								echo '<span class="label label-danger">Menunggu Antrian</span>';
							}
							else if ($row['status_antrian'] == 'Proses' ){
								echo '<span class="label label-warning">Antrian Sedang Diproses Oleh Mekanik</span>';
								
							}else if ($row['status_antrian'] == 'Selesai' ){
								echo '<span class="label label-success">Antrian Sudah Dilayani</span>';
							}
							else if ($row['status_antrian'] == 'Batal' ){
								echo '<span class="label label-danger">Antrian Batal</span>';
							}
							?>
                            </span>
                            </div>
                           </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                            <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                        <a href="booking.php" class="btn btn-sm btn-danger">Batal </a>
                            </div>
								<div class="text-right">
								<a href="index.php" class="btn btn-sm btn-warning"> Kembali <i class="fa fa-arrow-circle-right"></i></a>
								</div>
                          </div>
                      </form>
                  </div>
                  </div>
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
				
				<!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script src="../dist/jquery.js"></script>
        <script src="../dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.core.js" type="text/javascript"></script>
        
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
        
    </body>
</html>
