<?php
	if(isset($_GET['ap'])){
		$ap = $_GET['ap'];
		
		if ($ap=="peserta"){
			include "aplikasi/peserta/index.php";
		}

		if ($ap=="siswa"){
			include "aplikasi/siswa/index.php";
		}

		if ($ap=="daftarsis"){
			include "aplikasi/siswa/daftarsis.php";
		}

		if ($ap=="daftarguru"){
			include "aplikasi/peserta/daftarguru.php";
		}

		if ($ap=="daftarproses"){
			include "aplikasi/peserta/daftarproses.php";
		}

		if ($ap=="periode"){
			include "aplikasi/periode/periode.php";
		}

		if ($ap=="hmp_kriteria"){
			include "aplikasi/hmp_kriteria/hmp_kriteria.php";
		}

		if ($ap=="kriteria"){
			include "aplikasi/kriteria/index.php";
		}

		if ($ap=="hitung"){
			include "aplikasi/perhitungan/index.php";
		}

		if($ap=="login"){
			include "aplikasi/login.php";
		}

		if($ap=="pengaturan"){
			include "pengaturan.php";
		}

	}else{
		include "home.php";
	}

?>