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
    const school = getData('school');
    const level = getData('level');
    const teacherName = getData('teacherName');
    const teacherEmail = getData('teacherEmail');
    let campus = getData('campus'); // es necesario verficar que la sede no sea la opacion predeterminada del <select>



    // Obtener la marca de tiempo
    const timestamp = new Date().toISOString();

    const formData = {name,email,school,level,teacherName,teacherEmail,campus,timestamp}
    console.log(campus);
    console.log(formData.name + ", " + formData.timestamp + '/n');
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