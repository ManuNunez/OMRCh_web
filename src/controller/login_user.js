function validateData(event) {
    event.preventDefault();

    const form = document.getElementById('record');
    const formElements = form.elements;

    for (let i = 0; i < formElements.length; i++) {
        if (!formElements[i].checkValidity()) {
            // Si algún campo no es válido, mostrar mensaje de error y salir de la función
            alert('Por favor, complete todos los campos correctamente.');
            return;
        }
    }

    sendForm();
}

const sendForm = async () => {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const formData = new URLSearchParams();
    formData.append('username', username);
    formData.append('password', password);

    try {
        const response = await fetch('../backend/services/login_user.php', {
            method: 'POST',
            body: formData,
            credentials: 'include' // Incluye las credenciales en la solicitud
        });

        if (!response.ok) {
            throw new Error('File not Found!');
        }

        const res = await response.json();
        console.log(res);

        if (res.status == 1) {
            console.log('User logged.');
            window.location.href = '?section=contest';
        } else if (res.error) {
            const errorMessage = res.error;
            alert(errorMessage);
        } else {
            alert('Error desconocido.');
        }
    } catch (error) {
        alert(error.message); // Mensaje de error si no se encuentra el archivo
    }
}
