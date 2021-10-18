<?php 
/*if (isset($_GET['delete'])) {
  include "../koneksi.php";
  $id_delete = $_POST['nis'];
  $query = "DELETE from siswa where nis ='$id_delete'";
  $sql = mysql_query($query);
  $row = mysql_fetch_array($query);

if ($sql) {
      echo "<script>alert('Data dihapus');document.location='../admin/index.php?ap=siswa' </script> ";
      }else {
      echo "<script>alert('Data gagal dihapus');document.location='../admin/index.php?ap=siswa' </script> ";
  }
}*/
?>
<style>
	td, tr{
	}
</style>
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
				<?php if (!isset($_GET['ap']) && $_GET['ap']) {
					?>
					<?php
				} ?><h3 class="page-header"><a style="color:#5f6468 !important; cursor: default; text-decoration: none;" href="?ap=kriteria">Data Kriteria</a></h3> 
			</div>
		</div><!--/.row-->

<div class="row ha">
			<div class="col-md-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
					<a href="?ap=kriteria&tambah1=1" class="btn btn-primary btn-sm" >Tambah Kriteria</a>
					<a href="?ap=kriteria&proses=1" class="btn btn-primary btn-sm" >Manage Soal</a>
					<!--<div class= "btn-primary btn-sm" style="background-color: white; border: none;" ></div>-->
						<table class="table">
						    <thead>
						    <tr>
						        <th>No</th>
						        <th>Id Kriteria</th>
								<th>Nama Kriteria</th>
								<th>Kriteria (C)</th>
								<th>Bobot</th>
								<th>Aksi</th>
						    </tr>
						
						    </thead>
						    <tbody>
						    <?php
						    include "../koneksi.php";
						    $no=0;
						    $idkrit=0;
							$c=0;
							$id;
							$query = "select * from tb_kriteria";
							$hasil = mysql_query($query) or die("");
							while ($data = mysql_fetch_array($hasil)) {
								$no++;
								$c++;
								$idkrit++;
								$id=$data['id_kriteria'];
							?>
							<tr>
								<td><?php echo "".$no; ?></td>
								<td><?php echo "".$idkrit; ?></td>
								<td><?php echo $data['nama_kriteria']; ?></td>
								<td><?php echo "C".$c; ?></td>
								<td><?php echo $data['bobot']; ?></td>
								<td style="color: white;"><a style="color: white;"<?php echo 'href=?ap=kriteria&ubahkriteria='.$id.''?> class="btn btn-warning btn-sm" id="btn-todo">Edit</a>
								<a style="color: white;"><a style="color: white;"<?php echo 'href=?ap=kriteria&hapuskriteria='.$id.''?> class="btn btn-info btn-sm" id="btn-todo">Hapus</a></td>
								
							<?php
							}
							mysql_close();
							?>

							</tr>
							</tbody>
						</table>
					</form>
					</div>
				</div>
			</div>
