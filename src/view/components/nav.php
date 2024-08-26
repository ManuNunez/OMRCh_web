<?php
session_start(); // ALEXIS NO LO BORRES;

if (!isset($_SESSION['user']) && ($_GET['section'] != 'login' && $_GET['section'] != 'registration' && $_GET['section'] != 'trainingMaterial')) {
    header('Location: ?section=login');
    exit();
}
?>
<!-- nav.php -->
<!-- <nav class="bg-blue-500 p-4">
  <div class="container mx-auto flex justify-between items-center">
    <a href="index.php" class="text-white text-2xl font-bold">Olimpiada de Matemáticas</a>
    
    <div class="flex space-x-4">
      <a href="?section=training" class="text-white hidden md:inline">Entrenamientos</a>
      <a href="?section=registration" class="text-white hidden md:inline">Cómo Participar</a>
      <a href="?section=login" class="text-white hidden md:inline">Inicio de Sesion</a>
      
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
    <a href="?section=training" class="block p-2 text-white">Entrenamientos</a>
    <a href="?section=registration" class="block p-2 text-white">Cómo Participar</a>
    <a href="?section=trainingMaterial" class="block p-2 text-white">Material de Entrenamiento</a>
    <a href="?section=login" class="block p-2 text-white">Inicio de Sesion</a>
  </div>
</nav> -->



<!-- NUEVO NAV -->

<head>
    <link href="resources/main.css" rel="stylesheet">
    <meta charset="UTF-8">
    <script src="resources/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="resources/js/NavToggle.js"></script> -->
</head>

<?php
    $section = isset($_GET['section']) ? $_GET['section'] : '';
    $exception = ['sign-up'];
    $flag = false;
    if ( in_array($section, $exception)) { // verificamos la bandera
        $flag =true;
    }
    if(!($flag)):

?>

