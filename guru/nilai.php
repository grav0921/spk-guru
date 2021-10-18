<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../../docs-assets/ico/favicon.png">

    <title>PENILAIAN KINERJA GURU</title>

    <!-- Bootstrap core CSS 
    <link href="../assets/css/bootstrap.css" rel="stylesheet">-->


    <!-- Custom styles for this template 
    <link href="../assets/css/main.css" rel="stylesheet">-->

    <link href="../assets3/css/main.css" rel="stylesheet" type="text/css">
    <link href="../assets3/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/hover.zoom.js"></script>
    <script src="../assets/js/hover.zoom.conf.js"></script>
    <?php
    	session_start();
    	include "../koneksi.php";
    	$nip = $_SESSION['nip'];
      	$qry = mysql_query("select * from user where username='$nip' and jenis='guru'");
      	$us = mysql_fetch_array($qry);
    ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top" style="background-color: #68c5da; border: none;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">PENILAIAN KINERJA GURU</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" style="display: flex; align-items: center; color: white;">
            <li><span style="margin: 2rem"><?php echo "-- " . $us['nama'] . " ($us[jenis]) -- ";?></span></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <?php
    if($_POST['siswa']=="0"){
    		echo "<script>alert('Guru belum dipilih');document.location='index.php' </script> ";
    }else{
    	$siswa = $_POST['siswa'];
    	$siswa = $_POST['siswa'];

		$sql = mysql_query("select * from guru_peserta where id_guru = '$guru'");
		$row = mysql_fetch_array($sql);

	?>

    <div class="container pt">
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3><?php echo $row['nama'];?> </h3>
				<hr>
			</div>
		</div>
		<div class="row mt">	
			<div class="col-lg-8 col-lg-offset-2">
				<form action="input_nilai.php" method="post">
	<?php
		echo "<input type='hidden' value= '$guru' name='id_guru'>";
		$cek = mysql_query("select * from nilai_guru where nip='$nip' and id_guru='$guru'");
		$num = mysql_num_rows($cek);
		$q1 = 0;
		$q2 = 0;
		$q3 = 0;
		$q4 = 0;
		
		if ($num > 0 ){
			$row = mysql_fetch_array($cek);
			$q1 = $row['q1'];
			$q2 = $row['q2'];
			$q3 = $row['q3'];
			$q4 = $row['q4'];
		
		}
	?>
	
	<br>Mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta didik dengan kelainan fisik dan kemampuan belajar yang berbeda<br>
	 <input type="text" class="form-control round-form" name="q1" required="">

	<br>Membantu mengembangkan potensi dan mengatasi kekurangan peserta didik<br>
  	<input type="text" class="form-control round-form" name="q2" required="">

	<br>Menyampaikan informasi tentang kemajuan, kesulitan, dan potensi peserta didik kepada orang tuanya, baik dalam pertemuan formal maupun tidak formal antara guru dan teman sejawat<br>
  	<input type="text" class="form-control round-form" name="q3" required="">

	<br>Ikut berperan aktif dalam kegiatan di luar pembelajaran yang diselenggarakan oleh sekolah dan masyarkat<br>
	<input type="text" class="form-control round-form" name="q4" required="">

	<br><input type="submit" name="enter" value="Enter" class="btn btn-success">  
</form>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
	
	<!-- +++++ Footer Section +++++ -->
	
		<div id="footer">
    <div class="container href" style="padding: 5rem 0 ;">
      <div class="row">
        <div class="col-lg-6">
          <h4>SMP FTW </h4>
          <p>
            Jl. Raya Hesoyam, Baguvix, Kec. Aezakmi, <br/>
            Kabupaten Groove Street, Las Venturas 61264, <br/>
          </p>
          <p>
            Copyright &copy rawatech
            <br>
            <a style="text-decoration: none; color: white;" href="https://github.com/rawatech">https://github.com/rawatech</a>
            <br>
            <a style="text-decoration: none; color: white;" href="https://www.youtube.com/channel/UCDv0yYj4q7RET_2gRq6aCsQ">Dokumentasi : www.youtube.com/channel/UCDv0yYj4q7RET_2gRq6aCsQ</a>
          </p>
        </div><!-- /col-lg-4 -->
      </div>
    
    </div>
  </div>
  
	
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>