<?php
require_once '../config/con.php';
$conn = connection();

function returnContestCampuses($conn) {
    try {
        $query = "SELECT cc.contest_id, cc.campus_id, c.campus_name FROM contest_campuses cc JOIN campuses c ON cc.campus_id = c.id";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->errorInfo()[2]);
        }

        $stmt->execute();

        if ($stmt->errorInfo()[0] !== '00000') {
            throw new Exception("Failed to execute statement: " . $stmt->errorInfo()[2]);
        }

        // Obtener todos los resultados en un array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Devolver los resultados como JSON
        return json_encode(array("status" => "1", "data" => $results));
    } catch (PDOException $e) {
        return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
    } catch (Exception $e) {
        return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
    }
}

header('Content-Type: application/json');
echo returnContestCampuses($conn);
$conn = null;
?>
