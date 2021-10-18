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
				<h3 class="page-header">Himpunan Kriteria</h3>
			</div>
		</div><!--/.row-->

<div class="row himp">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
				
					<div class="row mt">
						<!-- <?php
						include "../koneksi.php";
						$sql = "select * from tb_kriteria";
						$query = mysql_query($sql);
						while ($row = mysql_fetch_array($query)) {
						//var_dump($row[1]);
						echo "<br>$row[1]"; 
						}
						?> -->
				<form action="?ap=hmp_kriteria&select=<?php echo"'.$row[0].'" ?>" method="post">
						<div class="col-lg-8 col-lg-offset-2">
							<form role="form">
						<div class="form-group">
							<select class="form-control" id="exampleInputEmail1" name="pilih">
							<option value = ""> -- Pilih Kriteria -- </option>
									<?php
											include "../koneksi.php";
											$sql = "select * from tb_kriteria";
											$query = mysql_query($sql);
											//$row = mysql_fetch_array($query);
											while ($row = mysql_fetch_array($query)	){
											echo "<option value = '$row[nama_kriteria]'>$row[nama_kriteria]</option>";
											}
									?>
							</select>
				  </div>
				  <input type="submit" name="submit" class="btn btn-primary" value="Pilih"></input>
				  <!-- <a href="?ap=hmp_kriteria&select=<?php echo "'.$row[0].'" ?>">HAHA</a> -->
				</form>    			
			</div>
			</form>
		</div><!-- /row -->
	
						
						
					</div>
				</div>
			</div>
</div>

