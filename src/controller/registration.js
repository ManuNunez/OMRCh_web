function validateData(){
    // event.preventDefault();
    const form = document.getElementById('record');
    const formElements = form.elements;
        for (let i = 0; i < formElements.length; i++) {
            if (!formElements[i].checkValidity()) {
            // Si algún campo no es válido, mostrar mensaje de error y salir de la función
            showErrorModal('Por favor, complete todos los campos correctamente.');
            return;
            }
        }

    sendForm();

}

function sendForm() {
    // Obtener datos de el formulario
    const getData = (id) => document.getElementById(id).value;
    const name = getData('name');
    const email = getData('email');
    const curp = getData('curp');
    const teacherName = getData('teacherName');
    const teacherEmail = getData('teacherEmail');



    const formData = {name,email,curp,teacherName,teacherEmail}
    
    sendDataToTheServer(formData);

    
}

function sendDataToTheServer(formData) {
    fetch("../backend/services/registration_DB.php", {
        method: "POST",
        body: new URLSearchParams(formData),
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    })
    .then(response => response.json())
    .then(res => {
        if (res.status == 1) {
            console.log('User registered successfully.');
            window.location.href = '?section=user-registered';
        } else if (res.error) {
            const errorMessage = res.error;
            showErrorModal(errorMessage);
        } else {
            showErrorModal('Error desconocido. Intentelo de nuevo');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showErrorModal('Error interno. Intentelo de nuevo');
    });
}

const showErrorModal = (message) => {
    // Obtener elementos del modal y el fondo
    const modal = document.getElementById('errorModal');
    const background = document.querySelector('#errorModal .fixed.bg-black');

    const modalMessage = document.getElementById('errorModalMessage');

    modalMessage.textContent = message;

    // Mostrar el modal
    modal.classList.remove('hidden');
    background.classList.add('block');

    // evento para cerrar el modal
    const closeButtons = document.querySelectorAll('[data-modal-hide="hideErrorModalButton"]');

    closeButtons.forEach((button) => {
        button.addEventListener('click', hideErrorModal);
    });
};

const hideErrorModal = () => {
    const modal = document.getElementById('errorModal');
    const background = document.querySelector('#errorModal .fixed.bg-black');

    modal.classList.add('hidden');
    background.classList.remove('block');
};
