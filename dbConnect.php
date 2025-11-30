<?php
$SERVER = "127.0.0.1";
$USER = "root";
$PASSWORD = "";
$DB_NAME = "artifyme";
$con = new mysqli($SERVER,$USER,$PASSWORD,$DB_NAME);
if($con->connect_error){
    die("Error: ".$con->connect->error);
}
else{
    // echo "Database is connected<br>";
}
?>