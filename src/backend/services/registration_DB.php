<?php
include_once '../config/con.php';
$conn = connection();
$student = array( //values requested
    "username" => $_REQUEST['name'],
    "email" => $_REQUEST['email'],
    "curp" => $_REQUEST['curp'],
    "coach_name" => $_REQUEST['teacherName'],
    "coach_email" => $_REQUEST['teacherEmail']
);
function createStudent(array $student, $conn) {
    try {
        // Validar y sanear entradas
        $username = filter_var($student['username'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($student['email'], FILTER_VALIDATE_EMAIL);
        $curp = filter_var($student['curp'], FILTER_SANITIZE_SPECIAL_CHARS);
        $coach_name = filter_var($student['coach_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $coach_email = filter_var($student['coach_email'], FILTER_VALIDATE_EMAIL);

        if (!$username || !$email || !$curp || !$coach_name || !$coach_email) {
            throw new Exception("Invalid input data");
        }

        $hash = password_hash($curp, PASSWORD_BCRYPT);

        $query = "INSERT INTO students (name, email, curp, teacher_name, teacher_email, username, password)
                    VALUES (:name, :email, :curp, :teacher_name, :teacher_email, :username, :password)";

        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->errorInfo()[2]);
        }

        // Enlazar los parámetros utilizando el método bindValue de PDO
        $stmt->bindValue(':name', $username);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':curp', $curp);
        $stmt->bindValue(':teacher_name', $coach_name);
        $stmt->bindValue(':teacher_email', $coach_email);
        $stmt->bindValue(':username', $curp);
        $stmt->bindValue(':password', $hash);

        $stmt->execute();

        if ($stmt->errorInfo()[0] !== '00000') {
            throw new Exception("Failed to execute statement: " . $stmt->errorInfo()[2]);
        }

        return json_encode(array("status" => "1"));
    } catch (PDOException $e) {
        if ($e -> getCode() == 23505) {
            return json_encode(array("status" => "0", "error" => "Usuario ya registrado", "dataError" =>  $e->getMessage(), "line" => $e->getLine()));
        }
        return json_encode(array("status" => "0", "error" => "Error interno - Intentelo de nuevo", "dataError" =>  $e->getMessage(), "line" => $e->getLine()));
    } catch (Exception $e) {
        return json_encode(array("status" => "0", "error" => "Error desconocido - Intentelo de nuevo", "dataError" =>  $e->getMessage(), "line" => $e->getLine()));
    }
}



$res = createStudent($student, $conn);
echo $res;
$conn = null;

?>
