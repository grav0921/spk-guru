<div id="ww">
	    <div class="container pt">
			<div class="row mt">
				<div class="col-lg-6 col-lg-offset-3 centered">
					<h4>Data Guru</h4>
					<hr>
					<p>Berikut adalah data guru.</p>
				</div>

				<div class="row mt">	
					<div class="col-lg-8 col-lg-offset-2">
						<table class="table" border='1'>
							<tr>
								<th>No. </th>
								<th>Nip </th>
								<th>Nama </th>
								<th>Jabatan </th>
							</tr>

							<?php
								$sql = mysql_query("select * from guru_peserta");
								$i = 1;
								while ($row = mysql_fetch_array($sql)){
									echo "<tr>
											<td> $i </td>
											<td> $row[nip] </td>
											<td> $row[nama] </td>
											<td> $row[jabatan]</td>
											</tr>";
									$i++;
								}
							?>
						</table>
					</div>
				</div>	
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->