</div>
<?php
	if (isset($_GET['proses'])) {
		if($_GET['proses']==1){
		?>
		<style>
			.ha{
				display: none;
			}
		</style>
		<div class="row manage" style="height: 100vh">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>Manage Soal</h4>
						<a href="?ap=kriteria&tambah=1" class="btn btn-primary btn-sm" >Tambah Soal</a>
						<table class="table">
							<thead>
								<tr>
								<th>No</th>
								<th>Soal 1</th>
								<th>Soal 2</th>
								<th>Soal 3</th>
								<th>Soal 4</th>
								
								<th>Aksi</th>
								<th>Status</th>
								<!--<th s4W1tyle="display: flex; align-items: center; justify-content: space-between;">Status <input type="submit" name="submit" class="" value="Simpan" style="background: none; border: none; color: #F24464;"></th>-->
								</tr>
							</thead>
							<tbody>
								<?php 
								include"../koneksi.php";
								$no=0;
								$c=0;
								$id;
								$query = "select * from tb_soal";
								$data = mysql_fetch_array($hasil);
								$id=$data['id_soal'];
								$hasil=mysql_query($query) or die("");
								$ceq = mysql_query("select status from tb_soal where id_soal='$id'");
								$ceks = mysql_fetch_array($ceq);
								if ($ceks['status']==1) {
									$scek=1;
								}elseif ($ceks['status']==0) {
									$scek=0;
								}
								while ($data = mysql_fetch_array($hasil)) {
									$no++;
									$id=$data['id_soal'];
								echo "<tr>";
								echo "<td>".$no."</td>";
								echo "<td>".$data['q1']."</td>";
								echo "<td>".$data['q2']."</td>";
								echo "<td>".$data['q3']."</td>";
								echo "<td>".$data['q4']."</td>";
								
								
								?>
								<td style="width: 15%;"><a <?php echo 'href=?ap=kriteria&edit='.$id.''?> class="btn btn-warning btn-sm" id="btn-todo">Edit</a>
								<!--<a href="?ap=kriteria?delete=1" class="btn btn-warning btn-sm" id="btn-todo">Hapus </a></td>-->
								<?php
								echo '<a href=?ap=kriteria&delete='.$id.' class="btn btn-primary btn-sm" id="btn-todo">Hapus';
								?>
								<?php
								echo "</td>";
								?>
								<form action="?ap=kriteria&statuse=1" method="post">
								<td style="width: 15%">
									<input style="display: none;" type="text" name="id_soal" value="<?php echo $id ?>">
									<input type="checkbox" name="status" id="status" class="status" value="1">
								
								<?php
								if (!$data['status']) {
									?>
									<!--<input type="checkbox" name="" name="status" value="">-->
									<style>
									.status{
											display: none;
										}
									</style>
									<input type="checkbox" name="status" value="1">
									<?php
								}else{
									?>
									<!--<input type="checkbox" name="status" value=""checked>-->
									<style>
									.status{
											display: none;
										}
									</style>
									<input type="checkbox" name="status" value="0" checked="">
									<?php
								}
								?>
								<input style="color: #68c5da; background: none; border:none; font-weight: 600" type="submit" name="submit" value="Simpan">
								</td>

								<!--<td style="width:";><input type ="radio" name="cekso" value='1' <?php
								/*if ($scek==1)
									echo "checked";
								*/?>> Aktif 
								<input type="radio" name="cekso" value='0'<?php
								/*if ($scek==0) 
									echo "checked";
								*/?>> Tidak Aktif <input class="" type = "text" value="<?php echo"$id" ?>"name = "id_soal" style="cursor: not-allowed; border: none; width: 1%; background-color: none;" readonly="true" >
								</td>-->
								<?php?></form><?php
								echo"</tr>";
							}
								?>
							</tbody>
						</table>
						<!--
						<div class="" style="margin: 5rem 0 2rem 0; border-bottom: 1pt #dddddd solid">
						<h4 style="text-align: center;">Pilih Soal</h4>
						</div>
						<form action="?ap=kriteria&status=1" method="post" role="form">
							<select style="display: block; width: 50%; margin: auto;" class="form-control" id="" name="staus">
							<div class="form-group">
								<option value="0">Pilih Soal
									<?php
									$tab = "select * from tb_soal";
									$sql = mysql_query($tab);
									while ($dats=mysql_fetch_array($sql)) {
										$ceks=mysql_query("select * from tb_soal where id_soal='$dats[id_soal]' and status='$dats[status]'");
										$num=mysql_num_rows($ceks);
										if ($num < 0) {
											echo "option";
										}else{
											echo "string";
										}
									}
									?>
								</option>
							</div>
							<input class="btn btn-primary btn-todo" type="submit" name="submit" value="Simpan" style="margin:auto; margin-top: 3rem; display: block;">
							</select>
						</form>-->
					</div>
				</div>
			</div>
		</div>
		<?php	
		}
	}?>

