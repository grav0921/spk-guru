<?php
session_start();
include "../koneksi.php";
      $nim = $_SESSION['nis'];
      $qry = mysql_query("select * from user where username='$nim' and jenis='siswa'");
      $us = mysql_fetch_array($qry);

  $cek = mysql_query("select * from nilai_guru where nip='$nis'");
      $r = mysql_num_rows($cek);
      if ($r > 0){
        header("Location: http://localhost/spk_sistem_guru/guru/home.php?aksi=nilai");
      }else if ($r == 0){
        $cek_p = mysql_query("select * from guru_peserta where nip='$nis'");
        $rp = mysql_num_rows($cek_p);
        if ($rp > 0){
          header("Location: http://localhost/spk_sistem_guru/guru/home.php?aksi=daftar");
        }else{
          header("Location: http://localhost/spk_sistem_guru/guru/home.php");
        }
      }

?>