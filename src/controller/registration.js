function validateData(){
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

function sendForm() {
    // Obtener datos de el formulario
    const getData = (id) => document.getElementById(id).value;
    const name = getData('fullName');
    const email = getData('participantEmail');
    const curp = getData('curp');
    const teacherName = getData('teacherName');
    const teacherEmail = getData('teacherEmail');



    const formData = {name,email,curp,teacherName,teacherEmail}
    
    sendDataToTheServer(formData);

    
}

function sendDataToTheServer(formData) {
    fetch("./../backend/services/registration_DB.php", {
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
            alert(errorMessage);
        } else {
            alert('Error desconocido.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('File not found!');
    });
}
