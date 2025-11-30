<?php
require_once "dbConnect.php";
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$country = $_POST['country'];
$password = $_POST['password'];

$qry = "INSERT INTO users(name,email,mobile,country,password) VALUE(?,?,?,?,?)";
$stmt = $con->prepare($qry);
$stmt -> bind_param("sssss",$name,$email,$mobile,$country,$password);

if($stmt->execute()){
    echo "Data inserted successfully";
}
else{
    echo "Data insertion failed";
}
?>