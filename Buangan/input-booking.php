<?php
include ("conn.php");

if(isset($_POST['input'])){
	
    //jika tombol tambah benar di klik maka lanjut prosesnya
	$nama					= $_POST['nama'];
	$no_telp				= $_POST['no_telp'];	//membuat variabel $nis dan datanya dari inputan NIS
	$no_plat				= $_POST['no_plat'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$tipe					= $_POST['tipe'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$jenis					= $_POST['jenis'];
	$servis_tambahan		= $_POST['servis_tambahan'];
	$tgl_booking			= $_POST['tgl_booking'];
	$estimasi_biaya			= $_POST['estimasi_biaya'];
	$estimasi_pengerjaan	= $_POST['estimasi_pengerjaan'];
        
    $cekno= mysqli_query($koneksi, "SELECT * FROM booking ORDER BY id_booking DESC");
        
        
        $data1=mysqli_num_rows($cekno);
        $cekQ1=$data1;
        //$data=mysqli_fetch_array($ceknomor);
        //$cekQ=$data['f_kodepart'];
        #menghilangkan huruf
        //$awalQ=substr($cekQ,0-6);
        #ketemu angka awal(angka sebelumnya) + dengan 1
        $next1=$cekQ1+1;

        #menhitung jumlah karakter
        $kode1=strlen($next1);
        
        if(!$cekQ1)
        { $no1='000001'; }
        elseif($kode1==1)
        { $no1='00000'; }
        elseif($kode1==2)
        { $no1='0000'; }
        elseif($kode1==3)
        { $no1='000'; }
        elseif($kode1==4)
        { $no1='00'; }
        elseif($kode1==5)
        { $no1='0'; }
        elseif($kode1=6)
        { $no=''; }

        // masukkan dalam tabel penjualan
        $kode=$no1.$next1;
		
		$sql="INSERT INTO booking(id_booking, nama, no_telp, no_plat, tipe, jenis, servis_tambahan, tgl_booking, estimasi_biaya, estimasi_pengerjaan) VALUES
        ('$kode','$nama', '$no_telp', '$no_plat', '$tipe', '$jenis', '$servis_tambahan', '$tgl_booking', '$estimasi_biaya', '$estimasi_pengerjaan')";
		$res=mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
		//echo "Gambar berhasil dikirim ke direktori".$gambar;
        echo "<script>alert('Cetak Booking Tiket Servis Anda.');window.location='cetak.php';</script>";	   
		}
?>
