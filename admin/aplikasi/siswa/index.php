<style>
  .form-control:focus {
  border-color: #68c5da ;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
}
</style>

<div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><a style="color:#5f6468 !important;text-decoration:none;" href="?ap=siswa">Data Siswa</a></h3>
      </div>
    </div><!--/.row-->
<!--<a href="#">Tambah</a>-->
<div class="row tablesiswa">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <!--<?php if (isset($_GET['ap']) && $_GET['ap']=="daftarsis")?><a href="?ap=daftarsis" class="btn btn-primary btn-sm" id="btn-todo">Tambah Biodata</a>-->
          <a href="?ap=siswa&daftar=1" class="btn btn-primary btn-sm" >Tambah Biodata</a>
           <a href="?ap=siswa&view=1" class="btn btn-primary btn-sm" >View Data User</a>
            <table class="table table1">
              <!--<a href="?ap=peserta&proses=2" class="btn btn-primary btn-sm" >Tambah User</a>-->
                <thead>
                <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kelas</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "../koneksi.php";
                $no=0;
              $query = "select * from siswa";
              $hasil = mysql_query($query) or die("");
              while ($data = mysql_fetch_array($hasil)) {
                $no++;
              ?>
              <tr>
                <td><?php echo "".$no; ?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['kelas']; ?></td>
                <!--<td><button class="btn btn-warning btn-sm" id="btn-todo">Edit</button>
                <td><a href="?ap=peserta&proses=3?edit='.$data['nip'].'" class="btn btn-warning btn-sm" id="btn-todo">Edit</a>
                <td><a href="indeks2.php?edit='.$data['nip'].'" class="btn btn-warning btn-sm" id="btn-todo">Direct</a>-->
                <?php echo '<td style="color:white;"><a style="color:white;" href=?ap=siswa&edit='.$data['id_siswa'].' class="btn btn-warning btn-sm" id="btn-todo">Edits</a>';?>
                <!--<a button class="btn btn-info btn-sm" id="btn-todo" href="hapusproses.php">Hapus</a></button></td><?php echo $data['nip'];?>-->
                <?php echo '<a button class = "btn btn-info btn-sm" id="btn-todo" href=?ap=siswa&hapus='.$data['id_siswa'].'>Hapus'?></td>
              <?php
              }
              mysql_close();
              ?>

              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>

<?php
if (isset($_GET['view'])) {
  if ($_GET['view']==1) {
?>
      <style>
        .tablesiswa{
          display: none;
        }
      </style>
      <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
      <a href="?ap=siswa&user=1" class="btn btn-primary btn-sm" >Tambah User</a>
            <table class="table">
              <!--<a href="?ap=peserta&proses=2" class="btn btn-primary btn-sm" >Tambah User</a>-->
                <thead>
                <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Password</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "../koneksi.php";
                $no=0;
              $query = "select * from user";
              $hasil = mysql_query($query) or die("");
              while ($data = mysql_fetch_array($hasil)) {
                $no++;
              ?>
              <tr>
                <td><?php echo "".$no; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jenis']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <!--<td><button class="btn btn-warning btn-sm" id="btn-todo">Edit</button>
                <td><a href="?ap=peserta&proses=3?edit='.$data['nip'].'" class="btn btn-warning btn-sm" id="btn-todo">Edit</a>
                <td><a href="indeks2.php?edit='.$data['nip'].'" class="btn btn-warning btn-sm" id="btn-todo">Direct</a>-->
                <?php echo '<td style="color:white;"><a style="color:white;" href=?ap=siswa&useredit='.$data['id_user'].' class="btn btn-warning btn-sm" id="btn-todo">Edit</a>';?>
                <!--<a button class="btn btn-info btn-sm" id="btn-todo" href="hapusproses.php">Hapus</a></button></td><?php echo $data['nip'];?>-->
                <?php echo '<a button class = "btn btn-info btn-sm" id="btn-todo" href=?ap=siswa&userhapus='.$data['id_user'].'>Hapus'?></td>
              <?php
              }
              mysql_close();
              ?>

              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<?php
  }
}
?>


