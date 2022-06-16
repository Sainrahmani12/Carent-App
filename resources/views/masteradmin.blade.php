<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard - Admin</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../admin/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../admin/js/plugin/webfont/webfont.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:wght@300&family=Secular+One&display=swap" rel="stylesheet">
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../admin/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="../admin/css/atlantis.min.css">


	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../admin/css/demo.css">
</head>

<body>

	@include('navbaradmin')
	@include('sidebar')
	@yield('content'))
	@include('sweetalert::alert')


	<!--   Core JS Files   -->
	<script src="../admin/js/core/jquery.3.2.1.min.js"></script>
	<script src="../admin/js/core/popper.min.js"></script>
	<script src="../admin/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../admin/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../admin/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../admin/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../admin/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../admin/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../admin/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../admin/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	

</body>

</html>