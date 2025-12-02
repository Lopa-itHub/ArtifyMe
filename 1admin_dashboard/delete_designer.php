<?php
if(!isset($_GET['id'])){
    header('location:designer_details.php');
}
require_once "../dbConnect.php";
$id = $_GET['id'];
$qry = "DELETE FROM users WHERE id=?";
$stmt = $con->prepare($qry);
$stmt->bind_param("i", $id);
$stmt->execute();
if($stmt->affected_rows > 0){
?>
    <script>
        alert("Designer Deleted");
        window.location = "designer_details.php";
    </script>
<?php
} else {
?>
    <script>
        alert("Designer couldn't be Deleted");
        window.location = "designer_details.php";
    </script>
<?php
}

?>