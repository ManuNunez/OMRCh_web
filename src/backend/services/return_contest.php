<?php
//include_once '../config/con.php';
include_once 'config/con.php';
$conn = connection();

$students = array();
function returnContest(array $students, $conn) {
    try {

        $query = "INSERT ";

        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->errorInfo()[2]);
        }

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

};

$res = returnContest($student, $conn);
echo $res;
$conn = null;

?>