<?php
if (isset($_GET['tambah'])) {
	if ($_GET['tambah']==1) {
		?>
		<style>
			.manage{
				display: none;
			}
			.ha{
				display: none;
			}
			.form-cotrol{
				resize: none; 
			}
			.form-group label{
				font-weight: normal;
			}
		</style>
		<div class="row soal">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-lg-8 col-lg-offset-2 centered">
							<h4 style="margin-bottom: 3rem ;">Tambah Soal</h4>
							<form role="form" action="?ap=kriteria&tambah=2" method="post">
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Input Soal 1</label>
									<textarea value="q1" name="q1" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Input Soal 2</label>
									<textarea value="q2" name="q2" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Input Soal 3</label>
									<textarea value="q3" name="q3" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Input Soal 4</label>
									<textarea value="q4" name="q4" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
								<input type="submit" name="submit" value="Simpan" class="btn btn-success">
							</form>
						</div>
					</div> 
				</div>
			</div>
		</div><?php
	}
}
?>
<?php
if (isset($_GET['tambah'])) {
	if ($_GET['tambah']==2) {
?>
	<style>
		.manage{
			display: none;
		}
		.ha{
			display: none;
		}
	</style>
			<?php
			include"../koneksi.php";
				$soal1 = $_POST['q1'];
				$soal2 = $_POST['q2'];
				$soal3 = $_POST['q3'];
				$soal4 = $_POST['q4'];
				$status = 0;
				$insert = "insert into tb_soal values('','$soal1','$soal2','$soal3','$soal4','$status')";
				$query = mysql_query($insert);
				if ($query) {
					echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=kriteria&proses=1'</script>";
				}else{
					echo "<script>alert('Data gagal tersimpan');document.location='../admin/index.php?ap=kriteria&proses=1'</script>";
					
				}
			}
		}?>

<?php
if (isset($_GET['delete'])) {
	if ($_GET['delete']=="") {
		echo "<script>alert('Tidak ada data yang dihapus');document.location='../admin/index.php?ap=kriteria&proses=1'</script>";
	}else{
	include "../koneksi.php";
	$id_delete = $_GET['delete'];
  		$query = "DELETE from tb_soal where id_soal ='$id_delete'";
  		$sql = mysql_query($query);
	if ($sql) {
      	echo"<script>alert('Data dihapus');document.location='../admin/index.php?ap=kriteria&proses=1'</script> ";
      	}else {
      	echo "<script>alert('Data gagal dihapus');document.location='../admin/index.php?ap=kriteria&proses=1' </script> ";
      }
  	}
}
?>

<?php
if (isset($_GET['edit'])) {
	if (!$_GET['edit']) {
		echo "<script>alert('Tidak ada data yang di edit');document.location='../admin/index.php?ap=kriteria&proses=1'</script>";
	}else{
		include '../koneksi.php';
		$id = $_GET['edit'];
		$soal = "select * from tb_soal where id_soal=$id";
		$datasl = mysql_query($soal);
		$rowsl = mysql_fetch_array($datasl);
		//var_dump($rowsl);
		?>
		<style>
			.manage, .ha, .soal{
				display: none;
			}
			.form-control{
				resize: none; 
			}
			.form-group label{
				font-weight: normal;
			}
		</style>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-lg-8 col-lg-offset-2 centered">
							<h4 style="margin-bottom: 3rem ;">Edit Soal</h4>
							<!--<form role="form" action="?ap=kriteria&edits=<?php echo $id;?>" method="post">-->
							<form role="form" action="?ap=kriteria&edits=1" method="post">
								<div class="form-group">
									<input class="form-control" type="text" name="id_soal" value="<?php echo $rowsl[0];?>" readonly="true" >
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Input Soal 1</label>
									<textarea evalue="<?php echo $rowsl[1];?>" name="q1" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="<?php echo $rowsl[1];?>"><?php echo $rowsl[1];?></textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Input Soal 2</label>
									<textarea evalue="<?php echo $rowsl[2];?>" name="q2" class="form-control" id="exampleFormControlTextarea1" placeholder="<?php echo $rowsl[2];?>" rows="3"><?php echo $rowsl[2];?></textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Input Soal 3</label>
									<textarea evalue="<?php echo $rowsl[3];?>" name="q3" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="<?php echo $rowsl[3];?>"><?php echo $rowsl[3];?></textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Input Soal 4</label>
									<textarea evalue="<?php echo $rowsl[4];?>" name="q4" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="<?php echo $rowsl[4];?>"><?php echo $rowsl[4];?></textarea>
								</div>
								<input type="submit" name="submit" value="Simpan" class="btn btn-success">
							</form>
						</div>
					</div> 
				</div>
			</div>
		</div>
		<?php
	}
}
?>

