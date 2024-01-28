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