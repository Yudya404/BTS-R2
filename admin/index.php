<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
	$cek = mysqli_query($koneksi, "SELECT * FROM custom WHERE status='N'");

//$jml_data = mysql_num_rows(mysql_query("SELECT * FROM custom WHERE status='N'"));
?>
<?php 
include('date-helper.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Admin | BTS R2</title>
		<link rel="icon" href="img/B2.png">
		<script type="text/javascript" src="chartjs/Chart.js"></script>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<style>
		* {
margin: 0;
padding: 0;
}

body, html {
font-family: Calibri, "times new roman", sans-serif;
}

#button {
margin: 5% auto;
width: 100px;
text-align: center;
}

#button a {
background-image: linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -o-linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -ms-linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -moz-linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -webkit-linear-gradient(to bottom,#2a95c5,#21759b);
background-color: #2e9fd2;
width: 86px;
height: 30px;
vertical-align: middle;
padding: 10px;
color: #fff;
text-decoration: none;
border: 1px solid transparent;
border-radius: 5px;
}

#popup {
width: 100%;
height: 100%;
position: fixed;
background: rgba(0,0,0,.7);
top: 0;
left: 0;
z-index: 9999;
visibility: hidden;
}

.window {
width: 400px;
height: 10px;
background: #fff;
border-radius: 10px;
position: relative;
padding: 10px;
box-shadow: 0 0 5px rgba(0,0,0,.4);
text-align: center;
margin: 15% auto;
}

.close-button {
width: 20px;
height: 20px;
background: #000;
border-radius: 50%;
border: 3px solid #fff;
display: block;
text-align: center;
color: #fff;
text-decoration: none;
position: absolute;
top: -10px;
right: -10px;
}