<?php
	if (isset($_GET['edits'])) {
		if ($_GET['edits']==1) {
			echo "<script>alert('Data berhasil diubah');document.location='../admin/index.php?ap=kriteria&proses=1'</script>";;
		//}else{
			?>
		<style>
		.manage, .soal, .ha{
			display: none;}
		</style>
		<!--<div class="row">
			<div class="col-lg-12 panel panel-body">
				<a href="../admin/index.php?ap=kriteria&proses=1">Lanjut</a>
			</div>
		</div>-->
		<?php
			include '../koneksi.php';
			$id = $_POST['id_soal'];
			$soal1 = $_POST['q1'];
			$soal2 = $_POST['q2'];
			$soal3 = $_POST['q3'];
			$soal4 = $_POST['q4'];
			$cek="update tb_soal set q1='$soal1', q2='$soal2', q3='$soal3', q4='$soal4' where id_soal='$id'";
			$sql=mysql_query($cek);

			if ($sql) {
				echo "<script>alert('Data berhasil diubah');document.location=../admin/index.php?ap=kriteria&proses=1'</script>";
			}else{
				echo "<script>alert('Data gagal diubah');document.location=../admin/index.php?ap=kriteria&proses=1'</script>";
			}
		}
	}
?>
<?php
error_reporting(1);
//ini_set('display_errors', 0);
if (isset($_GET['statuse'])) {
	if ($_GET['statuse']==1) {
		include"../koneksi.php";
		echo "<script>alert('Status berhasil diubah');document.location=../admin/index.php?ap=kriteria&proses=1'</script>";
		//echo "<h4><a style='text-decoration:none; color:inherit; cursor:default;' href=?ap=kriteria&proses=1>Data berhasil diubah</a></h4>";
		header('Location:../admin/index.php?ap=kriteria&proses=1');
		?>
		<!-- <style>
		.manage, .soal, .ha{
			display: none;}
		</style> -->
		<?php
		include '../koneksi.php';
		$id = $_POST['id_soal'];
		$cekso = $_POST['status'];
		if ($cekso=="") {
			$cekso=0;
		}else{
			$cekso=1;
		}
		//var_dump($cekso);
		$sql = mysql_query("update tb_soal set status = '$cekso' where id_soal='$id'");
		if (!$sql) {
			echo "<script>alert('Status gagal diubah');document.location=../admin/index.php?ap=kriteria&proses=1'</script>";
		}else{
			echo "<script>alert('Status berhasil diubah');document.location=../admin/index.php?ap=kriteria&proses=1'</script>";
		}
	}else{
		echo "<script>alert('Status berhasil diubah');document.location=../admin/index.php?ap=kriteria&proses=1'</script>";
		echo "Data gagal diubah";
	}
}
?>

<?php
if (isset($_GET['tambah1'])) {
	if ($_GET['tambah1']==1) {
		?>
		<style>
			.manage{
				display: none;
			}
			.ha{
				display: none;
			}
			.form-cotrol{
				resize: none; 
			}
			.form-group label{
				font-weight: normal;
			}
		</style>
		<div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Tambah Kriteria</h3>
              <hr>
              <form role="form" action="?ap=kriteria&prosestambah=1" method="post"><!---->
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="Nama Kriteria" name="nama_kriteria">
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="bobot">
                    <?php
                      if ($tmp_bobot==""){
                        ?> <option value=''>-- Bobot --</option><?php
                      }else{
                        echo "<option value='$tmp_bobot'>$tmp_bobot</option>";
                      }
                    ?>
                    <option value="4">4 (Sangat Baik)</option>
                  <option value="3">3 (Baik)</option>
                  <option value="2">2 (Cukup)</option>
                  <option value="1">1 (Kurang)</option>
                  </select>
                </div>
                <br>
                <input name="submit" type="submit" class="btn btn-success" value="Daftar">
              </form>  
            </div>
          </div>
            </div>
          </div>
        </div>

            <div class="container pt">
    <div class="row mt">
      <div class="col-lg-6 col-lg-offset-3 centered">
              <h3></h3>
              <hr><?php
	}
}
?>

