<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>

<div class="flex w-full place-content-center py-44 ">
    <div class="p-8 w-96 items-center border-gray-100 border-2 rounded-lg  ">
        <div class=" place-content-center flex">
            <img class="w-2/5 " src="resources/imgs/LogoOMRCHVector.svg">
        </div>
        <p class="-mt-6 mb-5 text-center text-2xl" >Inicia Sesión</p>

        <form id="record">
            <div class="relative">
                <input type="text"  id="username" name="username" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="username" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Usuario</label>
            </div>
            <div class="w-full">
                <a data-tooltip-target="tooltip-left" data-tooltip-placement="left"  class="text-blue-500 text-sm mb-5 hover:text-blue-800">No sabes tu usuario?</a>
                <div id="tooltip-left" role="tooltip" class="text-white absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium  bg-gray-400 rounded-lg shadow-sm opacity-0 tooltip">
                    Contacta a tu administador.
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
            <div class="relative my-3">
                <input type="password"  id="password" name="password" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Contraseña</label>
            </div>

            <div class="flex justify-between">
                <a class="text-xs text-blue-500 pt-7 ">Recuperar Contraseña</a>
                <button type="button" onclick="validateData(event)" class="bg-blue-500 text-white py-2 px-4 rounded mt-4">Iniciar Sesión</button>
            </div>
        </form>
    </div>
</div>

<script src="../controller/login_user.js"></script>






