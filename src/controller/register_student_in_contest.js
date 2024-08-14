// Función para verificar el CCT con el servidor
export const checkCCT = async (cct) => {
    try {
        const response = await fetch('../backend/services/check_cct.php', {
            method: 'POST',
            body: new URLSearchParams({ cct: cct }),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        });
        const result = await response.json();
        if (result.status === '1') {
            return result.data;
        } else {
            throw new Error('CCT no válido');
        }
    } catch (error) {
        console.error('Error al verificar el CCT:', error);
        return null;
    }
}

// Función para manejar el envío del formulario
export const handleFormSubmit = async (contestId, event) => {
    event.preventDefault();

    const form = document.getElementById('inscripcionForm');
    const formData = new FormData(form);
    formData.append('contestId', contestId);
    const data = Object.fromEntries(formData.entries());
    let cct = data.school;
    cct = cct.toUpperCase();
    console.log(cct);

    
    // Verificar el CCT antes de continuar
    const isCCTValid = await checkCCT(cct);
    if (isCCTValid === null) {
        alert('El CCT de la escuela no es válido. Por favor, verifica el CCT e intenta nuevamente.');
        return;
    } else {
        // console.log(isCCTValid)
        data.schoolId = isCCTValid.id;
    }
    // console.log(data);
    
    try {
        const response = await fetch('../backend/services/register_student_in_contest.php', {
            method: 'POST',
            body: new URLSearchParams(data),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        });
        const result = await response.json();


        // console.log(result);

        if (result.status === '1') {
            alert('Registro exitoso');
            window.location.reload();
            // closeModal();
        } else {
            alert('Error al registrar: ' + result.error);
        }
    } catch (error) {
        console.error('Error al enviar el formulario:', error);
        alert('Ocurrió un error al registrar. Por favor, intente de nuevo.');
    }
}

