<?php
include "../conn.php";
if(isset($_POST['update'])){

    $id_pesan     = $_POST['id_pesan'];
    $nama     	  = $_POST['nama'];
	$no_telp  	  = $_POST['no_telp'];
    $pesan     	  = $_POST['pesan'];

	$sql="UPDATE pesan SET nama='$nama', no_telp='$no_telp', pesan='$pesan' WHERE id_pesan='$id_pesan'" or die(mysqli_error());
	$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
	//echo "Gambar berhasil dikirim ke direktori".$gambar;
    echo "<script>alert('Pesan berhasil diupdate!'); window.location = 'pesan.php'</script>";	   
	} else {
	echo "<p>Pesan gagal dikirim</p>";
	}
   
?>