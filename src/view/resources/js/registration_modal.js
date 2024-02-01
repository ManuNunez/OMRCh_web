    // Función para abrir el modal
    function openModal() {
        document.getElementById('registrationModal').classList.remove('hidden');
      }
    
    // Función para cerrar el modal
    function closeModal() {
      document.getElementById('registrationModal').classList.add('hidden');
    }

    function sendForm() {
      // Obtener datos de el formulario
      const name = document.getElementById('fullName').value;
      const email = document.getElementById('participantEmail').value;
      const school = document.getElementById('school').value;
      const level = document.getElementById('level').value;
      const teacherName = document.getElementById('teacherName').value;
      const teacherEmail = document.getElementById('teacherEmail').value;
        const timestamp = new Date().toISOString();
        const formData = {
            name: name,
            email: email,
            school: school,
            level: level,
            teacherName: teacherName,
            teacherEmail: teacherEmail,
            timestamp: timestamp
        }
        sendDataToTheServer(formData);
        console.log(formData.name + ", " + formData.timestamp);
        /*              NOTAS IMPORTANTES!
        - Comprobacion que los campos esten siempre llenos


      if(name == '' || email == '' || school == '' || level == '' || teacherEmail == '' || teacherName == '' ){
            // Iker aqui agrega una funcion para que un alert te avise si alguno de los campos no esta lleno
            // Puedes ver en boostrapt 'alertas' oJo no se si tailwind tenga alertas tambien pero agrega una
            // https://bootswatch.com/cerulean/
            // Puedes hacer un div de color rojo y ponerlo a un lado usando esto
            // $('#email').val(''); == document.getElementById('fullName').value; (Usa menos lineas papi)
            // $('#emailWrong').show();
            // $('#emailWrong').html('El correo '+ email  + ' ya se encuentra registrado.');
            // setTimeout("$('#emailWrong').hide(); $('#email').html('')",5000);
          console.log('Entro');
          alert('entro al alert');
      }else{
          // Obetener la marca de tiempo
          const timestamp = new Date().toISOString();
          const formData = {
              name: name,
              email: email,
              school: school,
              level: level,
              teacherName: teacherName,
              teacherEmail: teacherEmail,
              timestamp: timestamp
          }

          sendDataToTheServer(formData);
          console.log(formData.name + ", " + formData.timestamp);
      }
    }
 */
    }


    function sendDataToTheServer(formData){ // This is Ajax de jQuery dog you'll love it.
        $.ajax({
            url:"../../backend/services/registration_DB.php",
            type:"POST",
            data:'name=aaaa',
            success:function (res){
                console.log('SUCCESS: '+ res );
                // Iker aqui a regrega la comprobacion para el usuario de que se registro con exito
                // estaria chido implemetar envios de correo electronico por medio de STP
                // si les late la idea diganme para inplementarlo.
            },
            error:function (){
                alert('File not Found!');
            }
        });


    }

