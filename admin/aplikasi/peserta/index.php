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
				<h3 class="page-header"><a style="color:#5f6468 !important;text-decoration:none;" href="?ap=peserta">Data Guru</a></h3>
			</div>
		</div><!--/.row-->
<!--<a href="#">Tambah</a>-->
<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body tabelguru">
             <!--<?php if (isset($_GET['ap']) && $_GET['ap']=="daftarguru")?><a href="?ap=daftarguru" class="btn btn-primary btn-sm" id="btn-todo">Tambah Biodata</a>-->
             <a href="?ap=peserta&tambah=1" class="btn btn-primary btn-sm" >Tambah Biodata</a>
            
						<table class="table">
              <!--<a href="?ap=peserta&proses=2" class="btn btn-primary btn-sm" >Tambah User</a>-->
              
						    <thead>
						    <tr>
						    <th>No</th>
								<th>NIP</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Pendidikan</th>
								<th>Jabatan</th>
								<th>Aksi</th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php
						    include "../koneksi.php";
						    $no=0;
							$query = "select * from guru_peserta";
							$hasil = mysql_query($query) or die("");
							while ($data = mysql_fetch_array($hasil)) {
								$no++;
							?>
							<tr>
								<td><?php echo "".$no; ?></td>
								<td><?php echo $data['nip']; ?></td>
								<td><?php echo $data['nama']; ?></td>
								<td><?php echo $data['alamat']; ?></td>
								<td><?php echo $data['pendidikan']; ?></td>
								<td><?php echo $data['jabatan']; ?></td>
                <!--<td><button class="btn btn-warning btn-sm" id="btn-todo">Edit</button>
                <td><a href="?ap=peserta&proses=3?edit='.$data['nip'].'" class="btn btn-warning btn-sm" id="btn-todo">Edit</a>
                <td><a href="indeks2.php?edit='.$data['nip'].'" class="btn btn-warning btn-sm" id="btn-todo">Direct</a>
                <td style="color:white;"><?php if (isset($_GET['ap']) && $_GET['ap']=="editguru")?><a style="color:white;" <?php echo 'href=?ap=editguru.php?edit='.$data['nip'].''?> class="btn btn-warning btn-sm" id="btn-todo">EditA</a>-->

                <td style="color:white;"><a style="color:white;" <?php echo 'href=?ap=peserta&edit='.$data['id_guru'].''?> class="btn btn-warning btn-sm" id="btn-todo">Edit</a>
								<!--<a button class="btn btn-info btn-sm" id="btn-todo" href="hapusproses.php">Hapus</a></button></td><?php echo $data['nip'];?>-->
								<?php echo '<a button class = "btn btn-info btn-sm" id="btn-todo" href=?ap=peserta&delete='.$data['id_guru'].'>Hapus'?></td>
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
if (isset($_GET['tambah'])){
		if (!$_GET['tambah']){
      echo "string";
    }else{
			?>
      <style>
        .tabelguru{
          display: none;
        }
      </style>
			<div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Isi Biodata Guru</h3>
              <hr>
              <form role="form" action="?ap=peserta&tambah=2" method="post"><!---->
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="NIP" name="nip">
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
                    <option value='Kepala Sekolah'>Kepala Sekolah</option>
                    <option value='Guru'>Guru</option>
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
    if (isset($_GET['tambah'])) {
      if ($_GET['tambah']==2) {
        include"../koneksi.php";
        if (!$_POST['nip'] || !$_POST['nama'] || !$_POST['alamat'] || !$_POST['pendidikan'] || !$_POST['jabatan']) {
          echo "<script>alert('Data belum di isi')</script>";
        }else{
          $nip = $_POST['nip'];
          $nama = $_POST['nama'];
          $alamat = $_POST['alamat'];
          $pendidikan = $_POST['pendidikan'];
          $jabatan = $_POST['jabatan'];
          $sql = mysql_query("insert into guru_peserta values ('','$nip','$nama','$alamat','$pendidikan','$jabatan','','','','','','','','')");

          if ($sql) {
            echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=peserta' </script> ";
          }else {
          //echo "<script>alert('Data gagal disimpan');document.location='../admin/index.php?ap=peserta&tambah=1' </script> ";
            echo "<script>alert('Data gagal disimpan')</script>";
            }
          }
        }
       }
    ?>


    <?php 
    if (isset($_GET['edit'])){
      if (!$_GET['edit']){  
        echo "Woy woy woy";
      }else{
        $nip=$_GET['edit'];
        include"../koneksi.php";
        $qry = mysql_query("select * from guru_peserta where id_guru='$nip'");
        $res = mysql_fetch_assoc($qry);

    ?>
    <style>
        .tabelguru{
          display: none;
        }
      </style>
      <div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Ubah Guru</h3>
              <hr>
              <form role="form" action="?ap=peserta&editproses=<?php echo $nip ?>" method="post">
                <div class="form-group">
                  <input type="text" style="display: none;" class="form-control" id="NameInputEmail1" placeholder="NIP" name="id_guru" readonly="true" value=" <?php echo $res["id_guru"];?>" >
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="NIP" name="nip" value=" <?php echo $res["nip"]; ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nama" value="<?php echo $res["nama"]; ?>">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Alamat"  name="alamat" style="resize: none"><?php echo $res['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="pendidikan">
                    <?php
                      if ($tmp_pend==""){
                        ?> <option value='<?php echo $res['pendidikan']; ?>'>-- Pendidikan -- <?php echo $res['pendidikan']; ?></option><?php
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
                        echo "<option value='$res[jabatan]'>-- Jabatan -- $res[jabatan] </option>";  
                      }else{
                        echo "<option value='$tmp_jabatan'>$tmp_jabatan</option>";
                      }
                    ?>
                    <option value='Kepala Sekolah'>Kepala Sekolah</option>
                    <option value='Guru'>Guru</option>
                    <option value='Tata Usaha'>Tata Usaha </option>
                    <option value='Pustakawan'>Pustakawan</option>
                    <option value='Konselor Sekolah'>Konselor Sekolah</option>
                  </select>
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Ubah" name="simpan">
              </form>  
            </div>
          </div>

<?php



?>

  <?php }}?>
<?php 
    if (isset($_GET['editproses'])){
      if (!$_GET['editproses']){
        echo "Woy woy woy";
      }else{
        ?>
        <!-- <style>
          .tabelguru{
          display: none;
        }
        </style> -->
        <?php
        include"../koneksi.php";
        $nip = $_GET['editproses'];
          $id = $_POST['id_guru'];
          $nama = $_POST['nama'];
          $nip = $_POST['nip'];  
          $alamat = $_POST['alamat'];
          $pendidikan = $_POST['pendidikan'];
          $jabatan = $_POST['jabatan'];
          // if(!$nama || !$nip || !$alamat || !$pendidikan || !$jabatan){
          //    $sqel = mysql_query("select * from guru_peserta where nip='$nip'");
          //    $resq = mysql_fetch_assoc($sqel);
          //    $nama = $resq['nama'];
          //    $nip = $resq['nip'];
          //    $alamat = $resq['alamat'];
          //    $pendidikan = $resq['pendidikan'];
          //    $jabatan = $resq['jabatan'];
          //    echo "<script>alert('Masukkan data dulu bos');document.location='../admin/index.php?ap=peserta&edit=$nip'</script> ";
          // }else{
          // $sql1 = mysql_query("select * from guru_peserta where nip='$nip'");
          // $resq = mysql_fetch_assoc($sql1);
          //    $nama = $resq['nama'];
          //    $nip = $resq['nip'];
          //    $alamat = $resq['alamat'];
          //    $pendidikan = $resq['pendidikan'];
          //    $jabatan = $resq['jabatan'];
            $sql = mysql_query("update guru_peserta set nip='$nip', nama = '$nama', alamat = '$alamat', pendidikan = '$pendidikan', jabatan='$jabatan' where id_guru='$id'");
            if (isset($sql)) {
             echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=peserta' </script> ";
            }else{
             echo "<script>alert('Data gagal disimpan');</script> ";
            }
        }
      }
    ?>
  <?php ?>

 


<!--			<div class="container pt">
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