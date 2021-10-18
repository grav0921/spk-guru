<?php
	session_start();
	include "../koneksi.php";
	
	$nis = $_SESSION['nip'];
	$id_gur = $_POST['id_guru'];

	$c1 = $_POST['q1'];
	$c2 = $_POST['q2'];
	$c3 = $_POST['q3'];
	$c4 = $_POST['q4'];
	$rata = ($q1 + $q2 + $q3 + $q4) / 4;

	$cek = mysql_query("select * from nilai_guru where nip='$nip' and id_guru='$id_gur'");
	$num = mysql_num_rows($cek);
	if ($num > 0 ){
		$query = "update nilai_guru set q1='$q1', q2='$q2', q3='$q3', q4='$q4',';
	}else{
		$query = "insert into nilai_guru values ('', '$nis', '$id_gur', '$q1', '$q2', '$q3', '$q4',)";
	}

$sql = mysql_query($query);

	$j_sql = mysql_query("select * from nilai_guru where id_guru = '$id_gur'");
	$jml = mysql_num_rows($j_sql);
	$sql_nilai = mysql_query("select sum(q1) as q1, sum(q2) as q2, sum(q3) as q3, sum(q4) as q4, sum(avg) as avg from nilai_siswa where id_guru = '$id_gur'");
	$n = mysql_fetch_array($sql_nilai);
	$q1 = $n['q1'];
	$q2 = $n['q2'];
	$q3 = $n['q3'];
	$q4 = $n['q4'];

	$c1 = $q1/$jml;
	$c2 = $q2/$jml;
	$c3 = $q3/$jml;
	$c4 = $q4/$jml;

	$ins = mysql_query("update guru_peserta set c1 = '$c1', c2 = '$c2', c3 = '$c3', c4 = '$c4' where id_guru = '$id_gur'");
	
	if ($sql) {
		echo "<script>alert('Data berhasil tersimpan');document.location='index.php' </script> ";
	}else {
		echo "<script>alert('Data gagal disimpan');document.location='index.php' </script> ";
	}

?>