<?php
	if(isset($_GET['select'])){
		if (!$_GET['select']) {
			//echo "string";
		}else{
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Himpunan Kriteria <?php $nm=$_POST['pilih']; echo "".$nm;  ?>
					<?php if ($nm=="") {
						echo "";
					}else{
					// 	echo '<a href=daftarhimpunan.php?daftar='.$_POST['pilih'].'>Tambah Himpunan</a>';

						echo '<a style="color : #68c5da !important;"" href=?ap=hmp_kriteria&daftarhmp='.$_POST['pilih'].'>Tambah Himpunan</a>';
						?><!-- <a href="?ap=aksi&daftar=1">Daftar</a> --><?php
						// echo '<a href=?aksi=daftar'.$_POST['pilih'].'>Daftar Himpunan</a>';
					}
					?>	
				</div>
					<div class="panel-body">
					<table class="table" style="">
						    <thead>
						    <tr>
						        <th>No</th>
								<th>Himpunan</th>
								<th>Keterangan</th>
								<th>Nilai</th>
								<th>Aksi</th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php
							include "../koneksi.php";
							$no=0;
							$nama=$_POST['pilih'];
							$query = "select * from tb_hmp_kriteria where nama_kriteria='$nama'";
							$hasil = mysql_query($query) or die("");
							while ($data = mysql_fetch_array($hasil)) {
								$no++;
							?>
							<tr>
								<td><?php echo "".$no; ?></td>
								<td><?php echo $data['himpunan']; ?></td>
								<td><?php echo $data['keterangan']; ?></td>
								<td><?php echo $data['nilai']; ?></td>
								<!-- <td style="color: white;"><a style="color: white;"<?php echo 'href=edithimpunan.php?edit='.$data['id_hmp'].''?> class="btn btn-warning btn-sm" id="btn-todo">Edit</a> -->
								<td style="color: white;"><a style="color: white;"<?php echo 'href=?ap=hmp_kriteria&edit='.$data['id_hmp'].''?> class="btn btn-warning btn-sm" id="btn-todo">Edit</a>
								<a style="color: white;"><a style="color: white;"<?php echo 'href=?ap=hmp_kriteria&hapus='.$data['id_hmp'].''?> class="btn btn-info btn-sm" id="btn-todo">Hapus</a></td> 
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

if (isset($_GET['edit'])) {
	if (!$_GET['edit']) {
		echo "string";
	}else{
		?>
		<style>
			.himp{
				display: none;
			}
		</style>
		<?php
		include "../koneksi.php";
			$id=$_GET['edit'];
			$res=mysql_query("select * from tb_hmp_kriteria where id_hmp = '$id'");
			$row=mysql_fetch_array($res);
			$nama_kriteria = $_GET['edit'];
		  	$cek = mysql_query("select * from tb_hmp_kriteria where id_hmp = '$nama_kriteria'");
		  	$r = mysql_num_rows($cek);

		  if($r>0){
		    $b = mysql_fetch_array($cek);
		    $id= $b['id_hmp'];
		    $nama = $b['nama_kriteria'];
		    $himpunan = $b['himpunan'];
		    $keterangan = $b['keterangan'];
		    $nilai = $b['nilai'];
		  }else{
		    $himpunan = "-- Himpunan --";
		    $keterangan = "-- Keterangan --";
		    $nilai = "-- Jabatan --";
		  }
		  ?>
		  <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-lg-8 col-lg-offset-2 centered">
							<h3>Edit Himpunan</h3>
              <hr>
              <form role="form" action="?ap=hmp_kriteria&editproses=1" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="ID" name="id_hmp" value="<?php echo $row['id_hmp'] ?>" readonly="true" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="Nama Kriteria" name="nama_kriteria" value="<?php echo $row['nama_kriteria'] ?>" readonly="true" >
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="himpunan" onchange="document.getElementById('selectedValue').innerHTML=this.value;">
                    <?php
                    
                    //$himp = $_GET['edit'];
                    $kurang="56-66";
                    $cukup="66-75";
                    $baik="76-85";
                    $sangat_baik="86-100";
                    if ($himpunan==""){
                        ?> <option value=''>-- Himpunan --</option><?php
                      }else{
                        echo "<option value='$himpunan'>$himpunan (lama)</option>";
                      }
                    ?>
                  <option value="56-66"><?php echo $kurang?></option>
                  <option value="66-75"><?php echo $cukup?></option>
                  <option value="76-85"><?php echo $baik?></option>
                  <option value="86-100"><?php echo $sangat_baik?></option>
                  </select>                  
                  </div>                  
                   <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="keterangan">
                    <?php
                    if ($keterangan==""){
                        ?> <option value=''>-- Keterangan --</option><?php
                      }else{
                        echo "<option value='$keterangan'>$keterangan (lama)</option>";                      
                      }
                    ?>
                  <option value="kurang">Kurang</option>
                  <option value="cukup">Cukup</option>
                  <option value="baik">Baik</option>
                  <option value="sangat_baik">Sangat Baik</option>
                  </select>                  
                  </div>  

                  <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="nilai">
                    <?php
                    if ($nilai==""){
                        ?> <option value=''>-- Nilai --</option><?php
                      }else{
                        echo "<option value='$nilai'>$nilai (lama)</option>";
                      }
                    ?>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  </select>                  
                  </div>                
                <br>
                <input name="submit" type="submit" class="btn btn-success" value="Ubah">
              </form> 
             
            </div>
					</div> 
				</div>
			</div>
		</div>
<?php
	}
}

if (isset($_GET['editproses'])) {
	if ($_GET['editproses']==1) {
	  include '../koneksi.php';
	  $id= $_POST['id_hmp'];
      $nama = $_POST['nama_kriteria'];
      $himpunan = $_POST['himpunan'];
      $keterangan = $_POST['keterangan'];
      $nilai = $_POST['nilai'];


        $query = "update tb_hmp_kriteria set nama_kriteria = '$nama', himpunan = '$himpunan', keterangan = '$keterangan', nilai='$nilai' where id_hmp = '$id'";

        $sql = mysql_query($query);
      //}
      if ($sql) {
      echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=hmp_kriteria' </script> ";
      }else {
      echo "<script>alert('Data berhasil tersimpan')</script>";//"<script>alert('Data gagal disimpan');document.location='../admin/index.php?ap=hmp_kriteria' </script> ";
  		}
	}
}

if (isset($_GET['hapus'])) {
	if ($_GET['hapus']) {
	include "../koneksi.php";
	  $id_delete = $_GET['hapus'];
	  $query = "DELETE from tb_hmp_kriteria where id_hmp ='$id_delete'";
	  $sql = mysql_query($query);

	if ($sql) {
	      echo "<script>alert('Data dihapus');document.location='../admin/index.php?ap=hmp_kriteria'</script> ";
	      }else {
	      echo "<script>alert('Data gagal dihapus')</script> ";
	  }
	}
}
if (isset($_GET['daftarhmp'])) {
	if ($_GET['daftarhmp']) {
	include "../koneksi.php";
	  $id = $_GET['daftarhmp'];
	  $sql = "select * from tb_kriteria where nama_kriteria=$id";
	  $query = mysql_query("SELECT * FROM tb_kriteria WHERE nama_kriteria='$id'");
	  $row = mysql_fetch_array($query);
	  $nama_kriteria = $_GET['daftarhmp'];
	  $cek = mysql_query("select * from tb_hmp_kriteria where nama_kriteria = '$nama_kriteria'");
	  $r = mysql_num_rows($cek);

	  /*if($r>0){
	    $b = mysql_fetch_array($cek);
	    $himpunan = $b['himpunan'];
	    $keterangan = $b['keterangan'];
	    $nilai = $b['nilai'];
	  }else{*/
	    $input = mysql_query("insert into tb_hmp_kriteria (id_hmp, nama_kriteria) values ('', '$row[nama_kriteria]')");

	    $himpunan = "-- Himpunan --";
	    $keterangan = "-- Keterangan --";
	    $nilai = "-- Jabatan --";
	    if ($input) {
	        echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=hmp_kriteria' </script> ";
	        }else {
	        echo "<script>alert('Data gagal disimpan');document.location='../admin/index.php?ap=hmp_kriteria' </script> ";
	    }
	}
}
?>


