<?php
require_once '../config/con.php'; // Asegúrate de que este archivo contiene la función connection()

$cct = $_POST['cct'] ?? '';

if ($cct !== "") {
    try {
        $conn = connection();
        $query = 'SELECT * FROM schools WHERE cct = :cct';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':cct', $cct, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            echo json_encode(['status' => '1', 'data' => $data]);
        } else {
            echo json_encode(['status' => '0', 'error' => 'CCT no encontrado']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => '0', 'error' => 'Error en la consulta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => '0', 'error' => 'CCT no proporcionado']);
}

?>
