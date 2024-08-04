<?php
    require_once '../backend/services/return_contest.php';
    $contests = json_decode(returnContest($conn), true);
?>

<div class="border p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold hover:text-blue-400 hover:underline text-blue-500">
            Proximos Concursos
        </h2>
    </div>

    <div class="mb-4">
        <input type="text" id="searchInput" placeholder="Buscar concurso..." class="p-2 border rounded-md">
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nombre del concurso
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Fecha
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Duración
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Acciones
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        <?php if ($contests['status'] == "1" && !empty($contests['data'])): ?>
            <?php foreach ($contests['data'] as $contest): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($contest['name'], ENT_QUOTES, 'UTF-8'); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($contest['contest_date'], ENT_QUOTES, 'UTF-8'); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($contest['duration_minutes'], ENT_QUOTES, 'UTF-8'); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="text-blue-500" onclick="openModal(<?php echo $contest['id']; ?>)">Inscribirme</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-red-500">No se encontraron datos.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-1/2">
            <h2 id="modalTitle" class="text-2xl font-bold mb-4">Inscribirme</h2>
            <form id="inscripcionForm" method="POST">
                <label for="campusSelect" class="block text-sm font-medium text-gray-700">Selecciona un campus:</label>
                <select id="campusSelect" name="campus" class="mt-1 p-2 border rounded-md w-full text-black">
                    <!-- Opciones dinámicas -->
                </select>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                    <button type="button" onclick="closeModal()" class="ml-2 text-gray-600">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../controller/return_contest_campuses.js"></script>
