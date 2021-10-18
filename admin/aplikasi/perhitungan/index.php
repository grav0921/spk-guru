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
				<h3 class="page-header">Perhitungan</h3>
				<form method="post" style="display: none;">
				<input type="text" name="hasile">
				<!-- <input type="submit" name="none"> -->
				<button type="submit" name="klik" class="btn btn-primary">Submit</button>
				<br>
				</form>
				<?php
				$nomotr = 20;
				//echo "$nomor";
				if(!isset($_POST['klik'])){
					echo"";
				}else{
				echo "<p>";
				$nomor =  $_POST['hasile'];
				echo "$nomor";
				echo "<br>";
				if ($nomor>90) {
					echo "A";
				}elseif ($nomor>50) {
					echo "B";
				}elseif ($nomor>30){
					echo "C";
				}elseif ($nomor=="0"){
					echo "De";
				}else{
					echo "D";
				}
				/*if ($nomor>90) {
					echo "A";
				}elseif ($nomor<70) {
					echo "B";
				}elseif ($nomor<40) {
					echo "C";
				}*/}
				?>
			</div>
		</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading">Data Peserta</div>
					<div class="panel-body">
						<table class="table">
						    <thead>
						    <tr>
						    	 <th>No</th>
								<th>Nip</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Pendidikan</th>
								<th>Jabatan</th>
								<th>C1</th>
								<th>C2</th>
								<th>C3</th>
								<th>C4</th>
								<?php
								for($i=1;$i<=0;$i++)
									echo "<th>C$i</th>";
								?>
								
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
								<td><?php echo $data['c1']; ?></td>
								<td><?php echo $data['c2']; ?></td>
								<td><?php echo $data['c3']; ?></td>
								<td><?php echo $data['c4']; ?></td>
								

							</tr>
							<?php 
						}
							 ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer"><center><a href="?ap=hitung&proses=1" class= "btn btn-primary">Hitung</a></center></div>
				</div>
			</div>
</div>

<?php
	if (isset($_GET['proses'])){
		if ($_GET['proses'] == 1){
			?>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading">Perbaikan Bobot</div>
					<div class="panel-body">
						<table class="table">
							<thead>
						    <tr>
						    	<th>Bobot</th>
						<?php
						    include "../koneksi.php";
							$query = "select * from tb_kriteria";
							$hasil = mysql_query($query) or die("");
							while ($data = mysql_fetch_array($hasil)) {

							?>
						    
								<th><?php echo "$data[nama_kriteria]";?></th>
						    
						    <?php
							}
							?>
							</tr>
						    </thead>
						    <tbody>
						    <tr>
						    	<td>Bobot Awal</td>
						    	<?php
						    	$qr = "select * from tb_kriteria";
							$b = mysql_query($qr) or die("");
							while ($r = mysql_fetch_array($b)) {

							?>
						    
								<td align=""><?php echo "$r[bobot]";?></td>
						    
						    <?php
							}
							?>
							</tr>

							<tr>
						    	<td>Bobot Baru</td>
						    	<?php
						    	$arBB = array();
						    	$i=0;
						    	$sumB = mysql_query("SELECT SUM(bobot) AS sum FROM tb_kriteria");
						    	$quB = mysql_fetch_array($sumB);
    							$jml_bobot = $quB['sum'];
						    	$qr = "select * from tb_kriteria";
							$b = mysql_query($qr) or die("");
							while ($r = mysql_fetch_array($b)) {
								$bb = $r['bobot']/$jml_bobot;
								$arBB[$i]=$bb;
							?>
						    	
								<td align=""><?php echo round($bb,4);?></td>
						    
						    <?php
						    $i++;
							}
							?>
							</tr>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
</div>

<?php
	$ps = mysql_query("select * from guru_peserta");
	while ($rps=mysql_fetch_array($ps)){
		$vkt_s = 1;
		for($c=1;$c<=4;$c++){
			$tb = "c" . $c;
			$ab = $c-1;
			$pgkt = pow($rps[$tb], $arBB[$ab]);
			//echo $rps[$tb] . " dipangkat " . $arBB[$ab] . " = " . $pgkt . "<br>";
			$vkt_s = $vkt_s * $pgkt;
			$dobvkt = round($vkt_s);
		}
		$upd = mysql_query("update guru_peserta set vektor_s = '$vkt_s' where nip = '$rps[nip]'");
	}
	
	$v = mysql_query("select sum(vektor_s) as all_vk from guru_peserta");
	$vk = mysql_fetch_array($v);
	$all_vk = $vk['all_vk'];
	
	$ps = mysql_query("select nip,vektor_v, vektor_s from guru_peserta");
	while ($rps=mysql_fetch_array($ps)){
		$vk_v = $rps['vektor_s']/$all_vk;
		//$vk_v *= 10;
		$up_v = mysql_query("update guru_peserta set vektor_v = '$vk_v' where nip='$rps[nip]'");
		// if ($rps['vektor_s']>81) {
		// 	mysql_query("update guru_peserta set total = 'Sangat Baik' where vektor_s='$rps[vektor_s]'");
		// }elseif ($rps['vektor_s']>61) {
		// 	mysql_query("update guru_peserta set total = 'Baik' where vektor_s='$rps[vektor_s]'");
		// }elseif ($rps['vektor_s']>41){
		// 	mysql_query("update guru_peserta set total = 'Cukup' where vektor_s='$rps[vektor_s]'");
		// }elseif ($rps['vektor_s']>21){
		// 	mysql_query("update guru_peserta set total = 'Kurang' where vektor_s='$rps[vektor_s]'");
		// }else{
		// 	mysql_query("update guru_peserta set total = 'Sangat Kurang' where vektor_s='$rps[vektor_s]'");
		// }
		if ($rps['vektor_v']>0.4) {
			mysql_query("update guru_peserta set total = 'Sangat Baik' where vektor_v='$rps[vektor_v]'");
		}elseif($rps['vektor_v']>0.3){
			mysql_query("update guru_peserta set total = 'Baik' where vektor_v='$rps[vektor_v]'");
		}elseif ($rps['vektor_v']>0.2) {
			mysql_query("update guru_peserta set total = 'Cukup' where vektor_v='$rps[vektor_v]'");
		}elseif ($rps['vektor_v']>0){
			mysql_query("update guru_peserta set total = 'Kurang' where vektor_v='$rps[vektor_v]'");
		}else{
			mysql_query("update guru_peserta set total = 'Sangat Kurang' where vektor_v='$rps[vektor_v]'");
		}
	}

?>
<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading">Hasil Seleksi</div>
					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>Ranking</th>
									<th>Nama</th>
									<th>Vektor_S</th>
									<th>Vektor_V</th>
									<th>Total</th>
								</tr>
						    </thead>
						    <tbody>
						    	<?php
						    		$rk = 1;
						    		$pr = mysql_query("select nama, vektor_s, vektor_v, total from guru_peserta order by vektor_v desc");
						    		while ($dt=mysql_fetch_array($pr)){
						    			echo "<tr>";
						    			echo "<td>$rk</td>";
						    			echo "<td>$dt[nama]</td>";
						    			echo "<td>" . round($dt['vektor_s'], 4) . "</td>";
						    			echo "<td>" . round($dt['vektor_v'], 4) . "</td>";
						    			echo "<td>" . $dt['total'] . "</td>";
						    			echo "</tr>";
						    			$rk++;
						    		}
						    	?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
</div>
			<?php
			// for($a=0;$a<10;$a++){
			// 	echo round($arBB[$a],4) . "<br>";
			// }
		}else{
			echo "adasda";
		}
	}
?>