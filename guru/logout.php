<?php
	session_start();
	unset($_SESSION['nis']);
	echo "<script>alert('Logout berhasil ');document.location='../index.php' </script> ";	
?>