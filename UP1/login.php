<?php
 $username = $_POST['username'];
 $Password = $_POST['Password'];
 //connect database
 $con = new mysqli("localhost","root","","info");
 if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
 }
 else{
    $stmt = $con->prepare("select * from signup where username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password']===$Password){
            header("Location: web.html");
            die();
        }else{
            echo "invalid";
        }

    } else{
        echo "<h2>Invalid username or password</h2>";
    }

 }
?>