<header class="bg-white ">

    <!--
             Desktop and mobile View
             left part, logo
    -->
    <nav class=" flex justify-between px-2 sm:mt-5" aria-label="Global">
        <div class="w-36 lg:mx-auto lg:my-auto  ">
            <a href="?section=index" class="">
                <span class="sr-only">OMRCH</span>
                <img class="w-full" src="resources/imgs/LogoOMRCHVector.svg">
            </a>
        </div>

    <!--
             Desktop View
             middle part, navegation selects
    -->

        <div class="hidden  lg:flex lg:gap-x-1  m-auto w-full mx-7    lg:text-xl ">
            <?php
                // This part is used when the user is logout

                if(!(isset($_SESSION['user']))) {
                    //  echo '<a href="?section=training"         class="  my-4   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl  '; if($section == "training") echo "text-blue-500 font-bold hover:text-blue-500 "; else echo " text-gray-600"; echo ' ">Entrenamientos</a>';

                    //Como participar   Desktop View
                    echo '<a href="?section=registration"     class="  my-4   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl  ';
                    if ($section == "registration") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600";
                    echo '">Como participar</a>';

                    // Material de entrenamiento  Desktop View
                    echo '<a href="?section=trainingMaterial" class="  my-4   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl ';
                    if ($section == "trainingMaterial") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600";
                    echo '">Material de Entrenamiento</a>';

                }
                // This part is used when the user is log-in
                else{
                    // ReGgistration example
                    echo '<a href="?section=registration"     class="  my-4   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl  ';
                    if ($section == "registration") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600";
                    echo '">Como participar</a>';

                    // Material de entrenamiento  Desktop View
                    echo '<a href="?section=trainingMaterial" class="  my-4   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl ';
                    if ($section == "trainingMaterial") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600";
                    echo '">Material de Entrenamiento</a>';

                    //Contest Desktop View
                    echo '<a href="?section=contest"     class="  my-4   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl  ';
                    if ($section == "contest") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600";
                    echo '">Concursos</a>';

                }
                
            ?>
        </div>
       <!--
                Desktop View
                Last part where the login and sigup part is.
       -->
        <div class="hidden    lg:justify-end   py-3  lg:text-lg w-64 lg:inline-flex space-x-2  m-auto  ">
            <?php
             if(isset($_SESSION['user'])) {
                 // Logout of the session  Desktop View
                 echo '<a href="?section=profile" class="my-4 p-2 mb-2 leading-6 hover:text-blue-500 whitespace-nowrap border-r-2">'. $_SESSION['user']['name'] .'</a>';
                 echo '<a href="../backend/services/log_out.php" class="my-4 p-2 mb-2 leading-6 hover:text-red-500 ">Salir</a>';
             }else{
                 // Iniciar sesion  Desktop View
                 echo '<a href="?section=login" class="whitespace-nowrap   my-4   p-2 px-3 mb-2 leading-6 bg-blue-500 rounded-xl  ';
                 if ($section == "login") echo " font-bold  text-white "; else echo " text-white";
                 echo '">Iniciar sesión</a>';

                 // Registrarse  Desktop View
                 echo '<a href="?section=sign-up" class="border-blue-500 border-2  my-4   p-2 px-3 mb-2 leading-6 hover:bg-gray-100 
                 hover:text-black rounded-xl  hover:border-2 hover:border-black  ';
                 if ($section == "sign-up") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600";
                 echo '">Registrarte</a>';
             }
            ?>
        </div>



        <div class="  lg:hidden  sm:p-2.5 sm:justify-end sm:flex ">
            <button class="rounded-md p-2.5 text-gray-700 lg:hidden" type="button" id="openMenuBtn">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div  class="hidden" role="dialog" id="menu" aria-modal="true">
        <div class="fixed inset-0 z-10"></div>
        <div  class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div id="" class="flex items-center justify-between">
                <a href="?section=training" class="-m-1.5 p-1.5">
                    <span class="sr-only">OMRCH</span>
                    <img class="h-16 w-auto" src="resources/imgs/LogoOMRCHVector.svg" >
                </a>
                <button id="closeMenuBtn"  type="button" class="rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <div   class="mt-6 flow-root" >
                <div class="-my-6 divide-y divide-gray-500/10">

                    <div class="space-y-2 py-6">
                        <?php
                        // This part is used when the user is logout
                        if(!(isset($_SESSION['user']))) {
                            //  echo '<a href="?section=training"         class="  my-4   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl  '; if($section == "training") echo "text-blue-500 font-bold hover:text-blue-500 "; else echo " text-gray-600"; echo ' ">Entrenamientos</a>';

                            //Como participar Mobile View
                            echo '<a href="?section=registration" class="  block  py-2   p-2 mb-2 leading-6 hover:bg-gray-100 
                            hover:text-black rounded-lg  ';
                            if($section == "registration") echo "text-blue-500 font-bold hover:text-blue-500";
                            else echo " text-gray-600"; echo '">Como participar</a>';


                            // Material de entrenamiento Mobile View
                            echo '<a href="?section=trainingMaterial" class="block  py-2   p-2 mb-2 leading-6 hover:bg-gray-100 
                            hover:text-black rounded-lg'; if($section == "trainingMaterial") echo "text-blue-500 font-bold
                             hover:text-blue-500";
                             else echo " text-gray-600"; echo '">Material de Entrenamiento</a>';

                             // Iniciar sesion Mobile View
                            echo '<a href="?section=login" class="block  py-2   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black
                             rounded-lg'; if($section == "login") echo "text-blue-500 font-bold hover:text-blue-500"; else echo
                            " text-gray-600"; echo '">Iniciar de sesión</a>';

                            // registracion Mobile View
                            echo '<a href="?section=sign-up" class="block  py-2   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black
                             rounded-lg'; if($section == "sign-up") echo "text-blue-500 font-bold hover:text-blue-500"; else echo
                            " text-gray-600"; echo '">Registrate</a>';


                        }

                        // This part is used when the user is log-in
                        else{
                            //Como participar   mobile View
                            echo '<a href="?section=registration"        class="  block  py-2   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-lg  ';
                            if($section == "registration") echo "text-blue-500 font-bold hover:text-blue-500";
                            else echo " text-gray-600"; echo '">Como participar</a>';

                            // Material de entrenamiento  mobile View
                            echo '<a href="?section=trainingMaterial"          class="block  py-2   p-2 mb-2 leading-6 hover:bg-gray-100 
                            hover:text-black rounded-lg'; if($section == "trainingMaterial") echo "text-blue-500 font-bold hover:text-blue-500";
                            else echo " text-gray-600"; echo '">Material de Entrenamiento</a>';

                            //Contest mobile View
                            echo '<a href="?section=contest"     class="  my-4   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl  ';
                            if ($section == "contest") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600";
                            echo '">Concursos</a>';

                        }

                        ?>
                    </div>
                    
                    
                    
                    <!-- <div class="flex justify-end ">
                        <a href="../controller/services/log_out.php" class="my-5 bg-red-500 text-white hover:text-bold hover:bg-red-600 rounded-lg p-2">Cerrar Sesión</a>
                    </div> -->


                </div>

            </div>
        </div>
    </div>

</header>

<?php endif; ?>



<?php
include_once 'selector.php';
if (function_exists('contentSelector')) {
    contentSelector($section);
} else {
    echo 'La función contentSelector no está definida.';
}

?>
