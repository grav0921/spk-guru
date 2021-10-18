<style>
	.form-control:focus {
  border-color: #68c5da ;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
}
</style>

<style>
	.form-control{
		width: 21rem;
	}
</style>
<div class="row">
			<div class="col-lg-12">
				<!-- <center> -->
				<h3 class="page-header">Data Periode</h3>
			</div>
		</div><!--/.row-->
<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading" style="display: flex; justify-content: space-between;">Hasil Seleksi
					<form method="post" action="?ap=periode&tahun=1" style="display: flex; align-items: center; gap:1rem;">
						<select id="cari" class="form-control" style="display: inline-block;" name="hasil">
							<?php
					if ($cari=="") {
						echo "<option value=''>Pencarian Tahun Awal</option>";
					}else{
						echo "<option value='$cari'>$cari</option>";
					}
					?>
							<option value="show">Show All</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
						</select>
						<select id="cari" class="form-control" style="display: inline-block;" name="hasil2">
							<?php
					if ($cari=="") {
						echo "<option value=''>Pencarian Tahun Akhir</option>";
					}else{
						echo "<option value='$cari'>$cari</option>";
					}
					?>
							<option value="show">Show All</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
						</select>
						<input type="submit" class="btn btn-primary" style="margin: 0 15px;" name="cari" value="Cari"></input>

					</form>					
				</div>
				<?php 
				if (isset($_GET['tahun'])) {
					if ($_GET['tahun']==1) {?>
					<div class="panel-body">
						<div class="table1">
						<table class="table" >
							<thead>
								<tr>
									<th>Ranking</th>
									<th>Nama</th>
									<th>Vektor_S</th>
									<th>Total</th>
									<th>Tanggal</th>
						<?php
					$hasil =mysql_real_escape_string($_POST['hasil']);
					$hasil2 = mysql_real_escape_string($_POST['hasil2']);
					$hasilcari = "SELECT * FROM guru_peserta WHERE tanggal BETWEEN '".$hasil."' AND '".$hasil2."' ORDER BY vektor_s DESC";
                    	if (!$_POST['hasil'] || !$_POST['hasil2']) {
              				echo "<div class='panel-heading' style='text-align:center; '>Hasil Pencarian Tidak Ada</div>";
              				?>
							<style>
								.table2{
									display: none;
								}
							</style>
							<?php
                    	}elseif($_POST['hasil'] > $_POST['hasil2']){
                    		echo "<div class='panel-heading' style='text-align:center; '>Salah Input</div>";
                    		?>
							<style>
								.table2{
									display: none;
									background: black;
								}
							</style>
							<?php
                    	}elseif($_POST['hasil']=="show" && $_POST['hasil2']=="show"){
                    		echo "<div class='panel-heading' style='text-align:center; '>AWODoasdj</div>";
                    		?>

                    		<style>
                    			.table1{
                    				display: none;
                    			}
                    		</style>
							<?php
						}else{
							?>
							<style>
								.table2{
									display: none;
									background: black;
								}
							</style>
							<?php
                    		$nrk = 1;
                    		$result=mysql_query($hasilcari);
              				echo "<div class='panel-heading' style='text-align:center; '>Hasil Pencarian Tahun " .$_POST['hasil']. " - " .$_POST['hasil2']. "</div>";
              				while ($hs=mysql_fetch_array($result)){

						    			echo "<tr>";
						    			echo "<td>$nrk</td>";
						    			echo "<td>".$hs['nama']."</td>";
						    			echo "<td>".round($hs['vektor_s'],4)."</td>";
						    			echo "<td>".$hs['total']."</td>";
						    			echo "<td>".$hs['tanggal']."</td>";
						    			echo "</tr>";
						    			$nrk++;
						    		}
                    	}echo"</tr>
						    </thead>
						    </table>
                    	<div class='panel-footer'><center><a href='cetak2.php' class= 'btn btn-primary'>CETAK</a></center></div>";
					 }
					
                    }
				?>
			</div>
				<!--<form role="form" action="?ap=periode&cari=1" method="get">
					<div class="from-group">
					<select class="form-control">
						<?php
					if ($cari=="") {
						echo "<option value=''>Pencarian</option>";
					}else{
						echo "<option value='$cari'>$cari</option>";
					}
					?>
					<option value='2020'>2020 </option>
                    <option value='2021'>2021 </option>
                    <option value='2022'>2022 </option>
                    <option value='2023'>2023 </option>
                    <option value='2024'>2024 </option>
                    </select></div>
                    <br>
                <input name="submit" type="submit" class="btn btn-success" value="Cari">
                    </form>-->
                    <div class="table2">
						<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>Ranking</th>
									<th>Nama</th>
									<th>Vektor_S</th>
									<th>Total</th>
									<th>Tanggal</th>
								</tr>
						    </thead>
						    <tbody>
				
						    	<?php
						    	include "../koneksi.php";
						    		$rk = 1;
						    		$pr = mysql_query("select nama, vektor_S, total, tanggal from guru_peserta order by vektor_s desc");
						    		while ($dt=mysql_fetch_array($pr)){
						    			echo "<tr>";
						    			echo "<td>$rk</td>";
						    			echo "<td>".$dt['nama']."</td>";
						    			echo "<td>" . round($dt['vektor_S'], 4) . "</td>";
						    			echo "<td>" . $dt['total']."</td>";
						    			echo "<td>" . $dt['tanggal'] . "</td>";
						    			echo "</tr>";
						    			$rk++;
						    		}
						    	?>	
							</tbody>
						</table>
					<!-- <div class="panel-footer"><center><a href="cetak2.php" class= "btn btn-primary">CETAK</a></center></div> -->
					<br>
					<!-- <br> -->
				</div>
			</div>
</div>
</div>

