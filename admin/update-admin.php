<?php
include "../conn.php";
$user_id       = $_POST['user_id'];
$fullname      = $_POST['fullname'];
$no_telp	   = $_POST['no_telp'];
$alamat	   	   = $_POST['alamat'];
$username      = $_POST['username'];
$password1     = $_POST['password'];
$password	   = sha1($password1);

$query = mysqli_query($koneksi, "UPDATE user SET fullname='$fullname', no_telp='$no_telp', alamat='$alamat', username='$username', password='$password' WHERE user_id='$user_id'")or die(mysql_error());
if ($query){
header('location:admin.php');	
} else {
	echo "gagal";
    }
?>