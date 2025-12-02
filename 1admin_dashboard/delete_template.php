<?php
if(!isset($_GET['id'])){
    header('location:template_details.php');
}
require_once "../dbConnect.php";
$id = $_GET['id'];
$qry = "DELETE FROM templates WHERE id=?";
$stmt = $con->prepare($qry);
$stmt->bind_param("i", $id);
$stmt->execute();
if($stmt->affected_rows > 0){
?>
    <script>
        alert("Template Deleted");
        window.location = "template_details.php";
    </script>
<?php
} else {
?>
    <script>
        alert("Template couldn't be Deleted");
        window.location = "template_details.php";
    </script>
<?php
}

?>