#popup:target {
visibility: visible;
}
</style>
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
                        Dashboard
                        <small>Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>
                        <li class="active">Home</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <?php $tampil=mysqli_query($koneksi, "select * from booking order by id_booking desc");
                        $total=mysqli_num_rows($tampil);
                    ?>
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo "$total"; ?>
                                    </h3>
                                    <p>
                                       Data Booking
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon-book"></span>
                                </div>
                                <a href="booking.php" class="small-box-footer">
                                    Lihat Detail<span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <?php $tampil1=mysqli_query($koneksi, "select * from antrian order by id_antrian desc");
                        $dept=mysqli_num_rows($tampil1);
                    ?>
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo "$dept"; ?> <!--<sup style="font-size: 20px">%</sup>-->
                                    </h3>
                                    <p>
                                        Data Antrian
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon-retweet"></span>
                                </div>
                                <a href="antrian.php" class="small-box-footer">
                                    Lihat Detail<span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
						 <div class="col-lg-3 col-xs-6">
                        <?php $tampil3=mysqli_query($koneksi, "select * from user order by user_id desc");
                        $user=mysqli_num_rows($tampil3);
                    ?>
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                       <?php echo "$user"; ?>
                                    </h3>
                                    <p>
                                        Data Admin
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </div>
                                <a href="admin.php" class="small-box-footer">
                                    Lihat Detail<span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <?php $tampil2=mysqli_query($koneksi, "select * from pesan order by id_pesan desc");
                        $pel=mysqli_num_rows($tampil2);
                    ?>
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo "$pel"; ?> 
                                    </h3>
                                    <p>
                                        Kritik & Saran
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon-comment"></span>
                                </div>
                                <a href="pesan.php" class="small-box-footer">
                                    Lihat Detail<span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">                            
                            <div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-book"></i> Data Booking Invoice</h3> 
								</div>
                        <div class="panel-body">
						<!-- <div class="table-responsive"> -->
						<?php
						$batas = 5;
						$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
						$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
		 
						$previous = $halaman - 1;
						$next = $halaman + 1;
						
						$data = mysqli_query($koneksi,"select * from booking");
						$jumlah_data = mysqli_num_rows($data);
						$total_halaman = ceil($jumlah_data / $batas);
		 
						$tampil = mysqli_query($koneksi,"select * from booking order by id_booking DESC limit $halaman_awal, $batas");
						$nomor = $halaman_awal+1;
						
						?>
							<table id="example" class="table table-hover table-bordered">
								<thead>
									<tr>
										<th><center>ID Booking</center></th>
										<th><center>Nama</i></center></th>
										<th><center>Nopol</i></center></th>
										<th><center>Jenis Servis</i></center></th>
										<th><center>Tanggal Booking</center></th>
										<th><center>Status Pelayanan</center></th>
										<th><center>Tools</center></th>
									</tr>
								</thead>
							<?php 
							$no=0;
							while($data = mysqli_fetch_array($tampil))
							{ $no++; ?>
							<tbody>
							<td><center><?php echo $data['id_booking'];?></center></td>
							<td><a href="customer.php?hal=edit&id_booking=<?php echo $data['id_booking'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['nama'];?></td>
							<td><center><?php echo $data['no_plat'];?></center></td>
							<td><?php echo $data['jenis'];?></td>
							<td><center><?php echo convertDateDBtoIndo($data['tgl_booking']);?></center></td>
							<td><center><?php
                            if ($data['status_antrian'] == 'Belum' ){
								echo '<span class="label label-danger">Menunggu Antrian</span>';
							}
							else if ($data['status_antrian'] == 'Proses' ){
								echo '<span class="label label-warning">Antrian Sedang Diproses Oleh Mekanik</span>';
								
							}else if ($data['status_antrian'] == 'Selesai' ){
								echo '<span class="label label-success">Antrian Sudah Dilayani</span>';
								
							}else if ($data['status_antrian'] == 'Batal' ){
								echo '<span class="label label-danger">Antrian Batal</span>';
							}
							?>
							</center></td>
							<td><center>
							<div id="thanks">
							<a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Booking" href="edit-booking.php?hal=edit&id_booking=<?php echo $data['id_booking'];?>"><span class="glyphicon glyphicon-edit"></span></a>
							<!--<a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Cetak Laporan" href="tiket.php?hal=cetak&id_booking=<?php echo $data['id_booking'];?>"><span class="glyphicon glyphicon-print"></span></a>-->
							</center></td>
						</div>
							<?php   
							} 
							?>
						</tbody>
						</table>
						<center>
						<nav>
						<ul class="pagination justify-content-center">
							<li class="page-item">
								<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
							</li>
						<?php 
						for($x=1;$x<=$total_halaman;$x++){
						?> 
							<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
						<?php
						}
						?>				
							<li class="page-item">
								<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
							</li>
						</ul>
						</nav>
						</center>
						<!-- </div>-->
						<div class="text-right">
							<a href="booking.php" class="btn btn-sm btn-primary">Menu Booking<i class="fa fa-arrow-circle-right"></i></a>
						</div>
						</div> 
					</div>	
					</section><!-- /.Left col -->

					

                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable"> 
                     <div class="panel panel-default">
                      <div class="panel-heading">
                       <h3 class="panel-title"><i class="fa fa-retweet"></i> Data Antrian </h3> 
                      </div>
                      <div class="panel-body">
                      <!-- <div class="table-responsive"> -->
						<?php
						$batas = 5;
						$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
						$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
		 
						$previous = $halaman - 1;
						$next = $halaman + 1;
						
						$data = mysqli_query($koneksi,"select * from antrian");
						$jumlah_data = mysqli_num_rows($data);
						$total_halaman = ceil($jumlah_data / $batas);
		 
						$hasil1 = mysqli_query($koneksi,"select * from antrian order by id_antrian DESC limit $halaman_awal, $batas");
						$nomor = $halaman_awal+1;
						
						?>
						<table id="example" class="table table-hover table-bordered">
						<thead>
							<tr>
								<th><center>No Antrian</center></th>
								<th><center>Nopol </center></th>
								<th><center>Waktu Pelayanan </center></th>
							</tr>
						</thead>
						<?php 
						$no=0;
						while($data1=mysqli_fetch_array($hasil1))
						{ $no++; ?>
						<tbody>
							<tr>
								<td><center><?php echo $data1['no_antrian']; ?></center></td>
								<td><center><?php echo $data1['no_plat'];?></center></td>
								<td><center><?php echo $data1['status_antrian'];?></center></td>
							</tr>
						</div>
						<?php   
						} 
						?>
                   </tbody>
                   </table>
				   <center>
						<nav>
						<ul class="pagination justify-content-center">
							<li class="page-item">
								<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
							</li>
						<?php 
						for($x=1;$x<=$total_halaman;$x++){
						?> 
							<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
						<?php
						}
						?>				
							<li class="page-item">
								<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
							</li>
						</ul>
						</nav>
						</center>
					</div>
					<div class="text-right">
					<a class="btn btn-sm btn-primary" href="#popup"><span class="glyphicon glyphicon-edit"></span></a>
					</div>
					<td>
					<center>
					<div id="popup">
					<div class="window">
					<!-- Main content -->
					<section class="content">
					<?php
					if(isset($_POST['input'])){
					$id_antrian       	   = $_POST['id_antrian'];
					$no_antrian       	   = $_POST['no_antrian'];
					$no_plat       	  	   = $_POST['no_plat'];
					$status_antrian		   = $_POST['status_antrian'];
					
					$sql="INSERT INTO antrian(id_antrian,no_antrian,no_plat,status_antrian) VALUES ('$id_antrian','$no_antrian','$no_plat','$status_antrian')";
					$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
					//echo "Gambar berhasil dikirim ke direktori".$gambar;
					echo "<script>alert('Nomer Antrian berhasil dimasukan!'); window.location = 'index.php'</script>";	   
					} else
					?>
					<!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Input Data Antrian</h3> 
                        </div>
                        <div class="panel-body">
					  <div class="form-panel">
                      <form class="form-horizontal style-form" action="index.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                         <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">ID</label>
                              <div class="col-sm-8">
                                  <input name="id_antrian" type="text" id="id_antrian" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                              </div>
                         </div>
						 <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">No Antrian</label>
                              <div class="col-sm-8">
                                  <input name="id_booking" type="text" id="id_booking" class="form-control" autocomplete="off" placeholder="Isi Sesuai Urutan" required="required"/>
                              </div>
                         </div>
						 <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Nopol </label>
                              <div class="col-sm-8">
								<input name="no_plat" type="text" id="no_plat" class="form-control" autocomplete="off" placeholder="Nopol" autocomplete="off" required="required"/>
							  </div>
                          </div>
						  <div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Status Antrian</label>
								<div class="col-sm-8">
									<select id="status_antrian" name="status_antrian" class="form-control" required="required">
										<option> -- Pilih Status --</option>
										<option value="60 Menit">60 Menit</option>
										<option value="30 Menit">30 Menit</option>
										<option value="15 Menit">15 Menit</option>
										<option value="45 Menit">45 Menit</option>
									</select>
								</div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                            <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                          <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                            </div>
                          </div>
                     </form>
                  </div>
                  </div>
                  </div>
          		</div>
                    </div>

                </section><!-- /.content -->
								</div>
								</div>
								</center></td>
					
					<div class="text-left">
					<a href="antrian.php" class="btn btn-sm btn-info">Menu Antrian <i class="fa fa-arrow-circle-left"></i></a>
					</div>
					<br />
				</div> 
                </section><!-- right col -->
				
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">                            
                    <div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-book"></i>Grafik Data Booking</h3> 
						</div>
                    <div class="panel-body">
					<!-- <div class="table-responsive"> -->
					<div style="width: 600px;height: 400px">
						<canvas id="myChart"></canvas>
					</div>
					<?php
					$label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

					for($bulan = 1;$bulan < 13;$bulan++)
					{
						$query = mysqli_query($koneksi,"select count(*) as jumlah from booking where MONTH(tgl_booking)='$bulan'");
						$row = mysqli_fetch_array($query);
						$jumlah_produk[] = $row['jumlah'];
					}
					?>
					<script>
						var ctx = document.getElementById("myChart").getContext('2d');
						var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: <?php echo json_encode($label); ?>,
								datasets: [{
									label: 'Grafik Booking',
									data: <?php echo json_encode($jumlah_produk); ?>,
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero:true
										}
									}]
								}
							}
						});
					</script>
					
					<!-- </div>-->
					<div class="text-right">
						<a href="booking.php" class="btn btn-sm btn-primary">Menu Booking<i class="fa fa-arrow-circle-right"></i></a>
					</div>
					</div> 
					</div>
				</section><!-- /.Left col -->
				
        </div><!-- /.row (main row) -->
        </section><!-- /.content -->
        </aside><!-- /.right-side -->
				</div><!-- ./wrapper -->


        <!-- add new calendar event modal -->
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
