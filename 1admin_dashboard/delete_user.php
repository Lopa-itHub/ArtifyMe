<?php
if(!isset($_GET['id'])){
    header('location:user_details.php');
}
require_once "../dbConnect.php";
$id = $_GET['id'];
$qry = "DELETE FROM users WHERE id=?";
$stmt = $conn->prepare($qry);
$stmt->bind_param("i", $id);
$stmt->execute();
if($stmt->affected_rows > 0){
?>
    <script>
        alert("User Deleted");
        window.location = "user_details.php";
    </script>
<?php
} else {
?>
    <script>
        alert("User couldn't be Deleted");
        window.location = "user_details.php";
    </script>
<?php
}

?>