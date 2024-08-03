<?php
require_once '../backend/config/con.php';
$conn = connection();

function returnContest($conn) {
    try {
        $query = "SELECT * FROM contests";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->errorInfo()[2]);
        }

        $stmt->execute();

        if ($stmt->errorInfo()[0] !== '00000') {
            throw new Exception("Failed to execute statement: " . $stmt->errorInfo()[2]);
        }

        // Obtener todos los resultados en un array
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Devolver los resultados como JSON
        return json_encode(['status' => '1', 'data' => $data]);
        
    } catch (PDOException $e) {
        return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
    } catch (Exception $e) {
        return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
    } finally {
        $con = null;
    }
}


?>
