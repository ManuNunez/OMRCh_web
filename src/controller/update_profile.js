document.getElementById('editButton').addEventListener('click', toggleEdit);

function toggleEdit() {
    const editButton = document.getElementById('editButton');
    const inputs = document.querySelectorAll('input');
    const isEditing = editButton.textContent === 'Guardar';

    if (isEditing) {
        saveChanges(); // Llama a la función para guardar los cambios
        // Cambiar a modo de vista
        inputs.forEach(input => input.setAttribute('disabled', true));
        editButton.textContent = 'Editar Perfil';
        editButton.classList.remove('bg-green-500', 'hover:bg-green-600');
        editButton.classList.add('bg-blue-400', 'hover:bg-blue-600');
    } else {
        // Cambiar a modo de edición
        inputs.forEach(input => input.removeAttribute('disabled'));
        inputs[0].focus(); // Enfocar el primer campo
        editButton.textContent = 'Guardar';
        editButton.classList.remove('bg-blue-400', 'hover:bg-blue-600');
        editButton.classList.add('bg-green-500', 'hover:bg-green-600');
    }
}

async function saveChanges() {
    const data = {};
    const inputs = document.querySelectorAll('input');

    inputs.forEach(input => {
        // Solo incluir campos que tengan un valor cambiado
        if (input.value !== input.defaultValue) {
            data[input.id] = input.value;
        }
    });

    // console.log(data);

    if (Object.keys(data).length === 0) {
        showErrorModal('No se realizaron cambios.');
        return;
    }

    // Convertir el objeto de datos a una cadena de consulta
    const queryString = new URLSearchParams(data).toString();

    try {
        const response = await fetch('../backend/services/update_profile.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: queryString,
        });

        const result = await response.json();

        if (result.status === '1') {
            updateInputDefaults(data);
            showErrorModal('Datos actualizados exitosamente', 'Aviso');
        } else {
            showErrorModal(result.error);
        }
    } catch (error) {
        // console.error('Error:', error);
        showErrorModal('Hubo un problema con la solicitud - Intentelo de nuevo');
    }
}

const updateInputDefaults = (updatedValues) => {
    for (const [id, value] of Object.entries(updatedValues)) {
        const input = document.getElementById(id);
        if (input) {
            input.defaultValue = value; // Actualizar el valor por defecto
        }
    }
};

const showErrorModal = (message, title) => {
    // Obtener elementos del modal y el fondo
    const modal = document.getElementById('errorModal');
    const background = document.querySelector('#errorModal .fixed.bg-black');

    const modalTitle = document.getElementById('errorModalTitle');
    const modalMessage = document.getElementById('errorModalMessage');

    if(title) modalTitle.textContent = title;
    
    modalMessage.textContent = message;

    // Mostrar el modal y aplicar el fondo desenfocado
    modal.classList.remove('hidden');
    background.classList.add('block');

    // evento para cerrar el modal
    const closeButton = document.getElementById('hideErrorModalButton');
    closeButton.addEventListener('click', () => {
        hideErrorModal();
    });
};


const hideErrorModal = () => {
    const modal = document.getElementById('errorModal');
    const background = document.querySelector('#errorModal .fixed.bg-black');

    modal.classList.add('hidden');
    background.classList.remove('block');
};
