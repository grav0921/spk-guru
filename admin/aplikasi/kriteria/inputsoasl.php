<?php
include '../koneksi.php';
				$soal1 = $_POST['q1'];
				$soal2 = $_POST['q2'];
				$soal3 = $_POST['q3'];
				$soal4 = $_POST['q4'];

				$insert = "insert into tb_soal values('','$soal1','$soal2','$soal3','$soal4')";
				$query = mysql_query($insert);
				if ($query) {
					echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=kriteria'</script>";
				}else{
					echo "<script>alert('Data gagal tersimpan');document.location='../admin/index.php?ap=kriteria'</script>";
				}
			
		