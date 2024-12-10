<?php
include ("conn.php");

if(isset($_POST['input'])){
	
    $nama     	= $_POST['nama'];
	$no_telp  	= $_POST['no_telp'];
    $pesan 		= $_POST['pesan'];
        
    $cekno= mysqli_query($koneksi, "SELECT * FROM pesan ORDER BY id_pesan DESC");
        
        
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
		
		$sql="INSERT INTO pesan(id_pesan,nama,no_telp,pesan) VALUES
        ('$kode','$nama','$no_telp','$pesan')";
		$res=mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
		//echo "Gambar berhasil dikirim ke direktori".$gambar;
        echo "<script>alert('Pesan berhasil dimasukan!'); window.location = 'contact.php'</script>";	   
		}
?>
