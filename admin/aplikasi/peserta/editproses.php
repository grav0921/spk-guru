<?php 
session_start();
include "../koneksi.php";
if (isset($_GET['edit'])) {
  $id_edit = $_GET['edit'];
  $query = "DELETE from guru_peserta where nip ='$id_edit";
  $sql = mysql_query($query);

if ($sql) {
      echo "<script>alert('Data diedit');document.location='../admin/index.php?ap=peserta' </script> ";
      }else {
      echo "<script>alert('Data gagal diedit');document.location='../admin/index.php?ap=peserta' </script> ";
  }
}
?>