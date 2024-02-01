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

/*

    $query = "INSERT INTO 'TABLE_NAME_CHANGE_THIS_DOGG' 
                                (USERNAME,EMAIL,SCHOOL_NAME,MATH_LEVEL,COACH_NAME,COACH_EMAIL,REGISTRATION_TIMESTAMP) 
                                VALUES ('$UserName','$email','$school_Name','$level','$coach_Name',
                                '$coach_Email','$registration_timeStamp')";
    $res = $conn->query($query);
    if($res){
        $conn->close();
        echo 1;
    }else{
        echo 'Error during the query: ' . $conn->error;
    }*/
echo '$UserName','$email','$school_Name','$level','$coach_Name',
'$coach_Email','$registration_timeStamp';
    ?>
