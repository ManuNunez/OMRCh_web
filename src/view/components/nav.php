<?php
session_start(); // ALEXIS NO LO BORRES;
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
    <script src="resources/js/NavToggle.js"></script>
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
    <nav class=" flex justify-between px-2 " aria-label="Global">
        <div class="flex">
            <?php
                if(isset($_SESSION['user'])){
                    echo '  
                        <a href="?section=attendanceList" class="">
                        <span class="sr-only">OMRCH</span>
                        <img class="h-16 my-3" src="resources/imgs/LogoOMRCHVector.svg" alt="">
                        </a>
                    ';
                }else{
                    echo '
                        <a href="?section=index" class="">
                        <span class="sr-only">OMRCH</span>
                        <img class="h-16 my-3" src="resources/imgs/LogoOMRCHVector.svg" alt="">
                        </a>
                    ';
                }
            ?>

        </div>

        <div class="hidden  lg:flex lg:gap-x-1  m-auto w-full justify-center    lg:text-lg ">
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

                    // Iniciar sesion  Desktop View
                    echo '<a href="?section=login"            class="  my-4   p-2 px-3 mb-2 leading-6 bg-blue-500 rounded-2xl  ';
                    if ($section == "login") echo " font-bold  text-white "; else echo " text-white";
                    echo '">Iniciar sesión</a>';

                    // Registrarse  Desktop View
                    echo '<a href="?section=sign-up"           class="  my-4   p-2 px-3 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl  hover:border-2 hover:border-black  ';
                    if ($section == "sign-up") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600";
                    echo '">Registrarte</a>';
                }
                // This part is used when the user is log-in
                else{
                    // ReGgistration example
                    echo '<a href="?section=registration"     class="  my-4   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl  ';
                    if ($section == "registration") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600";
                    echo '">Como participar</a>';

                    //Contest Desktop View
                    echo '<a href="?section=contest"     class="  my-4   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-2xl  ';
                    if ($section == "contest") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600";
                    echo '">Concursos Disponibles</a>';

                    // Logout of the session  Desktop View
                    echo '<a href="../backend/services/log_out.php" class="py-4 mb-2 leading-6 hover:text-red-500 ">Log out</a>';


                }
                
            ?>
        </div>
        <!-- <div class="hidden  lg:flex   lg:justify-end   py-3  lg:text-lg ">
            <?php
            //<a href="../controller/services/log_out.php" class="py-4 mb-2 leading-6 hover:text-red-500 ">Log out</a>
            //
            // if(isset($_SESSION['user'])){
            //     echo '
            //         <a class="cursor-pointer h-15 w-full hover:bg-gray-100 p-3 rounded-lg" href="../controller/services/log_out.php "> 
            //         <svg class="hover:text-gray-700" fill="#000000" width="37px" height="37px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 6.62219V17.245C22 18.3579 21.2857 19.4708 20.1633 19.8754L15.0612 21.7977C14.7551 21.8988 14.449 22 14.0408 22C13.5306 22 12.9184 21.7977 12.4082 21.4942C12.2041 21.2918 11.898 21.0895 11.7959 20.8871H7.91837C6.38776 20.8871 5.06122 19.6731 5.06122 18.0544V17.0427C5.06122 16.638 5.36735 16.2333 5.87755 16.2333C6.38776 16.2333 6.69388 16.5368 6.69388 17.0427V18.0544C6.69388 18.7626 7.30612 19.2684 7.91837 19.2684H11.2857V4.69997H7.91837C7.20408 4.69997 6.69388 5.20582 6.69388 5.91401V6.9257C6.69388 7.33038 6.38776 7.73506 5.87755 7.73506C5.36735 7.73506 5.06122 7.33038 5.06122 6.9257V5.91401C5.06122 4.39646 6.28572 3.08125 7.91837 3.08125H11.7959C12 2.87891 12.2041 2.67657 12.4082 2.47423C13.2245 1.96838 14.1429 1.86721 15.0612 2.17072L20.1633 4.09295C21.1837 4.39646 22 5.50933 22 6.62219Z" fill="#000000"></path> <path d="M4.85714 14.8169C4.65306 14.8169 4.44898 14.7158 4.34694 14.6146L2.30612 12.5912C2.20408 12.49 2.20408 12.3889 2.10204 12.3889C2.10204 12.2877 2 12.1865 2 12.0854C2 11.9842 2 11.883 2.10204 11.7819C2.10204 11.6807 2.20408 11.5795 2.30612 11.5795L4.34694 9.55612C4.65306 9.25261 5.16327 9.25261 5.46939 9.55612C5.77551 9.85963 5.77551 10.3655 5.46939 10.669L4.7551 11.3772H8.93878C9.34694 11.3772 9.7551 11.6807 9.7551 12.1865C9.7551 12.6924 9.34694 12.7936 8.93878 12.7936H4.65306L5.36735 13.5017C5.67347 13.8052 5.67347 14.3111 5.36735 14.6146C5.26531 14.7158 5.06122 14.8169 4.85714 14.8169Z" ></path> </g></svg>
            //         </a>
            //         ';
            // }
            ?>
        </div> -->



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
                </a>ss
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
                            echo '<a href="?section=training"       class="  block  py-2   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-lg'; if($section == "training") echo "text-blue-500 font-bold hover:text-blue-500 "; else echo " text-gray-600"; echo ' ">Entrenamientos</a>';
                            echo '<a href="?section=registration"        class="  block  py-2   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-lg  '; if($section == "registration") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600"; echo '">Como participar</a>';
                            echo '<a href="?section=trainingMaterial"          class="block  py-2   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-lg'; if($section == "trainingMaterial") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600"; echo '">Material de Entrenamiento</a>';
                            echo '<a href="?section=login"           class="block  py-2   p-2 mb-2 leading-6 hover:bg-gray-100 hover:text-black rounded-lg'; if($section == "login") echo "text-blue-500 font-bold hover:text-blue-500"; else echo " text-gray-600"; echo '">Iniciar de sesión</a>';
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
