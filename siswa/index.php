<?php
	session_start();

	if(!isset($_SESSION['nis'])){
		echo "<script>alert('Anda belum login');document.location='../index.php' </script> ";
	}else{
    

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../../docs-assets/ico/favicon.png">

    <title>PENILAIAN KINERJA GURU </title>

    <!-- Bootstrap core CSS -->
    <link href="../assets3/css/bootstrap.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template -->
    <link href="../assets3/css/main.css" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/hover.zoom.js"></script>
    <script src="../assets/js/hover.zoom.conf.js"></script>
    <?php
    	include "../koneksi.php";
      $nis = $_SESSION['nis'];
      $qry = mysql_query("select * from user where username='$nis' and jenis='siswa'");
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
    <div class="navbar navbar-inverse navbar-static-top"style="background-color: #68c5da; border-color: white">
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
      $sq = mysql_query("select status from tb_pengaturan where pengaturan='penilaian'");
      $st = mysql_fetch_array($sq);
      if($st['status']=="0"){
        ?>
        <div class="container pt">
          <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Sistem Penilaian Belum Dibuka</h3>
            </div>
          </div>
        </div>
    <?php
      }else{
    ?>
    <div class="container pt">
		<div class="row pt" style="">
		<form action=nilai.php  method="POST" role="form">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>Pilih Guru</h3>
				<hr>
			</div>
		</div>
		<div class="row mt">	
			<div class="col-lg-8 col-lg-offset-2">
				<form role="form">
				  <div class="form-group">
				    <select class="form-control" id="exampleInputEmail1" name="guru">
				<option value = "0">pilih guru</option>
				<?php
                    $sql = "select * from guru_peserta where jabatan = 'guru'";
                    $query = mysql_query($sql);
                    while($row = mysql_fetch_array($query)){
                      $cek = mysql_query("select * from nilai_siswa where nis='$nis' and id_guru='$row[id_guru]'");
                      //$rows = mysql_fetch_array($cek);
                      $num = mysql_num_rows($cek);
                      // if ($num > 0 ){
                      //   echo "<option value = '$row[id_guru]'>$row[nama] (valued)</option>";
                      if ($row['c1'] == 0 || $row['c2'] == 0 || $row['c3'] == 0 || $row['c4'] == 0){
                        echo "<option value = '$row[id_guru]'>$row[nama]</option>";
                      }else{
                        echo "<option value = '$row[id_guru]'>$row[nama] (valued)</option>";
                      }
                    }
                    
                ?>
        		</select>
				  </div>
				    <br>
				  <input type="submit" class="btn btn-success" value="Pilih">
				</form>    			
			</div>
			</form>
		</div><!-- /row -->
	</div><!-- /container -->

<?php
  }
}
?>
	
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
            <!-- Copyright &copy rawatech
            <br>
            <a style="text-decoration: none; color: white;" href="https://github.com/rawatech">https://github.com/rawatech</a>
            <br>
            <a style="text-decoration: none; color: white;" href="https://www.youtube.com/channel/UCDv0yYj4q7RET_2gRq6aCsQ">Dokumentasi : www.youtube.com/channel/UCDv0yYj4q7RET_2gRq6aCsQ</a> -->
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
