<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OMRCH - Olimpiada Matematica de la Rivera de Chapala</title>
	<link rel="stylesheet" href="../view/resources/main.css">
    <link rel="shortcut icon" href="resources/imgs/icono.ico" type="image/x-icon">
</head>

<body class="font-sans bg-white flex flex-col min-h-screen">

	<?php
    $section = isset($_GET['section']) ? $_GET['section'] : '';
    include('components/nav.php');
	?>



    <?php
    $exception = [];
    if ( !(in_array($section, $exception))) { // verificamos la bandera
        include('components/footer.php');
    }
	?>
	<!-- <script src="resources/js/nav_btn.js"></script> -->
    <script src="resources/js/jquery-3.3.1.min.js"></script>
</body>

</html>