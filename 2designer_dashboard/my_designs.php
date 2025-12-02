<?php
include_once "../navbar.php";
include "../dbConnect.php";


$designer_id = $_SESSION['id'];  // Ensure designer is logged in

$sql = "
    SELECT t.*, u.name AS designer_name
    FROM templates t
    JOIN users u ON t.designer_id = u.id
    WHERE t.designer_id = ?
    ORDER BY t.created_at DESC
";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $designer_id);
$stmt->execute();
$result = $stmt->get_result();  // FINAL RESULT
?>

<div class="container mt-4">
    <h1 class="mb-5 text-center text-info">Templates</h1>

    <table class="table table-bordered table-hover align-middle mt-3">
        <thead class="table-light">
            <tr>
                <th>Preview</th>
                <th>Template Name</th>
                <th>Designer</th>
                <th>Created At</th>
                <th>Status</th>
                <th>View</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = $result->fetch_assoc()) {

            // Preview file path
            $preview_file = "../templates/" . $row['preview_image'];
            if (!file_exists($preview_file) || empty($row['preview_image'])) {
                $preview = "../assets/no-preview.png";
            } else {
                $preview = $preview_file;
            }
        ?>
            <tr>
                <td>
                    <img src="<?= $preview ?>" 
                         style="width:80px; height:auto; border:1px solid #ccc;">
                </td>

                <td><?= $row['template_name'] ?></td>

                <td><?= $row['designer_name'] ?> (ID: <?= $row['designer_id'] ?>)</td>

                <td><?= date("d M Y, h:i A", strtotime($row['created_at'])) ?></td>

                <td>
                    <span class="badge bg-<?= ($row['status']=='approved') ? 'success' : 'warning'; ?>">
                        <?= ucfirst($row['status']) ?>
                    </span>
                </td>

                <td>
                    <a href="show_template_for_designer.php?id=<?= $row['id'] ?>">
                        <div class="view-icon"></div>
                    </a>
                </td>

                <td>
                    <a href="delete_template.php?id=<?= $row['id'] ?>" 
                       onclick="return confirm('Delete this template?')">
                        <div class="delete-icon"></div>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once "../footer.php"; ?>
