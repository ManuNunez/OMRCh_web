<?php
include_once '../backend/config/con.php';
$conn = connection();

function returnContest($conn) {
    try {
        // Verifica si la sesión contiene los datos necesarios
        if (!isset($_SESSION['user']['id'])) {
            throw new Exception("No se ha iniciado sesión o no hay información del usuario.");
        }

        $studentId = $_SESSION['user']['id'];

        $query = "
            SELECT 
                c.*, 
                p.id AS participation_id 
            FROM 
                contests c
            LEFT JOIN 
                participations p 
            ON 
                c.id = p.contest_id 
            AND 
                p.student_id = :student_id";
        
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->errorInfo()[2]);
        }

        $stmt->bindValue(':student_id', $studentId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->errorInfo()[0] !== '00000') {
            throw new Exception("Failed to execute statement: " . $stmt->errorInfo()[2]);
        }

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return json_encode(['status' => '1', 'data' => $data]);
        
    } catch (PDOException $e) {
        return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
    } catch (Exception $e) {
        return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
    } finally {
        $conn = null;
    }
}

// Llama a la función y devuelve los resultados al contest.php
// echo returnContest($conn);
