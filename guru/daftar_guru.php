<?php
	session_start();
	include "../koneksi.php";
	
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$pendidikan = $_POST['pendidikan'];
	$jabatan = $_POST['jabatan'];

	if($pendidikan=="S1"){
		$c4=1;	
	}else if ($pendidikan=="S2"){
		$c4=3;
	}else if ($pendidikan=="S3"){

	}

	if($jabatan=="Kepala Sekolah"){
		$c10=5;
	}else if($jabatan=="Guru"){
		$c10=4;


	}


	$sql = mysql_query("update guru_peserta set nama = '$nama', alamat = '$alamat', pendidikan = '$pendidikan', jabatan='$jabatan', c4='$c4', c10='$c10' where nip='$nip'");


	if ($sql) {
		echo "<script>alert('Data berhasil tersimpan');document.location='home.php?aksi=daftar' </script> ";
	}else {
		echo "<script>alert('Data gagal disimpan');document.location='index.php' </script> ";
	}

?>