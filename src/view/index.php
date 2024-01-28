<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OMRCh</title>
	<link rel="stylesheet" href="resources/main.css">
</head>

<body class="font-sans bg-gray-100 flex flex-col min-h-screen">

	<?php
		include('components/nav.php')
	?>

	<header class="bg-gray-800 text-white text-center py-20">
		<div class="container mx-auto">
			<h1 class="text-4xl font-bold mb-4">Desafiando Mentes, Transformando Futuros</h1>
			<p class="text-lg">¡Bienvenido a la Olimpiada de Matemáticas de la Ribera de Chapala!</p>
		</div>
	</header>

	<section class="container mx-auto my-8">
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
			<a href="training.html" class="bg-white p-6 shadow-md rounded-md block">
				<h2 class="text-xl font-bold mb-4">Entrenamientos</h2>
				<p>Aqui encontraras informacion sobre entrenamientos y entrenadores que pueden ayudarte a mejorar.</p>
			</a>
			<a href="registration.html" class="bg-white p-6 shadow-md rounded-md block">
				<h2 class="text-xl font-bold mb-4">Cómo Participar</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
			</a>
			<a href="trainingMaterial.html" class="bg-white p-6 shadow-md rounded-md block">
				<h2 class="text-xl font-bold mb-4">Material de Entrenamientos</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
			</a>
		</div>
		<hr>
	</section>
	<footer class="bg-gray-900 text-white py-4 fixed bottom-0 w-full">
		<div class="container mx-auto text-center">
			<p>&copy; 2024 Olimpiada de Matemáticas - Ribera de Chapala. Todos los derechos reservados.</p>
		</div>
	</footer>


	<script src="resources/js/nav_btn.js"></script>

</body>

</html>