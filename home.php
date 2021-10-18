<div id="ww">
	    <div class="container pt" style="margin: 5rem auto;">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 centered">
					<img src="assets3/img/img1.png" style="width: 20%; height: auto;">
					<h1>SELAMAT DATANG DI WEB PENILAIAN KINERJA GURU SMP FTW</h1>
					<?php
            			$sq = mysql_query("select status from tb_pengaturan where pengaturan='pengumuman'");
            			$st = mysql_fetch_array($sq);
            			if($st['status']=="1"){
              				?><hr><h3><a href="?ap=pengumuman">Nilai Rangking</a></h3><hr><?php
            			}
          			?>
					

				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->