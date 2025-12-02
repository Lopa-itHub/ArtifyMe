<?php
include_once "../navbar.php";
include_once "../dbConnect.php";
$msg="";
$type = "designer";
$qry = "SELECT id,name,email,mobile,country FROM users where user_type = ?";
$stmt = $con->prepare($qry);
$stmt->bind_param("s",$type);
$stmt->execute();
$res = $stmt->get_result();
if(!$res){
    $msg = "No data available about Designers!";
}
?>
<div class="container-fluid">
    <h1 class="mb-5 text-center text-info">DESIGNERS</h1>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Country</th>
            <th style="color:red;">DELETE</th>
        </tr>
        <?php while($data = $res->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['mobile'] ?></td>
                <td><?php echo $data['country'] ?></td>
                <td><a href="delete_designer.php?id=<?php echo $data['id']?>" onclick="return confirm('Are you sure, you want to delete ?')"><div class="delete-icon"></div></a></td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php include_once "../footer.php" ?>