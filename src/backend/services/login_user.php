<?php
session_start();

include_once '../config/con.php';

$conn = connection();

$student = [
    "username" => filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS),
    "password" => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS)
];

function login(array $student, $conn) {
    try {
        // Validar que los datos sanitizados no estén vacíos
        if (empty($student['username']) || empty($student['password'])) {
            throw new Exception("Invalid input data");
        }

        // Preparar la consulta SQL para seleccionar al estudiante por su nombre de usuario
        $query = "SELECT * FROM students WHERE username = :username";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->errorInfo()[2]);
        }

        // Enlazar el parámetro :username
        $stmt->bindValue(':username', $student['username']);

        // Ejecutar la consulta
        $stmt->execute();

        if ($stmt->errorInfo()[0] !== '00000') {
            throw new Exception("Failed to execute statement: " . $stmt->errorInfo()[2]);
        }

        // Obtener el resultado de la consulta
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result === false) {
            throw new Exception("Invalid username or password");
        }

        // Verificar la contraseña utilizando password_verify
        if (!password_verify($student['password'], $result['password'])) {
            throw new Exception("Invalid username or password");
        }

        $_SESSION['user'] = [
            'id' => $result['id'],
            'username' => $result['username'],
            'name' => $result['name'],
            'email' => $result['email'],
            'curp' => $result['curp'],
            'teacher_name' => $result['teacher_name'],
            'teacher_email' => $result['teacher_email']
        ];

        return json_encode(["status" => "1"]);

    } catch (PDOException $e) {
        // Manejo de errores específicos de la base de datos
        endSession();
        return json_encode(["status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()]);
    } catch (Exception $e) {
        // Manejo de otros tipos de errores
        endSession();
        return json_encode(["status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()]);
    }
}

// Función para terminar la sesión
function endSession() {
    session_unset(); // Destruye todas las variables de sesión
    session_destroy(); // Destruye la sesión
}

$res = login($student, $conn);
echo $res;

$conn = null;
?>
