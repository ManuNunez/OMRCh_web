<head>
    <link href="resources/main.css" rel="stylesheet">
    <meta charset="UTF-8">
    <script src="resources/js/jquery-3.3.1.min.js"></script>
    <script src="resources/js/NavToggle.js"></script>
    <link rel="stylesheet" href="../resources/main.css">
</head>

<body class="bg-red-600">
<head>
    <link rel="stylesheet" href="resources/main.css">
</head>


<script>
    // Imprimir el valor de la variable PHP en la consola del navegador
    console.log(<?php echo json_encode($datos); ?>);
</script>

<?php if (!isset($datos['error'])) : ?>
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
                    Lugar del concurso
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Acciones
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Olimpiada Matematica Num.14</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Chapala, Jalisco, Mexico</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <button  class="text-blue-500">Editar</button>
                    <button  class="text-red-500 ml-2">Borrar</button>
                </td>
            </tr>

         <!--   <?php /*foreach ($datos as $dato) : */?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php /*echo $dato['id']; */?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php /*echo $dato['locationName']; */?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button onclick="openModal('editar', <?php /*echo $dato['id']; */?>)" class="text-blue-500">Editar</button>
                        <button onclick="borrarSede(<?php /*echo $dato['id']; */?>)" class="text-red-500 ml-2">Borrar</button>
                    </td>
                </tr>
            --><?php /*endforeach; */?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <p class="text-red-500">No se encontraron datos para la sede con ID <?php echo $idSede; ?></p>
<?php endif; ?>

<div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-1/2">
            <h2 id="modalTitle" class="text-2xl font-bold mb-4">Crear Sede</h2>
            <form id="sedeForm"  method="POST">
                <label for="location_name" class="block text-sm font-medium text-gray-700">Nombre de la Sede:</label>
                <input type="text" id="location_name" name="nombre_sede" class="mt-1 p-2 border rounded-md w-full">

                <label for="classrooms_location" class="block text-sm font-medium text-gray-700">Salones disponibles en la Sede:</label>
                <input type="number" id="classroom_quantity" name="nombre_sede" class="mt-1 p-2 border rounded-md w-full">

                <label for="classroom_capacity" class="block text-sm font-medium text-gray-700">capacidad promedio de los salones:</label>
                <input type="number" id="classroom_capacity" name="nombre_sede" class="mt-1 p-2 border rounded-md w-full">
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="validateData()">Guardar</button>
                    <button type="button" onclick="closeModal()" class="ml-2 text-gray-600">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
