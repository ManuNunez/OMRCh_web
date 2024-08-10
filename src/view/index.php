<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OMRCh</title>
	<link rel="stylesheet" href="../view/resources/main.css">
</head>

<body class="font-sans bg-white flex flex-col min-h-screen">

	<?php
        $exception = ['section=sign-up']; // array de excepciones
        $location = $_SERVER['QUERY_STRING']; //Obtengo el string de consulta de peticion de la pagina.
        $flag = false; // Bandera para saber si el usuario esta en la pagina donde quiero la excepcion del nav y footer
        foreach ($exception as $exc){
            if($exc == $location){ // si existe entonces rompemos y 'flag' = true
                $flag = true;
                break;
            }
        }
        if(!($flag)) // verificamos la bandera
		include('components/nav.php');

	?>


	<?php
        if(!($flag)) // verficamos la bandera
		include('components/footer.php');
	?>
	<!-- <script src="resources/js/nav_btn.js"></script> -->
    <script src="resources/js/jquery-3.3.1.min.js"></script>
</body>

</html>