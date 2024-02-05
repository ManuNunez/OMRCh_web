<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4">Cómo Inscribirse</h1>

    <ol class="list-decimal pl-6">
        <li>Completa el formulario de inscripción a continuación.</li>
        <li>Revisa la información proporcionada antes de enviar.</li>
        <li>Haz clic en el botón "Inscribirse".</li>
        <li>Espera la confirmación por correo electrónico.</li>
    </ol>

    <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Inscribirse a la
        Olimpiada</button>
</div>

<div id="registrationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Inscripción</h2>

        <form id="record">
            <div class="mb-4">
                <label for="fullName" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                <input type="text" id="fullName" name="fullName" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="participantEmail" class="block text-sm font-medium text-gray-700">Correo del Participante</label>
                <input type="email" id="participantEmail" name="participantEmail" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="school" class="block text-sm font-medium text-gray-700">Escuela</label>
                <input type="text" id="school" name="school" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <div class="mb-4">
                <div class="mb-4">
                    <label for="level" class="block text-sm font-medium text-gray-700">Nivel</label>
                    <select id="level" name="level" class="mt-1 p-2 w-full border rounded-md" required>
                        <option value="I">I hasta 5to de primaria</option>
                        <option value="II">II 6to de primaria</option>
                        <option value="III">III 1ro de secundaria</option>
                        <option value="IV">IV 2do de secundaria</option>
                        <option value="V">V 3ro de secundaria</option>
                        <option value="VI">VI cualquier semestre de Preparatoria</option>
                    </select>
                </div>

            </div>
            <div class="mb-4">
                <div class="mb-4">
                    <label for="campus" class="block text-sm font-medium text-gray-700">Sede</label>
                    <select id="campus" name="campus" class="mt-1 p-2 w-full border rounded-md" required>
                        <option value="example">Example</option>
                    </select>
                </div>

            </div>

            <div class="mb-4">
                <label for="teacherName" class="block text-sm font-medium text-gray-700">Nombre del Profesor</label>
                <input type="text" id="teacherName" name="teacherName" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="teacherEmail" class="block text-sm font-medium text-gray-700">Correo del Profesor</label>
                <input type="email" id="teacherEmail" name="teacherEmail" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button" onclick="closeModal()" class="text-gray-500 mr-4">Cancelar</button>
                <button type="button" onclick="validateData()" class="bg-blue-500 text-white px-4 py-2 rounded-md">Inscribirse</button>
            </div>
        </form>
    </div>
</div>

</div>
<script src="resources/js/registration_modal.js"></script>
