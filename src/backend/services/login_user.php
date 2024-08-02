<?php
    include_once '../config/con.php';
    $conn = connection();
    $student = array( //values requested
        "username" => $_REQUEST['username'],
        "password" => $_REQUEST['password']
    );

    function login(array $student, $conn) {
        try {
            // Validar y sanear entradas
            $username = filter_var($student['username'], FILTER_SANITIZE_STRING);
            $password = filter_var($student['password'], FILTER_SANITIZE_STRING);
            
            if (!$username || !$password) {
                throw new Exception("Invalid input data");
            }
    
            $query = "SELECT password FROM students WHERE username = :username";
            
            $stmt = $conn->prepare($query);
            
            if ($stmt === false) {
                throw new Exception("Failed to prepare statement: " . $conn->errorInfo()[2]);
            }
    
            // Enlazar el parámetro username
            $stmt->bindValue(':username', $username);
            
            $stmt->execute();
            
            // Verificar si se produjo un error al ejecutar la consulta
            if ($stmt->errorInfo()[0] !== '00000') {
                throw new Exception("Failed to execute statement: " . $stmt->errorInfo()[2]);
            }
    
            // Obtener el resultado
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verificar si no se encontró el usuario
            if ($result === false) {
                throw new Exception("Invalid username or password");
            }
    
            // Comparar la contraseña proporcionada con el hash almacenado
            if (!password_verify($password, $result['password'])) {
                throw new Exception("Invalid username or password");
            }
    
            // Autenticación exitosa
            return json_encode(array("status" => "1"));
        } catch (PDOException $e) {
            return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
        } catch (Exception $e) {
            return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
        }
    }

    $res = login($student, $conn);
    echo $res;
    $conn = null;
    

    
?>