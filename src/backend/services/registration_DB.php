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
function getStudentId($studentName,$conn){
    try{
        $query = "SELECT id From Students WHERE name = '$studentName'";
        $res = $conn->query($query);
        $row = $res->fetch_assoc();
        return $row['id'];

    }
    catch (mysqli_sql_exception){
        return json_encode(array("status"=>"0","error"=>"Error during the getStudentId function"));
    }
}
function getSedeId($sedeinput,$conn){
    $query ="SELECT id FROM Sedes WHERE status = 1 AND sede_name = '$sedeinput'";
    $res = $conn->query($query);
    if($res){
        $row = $res->fetch_assoc();
        return (int)$row['id'];
    }else{
        return null;
    }

}

function getContestId($sede_id, $conn){
    $query ="SELECT id FROM Contest WHERE status = 1 AND sede_id = '$sede_id'";
    $res = $conn->query($query);
    if($res){
        $row = $res->fetch_assoc();
        return $row['id'];
    }else{
        return null;
    }

}
function insertStudents(array $student,$conn){
    try{
        $query =  "INSERT INTO Students (name, email, teacher_name, teacher_email) VALUES ('$student[username]', '$student[email]', '$student[coach_Name]', '$student[coach_Email]')";
        $res = $conn->query($query);
        return array("status"=>"1");
    }
    catch(mysqli_sql_exception){
        return array("status"=>"0","error"=>"Error during the insertStudent function");
    }
}
function createStudent(array $student, $conn) {
    try {
        // Validar y sanear entradas
        $username = filter_var($student['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($student['email'], FILTER_VALIDATE_EMAIL);
        $curp = filter_var($student['curp'], FILTER_SANITIZE_STRING);
        $coach_name = filter_var($student['coach_name'], FILTER_SANITIZE_STRING);
        $coach_email = filter_var($student['coach_email'], FILTER_VALIDATE_EMAIL);

        if (!$username || !$email || !$curp || !$coach_name || !$coach_email) {
            throw new Exception("Invalid input data");
        }

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
        $stmt->bindValue(':password', $curp);

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



$res = createStudent($student, $conn);
echo $res;
// $student['sedeIdArray'] = $sede_id;// query for the id from the sede selected
// $inStASW = insertStudents($student,$conn); // insert to the table Students
// if($inStASW['status'] == "1"){
//     $student['contestId'] = getContestId($student['sedeIdArray'],$conn);
//     $student['studentId'] = getStudentId($student['username'],$conn);
//     $inPaAsw = insertParticipants($student,$conn);
//     $inPaDe = json_decode($inPaAsw);
//     echo $inPaAsw;
// }else{
//     echo $inStASW;
// }



$conn = null;




?>
