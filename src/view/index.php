<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OMRCh</title>
  <link rel="stylesheet" href="resources/main.css">
</head>
<body class="font-sans bg-gray-100 flex flex-col min-h-screen">


    <nav class="bg-blue-500 p-4">
      <div class="container mx-auto flex justify-between items-center">
        <a href="index.html" class="text-white text-2xl font-bold">Olimpiada de Matemáticas</a>
        
        <div class="flex space-x-4">
          <a href="training.html" class="text-white hidden md:inline">Entrenamientos</a>
          <a href="registration.html" class="text-white hidden md:inline">Cómo Participar</a>
          <a href="pagina3.html" class="text-white hidden md:inline">Contacto</a>
          
          <div class="md:hidden">
            <button id="menuBtn" class="text-white">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
      
      <div id="menu" class="md:hidden hidden transition-all duration-300 ease-in-out">
        <a href="training.html" class="block p-2 text-white">Entrenamientos</a>
        <a href="registration.html" class="block p-2 text-white">Cómo Participar</a>
        <a href="pagina3.html" class="block p-2 text-white">Contacto</a>
      </div>
    </nav>

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
