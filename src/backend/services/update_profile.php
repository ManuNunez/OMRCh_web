<?php
session_start();
include_once '../config/con.php';

$conn = connection();

$updateFields = [];
$params = [];
$allowedFields = ['name', 'email', 'curp', 'teacher_name', 'teacher_email'];

foreach ($allowedFields as $field) {
    if (isset($_POST[$field]) && !empty($_POST[$field])) {
        $updateFields[] = "$field = :$field";
        $params[":$field"] = filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}

if (empty($updateFields)) {
    echo json_encode(["status" => "0", "error" => "No fields to update"]);
    exit();
}

$query = "UPDATE students SET " . implode(", ", $updateFields) . " WHERE id = :id";
$params[':id'] = $_SESSION['user']['id'];

try {
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        throw new Exception("Failed to prepare statement: " . $conn->errorInfo()[2]);
    }

    $stmt->execute($params);

    if ($stmt->errorInfo()[0] !== '00000') {
        throw new Exception("Failed to execute statement: " . $stmt->errorInfo()[2]);
    }

    // Update session data
    foreach ($params as $key => $value) {
        $field = substr($key, 1); // Remove the leading ':'
        if (in_array($field, $allowedFields)) {
            $_SESSION['user'][$field] = $value;
        }
    }

    echo json_encode(["status" => "1"]);

} catch (PDOException $e) {
    echo json_encode(["status" => "0", "error" => "Error interno - Intentelo de nuevo", "dataError" =>  $e->getMessage(), "line" => $e->getLine()]);
} catch (Exception $e) {
    echo json_encode(["status" => "0", "error" => "Error desconocido - Intentelo de nuevo", "dataError" => $e->getMessage(), "line" => $e->getLine()]);
}

$conn = null;
?>
