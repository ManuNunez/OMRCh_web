<?php
include_once '../config/con.php';
$conn = connection();
$student = array( //values requested
    "username" => $_REQUEST['name'],
    "email" => $_REQUEST['email'],
    "curp" => $_REQUEST['curp'],
    "coach_Name" => $_REQUEST['teacherName'],
    "coach_Email" => $_REQUEST['teacherEmail']
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
        $query = "INSERT INTO Participants(name, email, curp, coach_name, coach_email)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($query);
        
        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }
        
        $stmt->bind_param(
            "sssss",                       // Tipos de datos (s para string, i para integer)
            $student['username'],
            $student['email'],
            $student['curp'],
            $student['coach_Name'],
            $student['coach_Email'],
        );
        
        $stmt->execute();
        
        if ($stmt->error) {
            throw new Exception("Failed to execute statement: " . $stmt->error);
        }
        
        $stmt->close();
        return json_encode(array("status" => "1"));
    } catch (Exception $e) {
        return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
    }
}


$res = insertParticipants($student, $conn);
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



$conn->close();




?>
