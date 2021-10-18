<?php
	session_start();
	include "../koneksi.php";

	$username = $_POST['username'];
	$password = $_POST['password'];
	$jenis = $_POST['jenis'];
	if($jenis==""){
		$query = mysql_query("select * from user where username='$username' and password='$password' and jenis='siswa'");
		$cek=mysql_num_rows($query);

		if($cek){
			$_SESSION['nis'] = $username;
			?><script language="JavaScript">alert('Login Berhasil  !'); 
			document.location='../siswa/index.php'</script><?php
		}else {
			echo mysql_error();
			?><script language="JavaScript">alert('Login Gagal  !'); 
			document.location='../index.php?ap=login'</script><?php
		}
	}


	if($jenis=="siswa"){
		$query = mysql_query("select * from user where username='$username' and password='$password' and jenis='$jenis'");
		$cek=mysql_num_rows($query);

		if($cek){
			$_SESSION['nis'] = $username;
			?><script language="JavaScript">alert('Login Berhasil  !'); 
			document.location='../siswa/index.php'</script><?php
		}else {
			echo mysql_error();
			?><script language="JavaScript">alert('Login Gagal  !'); 
			document.location='../index.php?ap=login'</script><?php
		}
	}

	if($jenis=="guru"){
		$query = mysql_query("select * from user where username='$username' and password='$password' and jenis='$jenis'");
		$cek=mysql_num_rows($query);

		if($cek){
			$_SESSION['nip'] = $username;
			?><script language="JavaScript">alert('Login Berhasil  !'); 
			document.location='../guru/index.php'</script><?php
		}else {
			echo mysql_error();
			?><script language="JavaScript">alert('Login Gagal  !'); 
			document.location='../index.php?ap=login'</script><?php
		}
	}

?>