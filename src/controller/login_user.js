function validateData() {
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
    const username = $('#username').val();
    const password = $('#password').val();
    const formData = {
        username,
        password
    };
    $.ajax({
        url:"../backend/services/login_user.php",
        type:"GET",
        data:formData,
        success:function (res){
            console.log(res);
            const checked = JSON.parse(res);
            console.log(checked.status);
            if(checked.status == 1){
                console.log('User registered success.')
                window.location.href = '?section=contest';
            }else if(checked.error) {
                const errorMessage = checked.error;
                alert(errorMessage);
            }else{
                alert('Error desconocido.');
            }
            console.log(res);

        },
        error:function (){
            alert('File not Found!'); // Este solo es cuando no encuentra el archivo
        }
    });
}
