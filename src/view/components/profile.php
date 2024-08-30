<?php
    require_once '../backend/services/return_student_data.php';
    $student = json_decode(returnStudentData($conn), true);
    $studentData = $student['data'];
?>

<main class="w-full flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-lg w-full">
        <div class="flex flex-col items-center mb-6">
            <div class="bg-blue-500 text-white rounded-full h-16 w-16 flex items-center justify-center">
                <span class="text-2xl font-semibold">U</span>
            </div>
            <div class="mt-4 text-center">
                <h2 class="text-2xl font-bold text-gray-800">Perfil de Usuario</h2>
                <p class="text-gray-600">Información personal</p>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1" for="name">Nombre:</label>
            <input id="name" type="text" class="bg-gray-100 rounded-md p-3 text-gray-800 w-full transition-opacity duration-500" value="<?php echo htmlspecialchars($studentData['name'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1" for="email">Correo Electrónico:</label>
            <input id="email" type="email" class="bg-gray-100 rounded-md p-3 text-gray-800 w-full transition-opacity duration-500" value="<?php echo htmlspecialchars($studentData['email'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1" for="curp">CURP:</label>
            <input id="curp" type="text" class="bg-gray-100 rounded-md p-3 text-gray-800 w-full transition-opacity duration-500" value="<?php echo htmlspecialchars($studentData['curp'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1" for="teacherName">Profesor Encargado:</label>
            <input id="teacher_name" type="text" class="bg-gray-100 rounded-md p-3 text-gray-800 w-full transition-opacity duration-500" value="<?php echo htmlspecialchars($studentData['teacher_name'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-1" for="teacherEmail">Correo del Profesor Encargado:</label>
            <input id="teacher_email" type="email" class="bg-gray-100 rounded-md p-3 text-gray-800 w-full transition-opacity duration-500" value="<?php echo htmlspecialchars($studentData['teacher_email'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
        </div>

        <div class="flex justify-between text-center">
            <button id="editButton" class="bg-blue-400 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm transition-colors duration-500">Editar Perfil</button>
            <a href="#" class="bg-blue-400 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm  transition-colors duration-500">Cambiar Contraseña</a>
        </div>
    </div>
</main>

<!-- Modal de Error -->
<div id="errorModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="fixed inset-0 bg-black opacity-50" aria-hidden="true"></div>
    <div class="relative bg-white p-6 rounded-lg shadow-lg max-w-sm mx-auto z-10">
        <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600" data-modal-hide="hideErrorModalButton">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close modal</span>
        </button>
        <div class="text-center">
            <h3 id="errorModalTitle" class="text-lg font-medium text-gray-900">Error</h3>
            <p id="errorModalMessage" class="mt-2 text-sm text-gray-600"></p>
            <button data-modal-hide="hideErrorModalButton" type="button" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-800">
                Cerrar
            </button>
        </div>
    </div>
</div>

<script type="module" src="../controller/update_profile.js"></script>
