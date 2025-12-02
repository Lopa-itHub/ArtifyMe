<?php
include_once "../navbar.php";
include "../dbConnect.php";

// Fetch templates with designer name
$sql = "
    SELECT t.*, u.name AS designer_name
    FROM templates t
    JOIN users u ON t.designer_id = u.id
    ORDER BY t.created_at DESC
";
$res = $con->query($sql);
?>

<div class="container mt-4">
    <h1 class="mb-5 text-center text-info">Templates</h2>

    <table class="table table-bordered table-hover align-middle mt-3">
        <thead class="table-light">
            <tr>
                <th>Preview</th>
                <th>Template Name</th>
                <th>Designer</th>
                <th>Created At</th>
                <th>Status</th>
                <th>view</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = $res->fetch_assoc()) { 

            $preview = "../templates/" . $row['preview_image'];
            if (!file_exists($preview)) {
                $preview = "../assets/no-preview.png";  // Fallback
            }
        ?>
            <tr>
                <td>
                    <img src="<?= $preview ?>" 
                         style="width:80px; height:auto; border:1px solid #ccc;">
                </td>

                <td><?= $row['template_name'] ?></td>
                <td><?= $row['designer_name'] ?> (ID: <?= $row['designer_id'] ?>)</td>
                <td><?= $row['created_at'] ?></td>
                <td>
                    <span class="badge bg-<?php echo ($row['status']=='approved') ? 'success' : 'warning'; ?>">
                        <?= ucfirst($row['status']) ?>
                    </span>
                </td>

                <td>
                    <a href="show_template_for_admin.php?id=<?= $row['id'] ?>"><div class="view-icon"></div></a>
                </td>

                <td>
                    <a href="delete_template.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this template?')" ><div class="delete-icon"></div></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<?php include_once "../footer.php" ?>