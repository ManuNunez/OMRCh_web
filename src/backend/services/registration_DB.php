<?php
    require '../config/con.php';
    $conn = connection();
    $UserName = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $school_Name = $_REQUEST['school'];
    $level = $_REQUEST['level'];
    $coach_Name = $_REQUEST['teacherName'];
    $coach_Email = $_REQUEST['teacherEmail'];
    $registration_timeStamp = $_REQUEST['timestamp'];

    $query = "INSERT INTO Participants(
    name,
    email,
    school,
    competition_level,
    coach_name,
    coach_email,
    REGISTRATION_TIMESTAMP
    )
    VALUES(
    '$UserName',
    '$email',
    '$school_Name',
    '$level',
    '$coach_Name',
        '$coach_Email',
    '$registration_timeStamp'
    )";
    $res = $conn->query($query);
    if($res){
        $conn->close();
        echo json_encode(array("status" => 1));
    }else{
        $conn->close();
        echo json_encode(array("status" => 0, "error" => "Error during the query: " . $conn->error));

    }

?>
