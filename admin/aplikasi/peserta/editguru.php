<?php
include "../koneksi.php";
if (isset($_GET['edit']))
      {
          $id=$_GET['edit'];
          $res=mysql_query("SELECT * FROM guru_peserta WHERE nip='$id'");
          $row=mysql_fetch_array($res);
        }

/*session_start();
if(!isset($_SESSION['admin'])){
  header("Location: login.php");
}else{
*/?>
<div class="row">
      <div class="col-lg-12">
        <h3 class="page-header">Edit Guru</h3>
      </div>
    </div>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]

              -->
<div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Ubah Guru</h3>
              <hr>
              <form role="form" action="editproses2.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nip" value="<?php echo $row[1]; ?>" readonly="true">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nama" value="<?php echo $row[2]; ?>">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"><?php echo $row['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="pendidikan">
                    <?php
                      if ($tmp_pend==""){
                        ?> <option value=''>-- Pendidikan --</option><?php
                      }else{
                        echo "<option value='$tmp_pend'>$tmp_pend</option>";
                      }
                    ?>
                    <option value='S1'>Sarjana (S1)</option>
                    <option value='S2'>Magister (S2)</option>
                    <option value='S3'>Doktor (S3)</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="jabatan">
                    <?php
                      if ($tmp_jabatan==""){
                        echo "<option value=''>-- Jabatan --</option>";  
                      }else{
                        echo "<option value='$tmp_jabatan'>$tmp_jabatan</option>";
                      }
                    ?>
                    <option value='Guru Besar'>Kepala Sekolah</option>
                    <option value='Lektor Kepala'>Guru</option>
                    <option value='Lektor'>Tata Usaha </option>
                    <option value='Asisten Ahli'>Pustakawan</option>
                    <option value='Pengajar'>Konselor Sekolah</option>
                  </select>
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Ubah" name="simpan">
              </form>  
            </div>
          </div>
</body>

</html>
<?php ?>