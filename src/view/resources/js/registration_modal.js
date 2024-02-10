    // Función para abrir el modal
    function openModal() {
        document.getElementById('registrationModal').classList.remove('hidden');
      }
    
    // Función para cerrar el modal
    function closeModal() {
      document.getElementById('registrationModal').classList.add('hidden');
    }

    function validateData(){
      event.preventDefault();
      const form = document.getElementById('record');
      const formElements = form.elements;

     /* for (let i = 0; i < formElements.length; i++) {
        if (!formElements[i].checkValidity()) {
          // Si algún campo no es válido, mostrar mensaje de error y salir de la función
          alert('Por favor, complete todos los campos correctamente.');
          return;
        }
      }*/

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
      const campus = getData('campus');

      // Obtener la marca de tiempo
      const timestamp = new Date().toISOString();

      const formData = {
            name: name,
            email: email,
            school: school,
            level: level,
            teacherName: teacherName,
            teacherEmail: teacherEmail,
            campus: campus,
            timestamp: timestamp
        }
        console.log(formData.name + ", " + formData.timestamp);
        sendDataToTheServer(formData);
        window.location.href = '?section=user-registered';

        
    }


    function sendDataToTheServer(formData){ // This is Ajax de jQuery dog you'll love it.
        $.ajax({
            url:"../backend/services/registration_DB.php",
            type:"POST",
            data:formData,
            success:function (res){
                if(res == 1){
                    window.location.href = '?section=user-registered';
                }
                // Iker aqui a regrega la comprobacion para el usuario de que se registro con exito
                // IMPORTANTEEEEEEEE
                // Iker agrega un explode para que busques el primer elemento que te envio si sale bien es 1 si no es 0
                // pero cuando es 0 no solo te envio el 0 si no tambien el erro atras entonces maneja los errores.
            },
            error:function (){
                alert('File not Found!'); // Este solo es cuando no ecnuentra el archivo
            }
        });


    }

