<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once "dbconnect.php";
    $email = $_POST['email'];
    $qry =" SELECT * FROM users WHERE email=?";
    $stmt = $con->prepare($qry);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}
?>