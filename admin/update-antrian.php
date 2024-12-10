<?php 
include "../conn.php";
if(isset($_POST['update'])){
				$id_antrian	     		= $_POST['id_antrian'];
				$no_antrian	     		= $_POST['no_antrian'];
				$no_plat	 			= $_POST['no_plat'];
				$status_antrian 		= $_POST['status_antrian'];
				
				$update = mysqli_query($koneksi, "UPDATE antrian SET no_antrian='$no_antrian',no_plat='$no_plat', status_antrian='$status_antrian' WHERE id_antrian='$id_antrian'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Data Antrian berhasil diupdate!'); window.location = 'antrian.php'</script>";
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
            ?>