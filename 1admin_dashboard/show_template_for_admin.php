<?php
include_once "../navbar.php";
include "../dbConnect.php";

if (!isset($_GET['id'])) {
    die("Template ID missing!");
}

$id = intval($_GET['id']);

$q = $con->prepare("
    SELECT t.*, u.name AS designer_name, u.email AS designer_email
    FROM templates t
    JOIN users u ON t.designer_id = u.id
    WHERE t.id = ?
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
    $preview = "assets/no-preview.png";
}
?>

<div class="card-wrapper-admin w-50 mx-auto mt-0">

    <div class="template-card-admin">

        <!-- Larger Image -->
        <img src="<?= $preview ?>" alt="Template Preview" height="450px" width="400px">

        <!-- Details under the image -->
        <div class="card-body-admin">
            <div class="template-title-admin"><?= $template['template_name'] ?></div>

            <p class="info-item-admin"><b>Designer:</b> <?= $template['designer_name'] ?></p>
            <p class="info-item-admin"><b>Email:</b> <?= $template['designer_email'] ?></p>

            <a href="template_details.php" class="btn btn-primary w-100 mt-3">Back</a>
        </div>

    </div>

</div>




<?php include_once "../footer.php" ?>