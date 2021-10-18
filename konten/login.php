<?php
	session_start();
	unset($_SESSION['nis']);
?>
<div class="container pt" style="margin:2rem auto;">
		<div class="row" style="padding: 1.5rem auto">
		<form action="konten/login_proses.php" method="POST">
			<div class="col-lg-6 col-lg-offset-3 centered" style="margin-bottom: 5rem">
				<h3>Login</h3>
				<hr>
			</div>
		</div>
		<div class="row">	
			<div class="col-lg-8 col-lg-offset-2">
				<form role="form">
				  <div class="form-group">
				    <input type="name"class="form-control" id="NameInputEmail1" placeholder="Username" name="username">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password">
				  </div>
				  <div class="form-group" style="display: none">
				    <select class="form-control" id="exampleInputEmail1" name="jenis">
				    	<option value=''>-- Login Sebagai --</option>
				    	<option value='siswa'>siswa</option>
						<option value='guru'>guru</option>
				    </select>
				  </div>
				  <a href="http://localhost/spk_sistem_guru/admin/index.php?ap=siswa&view=1">Belum punya akun ? id:admin pass:admin</a>
				    <br>
				  <input style="margin: 1rem auto" type="submit" class="btn btn-success" value="Login">
				</form>
			</div>
			</form>
		</div><!-- /row -->
	</div><!-- /container -->