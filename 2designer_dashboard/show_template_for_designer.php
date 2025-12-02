<?php
include_once "../navbar.php";
include "../dbConnect.php";

if (!isset($_GET['id'])) {
    die("Template ID missing!");
}

$id = intval($_GET['id']);

// Fetch only template details (no designer info)
$q = $con->prepare("
    SELECT *
    FROM templates
    WHERE id = ?
");
$q->bind_param("i", $id);
$q->execute();
$result = $q->get_result();

if ($result->num_rows == 0) {
    die("Template not found!");
}

$template = $result->fetch_assoc();

// Preview path
$preview = "../templates/" . $template['preview_image'];
if (!file_exists($preview) || empty($template['preview_image'])) {
    $preview = "../assets/no-preview.png";
}
?>

<div class="card-wrapper-admin w-50 mx-auto mt-0">

    <div class="template-card-admin">

        <!-- Larger Image -->
        <img src="<?= $preview ?>" alt="Template Preview" height="450px" width="400px">

        <!-- Details under the image -->
        <div class="card-body-admin">
            <div class="template-title-admin"><?= $template['template_name'] ?></div>

            <!-- Created At -->
            <p class="info-item-admin">
                <b>Uploaded On:</b> 
                <?= date("d M Y, h:i A", strtotime($template['created_at'])) ?>
            </p>

            <a href="my_designs.php" class="btn btn-primary w-100 mt-3">Back</a>
        </div>

    </div>

</div>

<?php include_once "../footer.php"; ?>
