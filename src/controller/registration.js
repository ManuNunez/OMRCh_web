function validateData(event){
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


function sendDataToTheServer(formData){
    $.ajax({
        url:"../backend/services/registration_DB.php",
        type:"POST",
        data:formData,
        success:function (res){
            var checked = JSON.parse(res);
            console.log(checked.status);
            if(checked.status == 1){
                console.log('User registered success.')
                window.location.href = '?section=user-registered';
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