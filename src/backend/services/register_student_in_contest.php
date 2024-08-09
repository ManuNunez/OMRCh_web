<?php
session_start();
header('Content-Type: application/json');
include_once '../config/con.php';
$conn = connection();
// Verificar si $_SESSION['user'] está definida
if (!isset($_SESSION['user'])) {
    echo json_encode(array("status" => "0", "error" => "Sesion no iniciada"));
    exit;
}

// Datos del estudiante recibidos del formulario
$student = array(
    "id" => $_SESSION['user']['id'],
    "name" => $_SESSION['user']['name'],
    "email" => $_SESSION['user']['email'],
    "coach_name" => $_REQUEST['coachName'],
    "coach_email" => $_REQUEST['coachEmail'],
    "school_id" => $_REQUEST['schoolId'],
    "campus_id" => $_REQUEST['campus'],
    "competition_level" => $_REQUEST['levelSelect'],
    "contest_id" => $_REQUEST['contestId']
);

function registerStudent(array $student, $conn) {
    try {
        // Validar y sanear entradas
        $coach_name = filter_var($student['coach_name'], FILTER_SANITIZE_STRING);
        $coach_email = filter_var($student['coach_email'], FILTER_VALIDATE_EMAIL);

        if (!$coach_name || !$coach_email) {
            throw new Exception("Invalid input data");
        }

        // Insertar datos en la tabla participations
        $query = "INSERT INTO participations (student_id, contest_id, school_id, participating_campus_id, competition_level, coach_name, coach_email, name, email)
                    VALUES (:student_id, :contest_id, :school_id, :campus_id, :competition_level, :coach_name, :coach_email, :student_name, :student_email)";

        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->errorInfo()[2]);
        }

        // Enlazar los parámetros utilizando el método bindValue de PDO
        $stmt->bindValue(':student_id', $student['id']);
        $stmt->bindValue(':contest_id', $student['contest_id']);
        $stmt->bindValue(':school_id', $student['school_id']);
        $stmt->bindValue(':campus_id', $student['campus_id']);
        $stmt->bindValue(':competition_level', $student['competition_level']);
        $stmt->bindValue(':coach_name', $coach_name);
        $stmt->bindValue(':coach_email', $coach_email);
        $stmt->bindValue(':student_name', $student['name']);
        $stmt->bindValue(':student_email', $student['email']);

        $stmt->execute();

        if ($stmt->errorInfo()[0] !== '00000') {
            throw new Exception("Failed to execute statement: " . $stmt->errorInfo()[2]);
        }

        return json_encode(array("status" => "1"));
    } catch (PDOException $e) {
        return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
    } catch (Exception $e) {
        return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
    }
}

$res = registerStudent($student, $conn);
echo $res;

$conn = null;
?>
