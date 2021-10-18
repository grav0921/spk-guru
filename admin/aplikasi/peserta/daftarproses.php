<?php
//session_start();
//session_start();
include "../koneksi.php";
//if(isset($_POST['submit'])){
//include_once "import/excel_reader2.php";
      $nip = $_POST['nip'];
      $nama = $_POST['nama'];
      $alamat = $_POST['alamat'];
      $pendidikan = $_POST['pendidikan'];
      $jabatan = $_POST['jabatan'];


        $query = "insert into guru_peserta values ('','$nip','$nama','$alamat','$pendidikan','$jabatan','','','','','','')";
        $sql = mysql_query($query);
      //}
      if ($sql) {
      echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=peserta' </script> ";
      }else {
      echo "<script>alert('Data gagal disimpan');document.location='../admin/index.php?ap=peserta' </script> ";
  }