<?php 
if (isset($_GET['hapus'])) {
  if (!$_GET['hapus']) {
    echo "Data kosong";
  }else{
  include "../koneksi.php";
  $id_delete = $_GET['hapus'];
  //$query = "DELETE from siswa where nis ='$id_delete'";
  $sql = mysql_query("delete from siswa where id_siswa = '$id_delete'");
  //$row = mysql_fetch_array($sql);
  //var_dump($sql);

if ($sql) {
      echo "<script>alert('Data dihapus');document.location='../admin/index.php?ap=siswa' </script> ";
      }else {
      echo "<script>alert('Data gagal dihapus');document.location='../admin/index.php?ap=siswa' </script> ";
    }
  }
}
?>
<?php 
if (isset($_GET['daftar'])){
    if ($_GET['daftar'] == 1){
      ?>
      <style>
        .tablesiswa{
          display: none;
        }
      </style>
      <div class="col-lg-6 col-lg-offset-3 centered tabledaftar">
              <h3>Isi Biodata Siswa</h3>
              <hr>
              <form role="form" action="?ap=siswa&daftar=2" method="post"><!---->
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="NIS" name="nis">
                </div>
                <div class="form-group">
                <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nama">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="kelas">
                    <?php
                      if ($tmp_kelas==""){
                        ?> <option value=''>-- Kelas --</option><?php
                      }else{
                        echo "<option value='$tmp_kelas'>$tmp_kelas</option>";
                      }
                    ?>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                  </select>
                </div>
                <br>
                <input name="submit" type="submit" class="btn btn-success" value="Daftar">
              </form>  
            </div>
          </div>
            </div>
            <div class="container pt">
    <div class="row mt">
      <div class="col-lg-6 col-lg-offset-3 centered">
              <h3></h3>
              <hr>
      <?php
      
    }} ?>
    <?php
    if (isset($_GET['daftar'])) {
      if ($_GET['daftar']==2) {
    ?>
      <style>
        /*.manage{
          display: none;
        }
        .ha{
          display: none;
        }*/
      </style>
          <?php
      include"../koneksi.php";
            if(!$_POST['nis'] || !$_POST['nama'] || !$_POST['alamat'] || !$_POST['kelas'] ){
                echo "<script>alert('Isi data dulu bos');document.location='../admin/index.php?ap=siswa'</script>";
              }else{
            $nis = $_POST['nis'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $kelas = $_POST['kelas'];
            $query = "insert into siswa values ('','$nis','$nama','$alamat','$kelas')";
            $sql = mysql_query($query);
              if($query) {
                echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=siswa'</script>";
              }else{
                echo "<script>alert('Data gagal tersimpan');document.location='../admin/index.php?ap=siswa&proses=1'</script>";
                
              }
            }
          }
          
    }?>


<?php 

if (isset($_GET['edit'])){
    if (!$_GET['edit']){
      echo "string";
    }else{
      $nis=$_GET['edit'];
      include"../koneksi.php"; 
      $qry = mysql_query("select * from siswa where id_siswa='$nis'");
      $rowd = mysql_fetch_array($qry);
      //var_dump($rowd);
      ?>
      <style>
        .tablesiswa{
          display: none;
        }
      </style>
     <div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Ubah Siswa</h3>
              <hr>
              <form role="form" action="?ap=siswa&edit=2" method="post">
                  <!-- <input type="text" name="nis" style="display: none;"><?php echo "$rowd[1]"; ?></input> -->
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="NIS" name="nis" value="<?php echo $rowd[1]; ?>" readonly="true">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nama" value="<?php echo $rowd[2]; ?>">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"><?php echo $rowd[3]; ?></textarea>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="kelas">
                    <?php
                      if ($tmp_kelas==""){
                        ?> <option value=''>-- Kelas (<?php echo $rowd[4];?>) --</option><?php
                      }else{
                        echo "<option value='$tmp_kelas'>$tmp_kelas</option>";
                      }
                    ?>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                  </select>
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Ubah" name="simpan">
              </form>  
            </div>
      <?php
      
    }
  } ?>

  <?php
  if (isset($_GET['edit'])) {
    if ($_GET['edit']==2) {
      include "../koneksi.php";
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kelas = $_POST['kelas'];


        $sql = mysql_query("update siswa set nama = '$nama', alamat = '$alamat', kelas = '$kelas' where nis ='$nis'");


        if ($sql) {
            //echo "asda";
            echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=siswa' </script> ";
            }else {
            echo "<script>alert('Data gagal disimpan'); </script> ";
        }
    }
  }
  ?>

    <?php 
    if (isset($_GET['user'])){
      if ($_GET['user']==1){  
    ?>
    
      <style>
        .tablesiswa{
          display: none;
        }
      </style>
      <div class="col-lg-6 col-lg-offset-3 centered">
        <h3>Tambah User</h3>
              <hr>
              <form role="form" action="?ap=siswa&user=2" method="post"><!---->
                <!--<div class="form-group">
                
                <?php
                 echo "<input type='text' class='form-control' id='NameInputEmail1' placeholder='Id User' name='id_user'>"?>
                 
                </div>
                <div class="form-group">
                <input type="text" class="form-control" id="NameInputEmail1" placeholder="Id User" name="id_user">
                </div>-->
                <div class="form-group">
                <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="nama">
                </div>
                
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="jenis">
                    <?php
                      if ($tmp_jenis==""){
                        ?> <option value=''>-- Jenis --</option><?php
                      }else{
                        echo "<option value='$tmp_jenis'>$tmp_jenis</option>";
                      }
                    ?>
                    <option value='siswa'>siswa (siswa)</option>
                    <option value='guru'>guru (guru)</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                 <input name="submit" type="submit" class="btn btn-success" value="Tambah"> 
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container pt">
    <div class="row mt">
      <div class="col-lg-6 col-lg-offset-3 centered">
              <h3></h3>
              <hr>

  <?php }}?>
<?php 
    include"../koneksi.php";
    if (isset($_GET['user'])){
      if ($_GET['user'] == 2){  
        if(!$_POST['username'] || !$_POST['nama'] || !$_POST['jenis'] || !$_POST['password'] ){
                echo "<script>alert('Isi data dulu bos');document.location='../admin/index.php?ap=siswa&view=1'</script>";
              }else{
            $username = $_POST['username'];
            $nama = $_POST['nama'];
            $jenis = $_POST['jenis'];
            $password = $_POST['password'];
            // $query = "insert into user values ('','$username','$nama','$jenis','$password')";
            $query = "insert into user values('','$jenis','$username','$password','$nama')";
            $sql = mysql_query($query);
              if($query) {
                echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=siswa&view=1'</script>";
              }else{
                echo "<script>alert('Data gagal tersimpan');</script>";
                
              }
            }
          }
  }
?>

<?php 
    if (isset($_GET['useredit'])){
      if (!$_GET['useredit']){ 
        echo "string";
      }else{
      $nis=$_GET['useredit'];
      include"../koneksi.php";
      $qry = mysql_query("select * from user where id_user='$nis'");
      $rowd = mysql_fetch_array($qry);
      //var_dump($rowd);
      ?>
      <style>
        .tablesiswa{
          display: none;
        }
      </style>
     <div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Ubah User</h3>
              <hr>
              <form role="form" action="?ap=siswa&useredit=2" method="post">
                <div class="form-group">
                  <input type="text" name="id_user" style="display: none" value="<?php echo $rowd[0] ?>">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="username" value="<?php echo $rowd[2]; ?>" readonly="true">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="Nama" name="nama" value="<?php echo $rowd[4]; ?>">
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="jenis">
                    <?php
                      if ($tmp_jenis==""){
                        ?> <option value=''>-- Jenis (<?php echo $rowd[3];?>) --</option><?php
                      }else{
                        echo "<option value='echo $rowd[1];'>$tmp_jenis</option>";
                      }
                    ?>
                    <option value='siswa'>Siswa</option>
                    <option value='guru'>Guru</option>
                  </select>
                </div>
                <div class="form-group">
                <input type="password" class="form-control" id="NameInputEmail1" placeholder="Password Baru" name="password" value="<?php //echo $rowd[3];?>">
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Ubah" name="simpan">
              </form>  
            </div>
      <?php
          }
      }
?>
<?php
if (isset($_GET['useredit'])) {
    if ($_GET['useredit']==2) {
      include "../koneksi.php";
            $id_user=$_POST['id_user'];
            $username = $_POST['username'];
            $nama = $_POST['nama'];
            $jenis = $_POST['jenis'];
            $password = $_POST['password'];
            $query = "update user set nama = '$nama', username = '$username', jenis = '$jenis', password='$password' where id_user = '$id_user'";
            $sql = mysql_query($query);
              if($query) {
                echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=siswa&view=1'</script>";
              }else{
                echo "<script>alert('Data gagal tersimpan');</script>";
                
      }
    }
  }

?>
<?php
if (isset($_GET['userhapus'])) {
  if (!$_GET['userhapus']) {
    echo "Data kosong";
  }else{
  include "../koneksi.php";
  $id_delete = $_GET['userhapus'];
  //$query = "DELETE from siswa where nis ='$id_delete'";
  $sql = mysql_query("delete from user where id_user = '$id_delete'");
  //$row = mysql_fetch_array($sql);
  //var_dump($sql);

if ($sql) {
      echo "<script>alert('Data dihapus');document.location='../admin/index.php?ap=siswa&view=1' </script> ";
      }else {
      echo "<script>alert('Data gagal dihapus'); </script> ";
    }
  }
}?>
<!--      <div class="container pt">
      <div class="row mt">
      <div class="col-md-20">
      <div class="col-lg-6 col-lg-offset-3 centered">
        <h3>Isi Biodata</h3>
        <hr>
        <form role="form" action="daftar_dosen.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nip">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nama">
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"></textarea>
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
                    <option value='Guru Besar'>Guru Besar</option>
                    <option value='Lektor Kepala'>Lektor Kepala</option>
                    <option value='Lektor'>Lektor</option>
                    <option value='Asisten Ahli'>Asisten Ahli</option>
                    <option value='Pengajar'>Pengajar</option>
                  </select>
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Daftar">
              </form>  
            </div>
        </div>
    </div>
  </div>-->