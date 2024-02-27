<?php
	
	require_once("conbase.php");
	$query=mysqli_query($con, "SELECT * FROM tbladmin where Id = '".$_COOKIE['abgrcs_admin_login']."'");
	
	if( $query->num_rows > 0 )
	{
		$enseignant_array = mysqli_fetch_array($query);
	}
	else
	{
		include("login.php");
		exit();
	}
	
?>

<nav class="navbar navbar-expand-lg navbar-$_light bg-$_COOKIE fixed-top">
      <div class="container">
        
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >

        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNav"
		
        >
          <ul class="navbar-nav">
            <li class="nav-item">
			
              <a class="nav-link active" aria-current="page" href="#">
				<i class="fas fa-home"></i>Home </a>
            </li>
            <li class="nav-item">

              <a  href="index.php?emplois=0" class="nav-link active"><i class="fas fa-calendar-alt"></i>Emploi</a>
            </li>
            <li class="nav-item">
			
              <a  href="index.php?salles=0" class="nav-link active"><i class="fas fa-map"></i>plan d'ouccupation</a>
            </li>
			<li class="nav-item">
              <a  href="index.php?navbar=0" class="nav-link active"><i class="fas fa-clock"> </i>crénau</a>

            </li>
          </ul>
        </div>
      </div>
    </nav>
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>Gestion Emploi de temps | Dashboard</title>
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
			  <!-- Ionicons 
			  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
			  <!-- Tempusdominus Bbootstrap 4 -->
			  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
			  <!-- iCheck -->
			  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
			  <!-- JQVMap -->
			  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
			  <!-- Theme style -->
			  <link rel="stylesheet" href="dist/css/adminlte.min.css">
			  <!-- overlayScrollbars -->
			  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
			  <!-- Daterange picker -->
			  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
			  <!-- summernote -->
			  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
			  <!-- Google Font: Source Sans Pro 
			  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
			</head>
			<body class="hold-transition sidebar-mini layout-fixed">
			<div class="wrapper">
		<?php
		
		$pages_support = array('enseignants', 'enseignants_add', 'departements', 'departements_add', 'filieres', 'filieres_add', 'specialites', 'specialites_add', 'modules', 'modules_add', 'cycles', 'cycles_add', 'groupes', 'groupes_add', 'salles', 'salles_add', 'users', 'users_add', 'profile', 'emplois', 'emplois_add', 'options' ,'navbar');
		
		include('header.php');
		include('sidebar.php');
		
		$load_page = 'home.php';
		
		foreach($pages_support as $single_page)
		{
			if($_GET[$single_page] != '')
			{
				$check_page = ''.$single_page.'.php';
				
				if(file_exists($check_page))
				{
					$load_page = $check_page;
					break;
				}
			}
		}
		
		include($load_page);
		
		?>
			<footer class="main-footer">
				<strong>Copyright &copy; 2022 <a href="index.php">Gestion Emploi de temps.</a></strong>
				Tous les droits sont réservés.
				<div class="float-right d-none d-sm-inline-block">
				  <b>Version</b> 1.0
				</div>
			</footer>

			  <!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			  <!-- /.control-sidebar -->
			</div>
			<!-- ./wrapper -->

			<!-- jQuery -->
			<script src="plugins/jquery/jquery.min.js"></script>
			<!-- jQuery UI 1.11.4 -->
			<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
			<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
			<script>
			  $.widget.bridge('uibutton', $.ui.button)
			</script>
			<!-- Bootstrap 4 -->
			<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
			<!-- ChartJS -->
			<script src="plugins/chart.js/Chart.min.js"></script>
			<!-- Sparkline -->
			<script src="plugins/sparklines/sparkline.js"></script>
			<!-- JQVMap -->
			<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
			<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
			<!-- jQuery Knob Chart -->
			<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
			<!-- daterangepicker -->
			<script src="plugins/moment/moment.min.js"></script>
			<script src="plugins/daterangepicker/daterangepicker.js"></script>
			<!-- Tempusdominus Bootstrap 4 -->
			<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
			<!-- Summernote -->
			<script src="plugins/summernote/summernote-bs4.min.js"></script>
			<!-- overlayScrollbars -->
			<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
			<!-- AdminLTE App -->
			<script src="dist/js/adminlte.js"></script>
			<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
			<script src="dist/js/pages/dashboard.js"></script>
			<!-- AdminLTE for demo purposes -->
			<script src="dist/js/demo.js"></script>
				<script language="javascript">
					
				</script>



				
			</body>
			</html>