<?php
if (isset($_GET['prosestambah'])) {
	if ($_GET['prosestambah']==1) {
		?>
		<style>
			.manage{
				display: none;
			}
			.ha{
				display: none;
			}
			.form-cotrol{
				resize: none; 
			}
			.form-group label{
				font-weight: normal;
			}
		</style>
		<?php
		include "../koneksi.php";
//if(isset($_POST['submit'])){
//include_once "import/excel_reader2.php";
      $nama_kriteria = $_POST['nama_kriteria'];
      $bobot = $_POST['bobot'];

        $query = "insert into tb_kriteria values ('','$nama_kriteria','$bobot')";
        $sql = mysql_query($query);
      //}
      if ($sql) {
      echo "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=kriteria' </script> ";
      }else {
      echo "jarjit";//"<script>alert('Data gagal disimpan');document.location='../admin/index.php?ap=kriteria' </script> ";
  }

	}
}
?>
<?php
if (isset($_GET['ubahkriteria'])) {
	if (!$_GET['ubahkriteria']) {
		echo "string";
	}else{
		include"../koneksi.php"; 
		$id=$_GET['ubahkriteria'];
		$res=mysql_query("select * from tb_kriteria where id_kriteria = '$id'");
		$row=mysql_fetch_array($res);
		//var_dump($row);
		if ($row===false) {
			mysql_error($row);
		}else{
			//echo "string";
		}
		
		?>
		<style>
			.manage{
				display: none;
			}
			.ha{
				display: none;
			}
			.form-cotrol{
				resize: none; 
			}
			.form-group label{
				font-weight: normal;
			}
		</style>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-lg-8 col-lg-offset-2 centered">
							<h3>Ubah Kriteria</h3>
						<hr>
						<form role="form" action="?ap=kriteria&ubahkriteria=2" method="post">
							<div class="form-group">
								<input type="text" class="form-control" id="NameInputEmail1" placeholder="Kriteria" name="id_kriteria" value="<?php echo $row[0]; ?>" style="display: none">
								<input type="text" class="form-control" id="NameInputEmail1" placeholder="Kriteria" name="nama_kriteria" value="<?php echo $row[1]; ?>" readonly="true">
							</div>
							<div class="form-group">
								<select class="form-control" id="exampleInputEmail1" name="bobot">
									<?php 
									if ($temp_bobot=="") {
										echo "<option value=''>-- Bobot --</option>";
									}else{
										echo "<option value='$temp_bobot'>$temp_bobot</option>";
									}
									?>
									<option value="4">4 (Sangat Baik)</option>
									<option value="3">3 (Baik)</option>
									<option value="2">2 (Cukup)</option>
									<option value="1">1 (Kurang)</option>
								</select>
							</div>
							<br>
                			<input type="submit" class="btn btn-success" value="Ubah" name="simpan">
						</form>
						</div>
					</div> 
				</div>
			</div>
		</div>
		<?php

	}
}

if (isset($_GET['ubahkriteria'])) {
		if ($_GET['ubahkriteria']==2) {
			//echo "<script>alert('Data berhasil diubah');document.location='../admin/index.php?ap=kriteria'</script>";;
		//}else{
			?>
		<style>
		.manage, .soal, .ha{
			display: none;}
		</style>
		<!--<div class="row">
			<div class="col-lg-12 panel panel-body">
				<a href="../admin/index.php?ap=kriteria&proses=1">Lanjut</a>
			</div>
		</div>-->
		<?php
			include '../koneksi.php';
			$id = $_POST['id_kriteria'];
			$nama = $_POST['nama_kriteria'];
			$bobot = $_POST['bobot'];
	
			$sql = mysql_query("update tb_kriteria set nama_kriteria = '$nama', bobot = '$bobot' where id_kriteria = '$id'");
			if ($sql) {
      			echo  "<script>alert('Data berhasil tersimpan');document.location='../admin/index.php?ap=kriteria' </script> ";
      		}else {
      			echo "<script>alert('Data gagal disimpan');document.location='../admin/index.php?ap=kriteria' </script> ";
				}
			}
		}

if (isset($_GET['hapuskriteria'])){
	if (!$_GET['hapuskriteria']) {
		echo "<script>alert('Hapus data gagal')</script>";
	}else{
		include "../koneksi.php";
		  $id_delete = $_GET['hapuskriteria'];
		  $query = "DELETE from tb_kriteria where id_kriteria ='$id_delete'";
		  $sql = mysql_query($query);

		if ($sql) {
		      echo "<script>alert('Data dihapus');document.location='../admin/index.php?ap=kriteria' </script> ";
		      }else {
		      echo "<script>alert('Data gagal dihapus');</script> ";
		  }
		}
	}

?>
