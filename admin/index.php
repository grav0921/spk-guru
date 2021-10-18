<?php
session_start();
if(!isset($_SESSION['admin'])){
	header("Location: login.php");
}else{
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PENILAIAN KINERJA GURU SMP FTW</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<style>
	.form-control:focus {
  border-color: #68c5da ;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
}
	.panel-blue .widget-left{
		background: #68c5da !important;
	}
	.btn-primary{
		background: #68c5da !important;	
		border-color:  #68c5da !important;
	}
	.sidebar ul.nav .active a, .sidebar ul.nav li.parent a.active, .sidebar ul.nav .active > a:hover, .sidebar ul.nav li.parent a.active:hover, .sidebar ul.nav .active > a:focus, .sidebar ul.nav li.parent a.active:focus {
    color:  white !important;
    background-color:  #68c5da !important;
}
.sidebar{
	background-color: #2f2f2f;
}
a, a:hover, a:focus {
    color: white !important;
}
.sidebar a:hover{

     background-color:  white !important;
	color:  #68c5da !important;
}
</style>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span></span>Penilaian Kinerja Guru </a>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
				<center><img src="../assets3/img/img1.png" width="100px" height="100px"></center>
		</form>
		<ul class="nav menu">
			<li <?php if (!isset($_GET['ap'])) echo "class='active'";?> ><a href="./"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Beranda</a></li>

			<li <?php if (isset($_GET['ap']) && $_GET['ap']=="peserta") echo "class='active'";?>><a href="?ap=peserta"><svg class="glyph stroked calendar"><use xlink:href="#stroked-male-user"></use></svg> Data Guru</a></li>

			<li <?php if (isset($_GET['ap']) && $_GET['ap']=="siswa") echo "class='active'";?>><a href="?ap=siswa"><svg class="glyph stroked calendar"><use xlink:href="#stroked-male-user"></use></svg> Data Siswa</a></li>

			<li <?php if (isset($_GET['ap']) && $_GET['ap']=="kriteria") echo "class='active'";?>><a href="?ap=kriteria"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-notepad"></use></svg> Data Kriteria</a></li>

			<li <?php if (isset($_GET['ap']) && $_GET['ap']=="hmp_kriteria") echo "class='active'";?>><a href="?ap=hmp_kriteria"><svg class="glyph stroked table"><use xlink:href="#stroked-open-folder"></use></svg> Himpunan Kriteria</a></li>

			<li <?php if (isset($_GET['ap']) && $_GET['ap']=="hitung") echo "class='active'";?>><a href="?ap=hitung"><svg class="glyph stroked pencil"><use xlink:href="#stroked-calendar"></use></svg> Perhitungan</a></li>

			<li <?php if (isset($_GET['ap']) && $_GET['ap']=="periode") echo "class='active'";?>><a href="?ap=periode"><svg class="glyph stroked calculator"><use xlink:href="#stroked-calendar"></use></svg> Periode</a></li>

			<!-- <li <?php if (isset($_GET['ap']) && $_GET['ap']=="laporan") echo "class='active'";?>><a href="?ap=laporan"><svg class="glyph stroked app-window"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Laporan</a></li> -->

			<li <?php if (isset($_GET['ap']) && $_GET['ap']=="pengaturan") echo "class='active'";?>><a href="?ap=pengaturan"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Pengaturan</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-lock"></use></svg> Sign Out</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<?php 
			include "../koneksi.php";
			include "controller.php"; 
		?>

	</div>
</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
<?php
}
?>