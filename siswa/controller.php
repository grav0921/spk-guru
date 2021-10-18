<?php

	if(isset($_GET['ap'])){
		$ap = $_GET['ap'];
		
		if ($ap=="data_guru"){
			include "konten/data_guru.php";
		}

		if($ap=="login"){
			include "konten/login.php";
		}

	}else{
		include "input_nilai.php";
	}

?>