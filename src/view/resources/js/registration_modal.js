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

    function sendDataToTheServer(){

      // Aqui va el codigo de alexis

    }

