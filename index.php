<!DOCTYPE html>
<style>
  /*{
    height: 20rem;
  }
</style>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Penilaian Kinerja Guru </title>

    <!-- Bootstrap core CSS -->
    <!--<link href="assets3/css/bootstrap.css" rel="stylesheet" type="text/css" >


    Custom styles for this template
    <link href="assets3/css/main.css" rel="stylesheet" type="text/css">-->

    <link href="assets3/css/main.css" rel="stylesheet" type="text/css">
    <link href="assets3/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/hover.zoom.js"></script>
    <script src="assets/js/hover.zoom.conf.js"></script>
    <?php
    	include "koneksi.php";
    ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-static-top" style="background-color: #68c5da; margin-bottom: auto; border-bottom: none;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Penilaian Kinerja Guru </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <?php
            $sq = mysql_query("select status from tb_pengaturan where pengaturan='pengumuman'");
            $st = mysql_fetch_array($sq);
            if($st['status']=="1"){
              ?><!--<li><a href="?ap=pengumuman">Nilai Rangking</a></li>--><?php
            }
          ?>
            <li><a href="?ap=data_guru">Data Guru</a></li>
            <li><a href="?ap=login">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- +++++ Welcome Section +++++ -->
	<?php
		include "controller.php";
	?>
	
	<!-- +++++ Footer Section +++++ -->
  <style>
    .href a:hover{
      color: #68c5da !important;
    }
  </style>
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
