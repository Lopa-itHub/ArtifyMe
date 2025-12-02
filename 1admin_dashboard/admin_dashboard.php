<?php 
include_once "../navbar.php"; 
include_once "../dbConnect.php";

if (!isset($_SESSION['id']) || !isset($_SESSION['user_type'])) {
    header("location: ../login.php");
    exit;
}

if ($_SESSION['user_type'] !== "admin") {
    header("location: ../login.php");
    exit;
}

if (isset($_GET['approve_id'])) {
    $id = intval($_GET['approve_id']);
    $con->query("UPDATE templates SET status='approved' WHERE id=$id");

    echo "<script>
            alert('Template Approved Successfully!');
            window.location='admin_dashboard.php';
          </script>";
    exit;
}

$total_users       = $con->query("SELECT COUNT(*) AS c FROM users WHERE user_type='user'")->fetch_assoc()['c'];
$total_designers   = $con->query("SELECT COUNT(*) AS c FROM users WHERE user_type='designer'")->fetch_assoc()['c'];
$total_templates   = $con->query("SELECT COUNT(*) AS c FROM templates")->fetch_assoc()['c'];
$pending_templates = $con->query("SELECT COUNT(*) AS c FROM templates WHERE status='pending'")->fetch_assoc()['c'];


$pendingList = $con->query("
    SELECT t.*, u.name AS designer_name
    FROM templates t 
    JOIN users u ON t.designer_id = u.id
    WHERE t.status='pending'
    ORDER BY t.created_at DESC
");

$recentList = $con->query("
    SELECT t.*, u.name AS designer_name 
    FROM templates t
    JOIN users u ON t.designer_id = u.id
    ORDER BY t.created_at DESC
    LIMIT 5
");
$recentCount = $recentList->num_rows;
?>

<style>
.dashboard-card {
    border-radius: 12px;
    padding: 20px;
    background: #fff;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.template-card {
    display: flex;
    gap: 15px;
    padding: 15px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 15px;
}
.template-card img {
    width: 90px;
    height: auto;
    border-radius: 8px;
    border: 1px solid #ccc;
}
.approve-btn {
    background: #28a745;
    color: #fff;
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
}
.approve-btn:hover {
    background: #218838;
}

.pending-wrapper {
    max-height: 420px;
    overflow-y: auto;
    padding-right: 10px;
}

.pending-wrapper::-webkit-scrollbar {
    width: 8px;
}
.pending-wrapper::-webkit-scrollbar-thumb {
    background: #bbb;
    border-radius: 10px;
}
.pending-wrapper::-webkit-scrollbar-thumb:hover {
    background: #999;
}
</style>

<div class="container mt-5">

    <h1 class="mb-5 text-center text-info">DASHBOARD</h1>

    <div class="row text-center mb-5">
        <div class="col-md-3 mb-3">
            <div class="dashboard-card">
                <h5>Total Users</h5>
                <h3><?= $total_users ?></h3>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="dashboard-card">
                <h5>Total Designers</h5>
                <h3><?= $total_designers ?></h3>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="dashboard-card">
                <h5>Total Templates</h5>
                <h3><?= $total_templates ?></h3>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="dashboard-card">
                <h5>Pending Approval</h5>
                <h3><?= $pending_templates ?></h3>
            </div>
        </div>
    </div>

    <h3 class="mb-3">Pending Templates</h3>

    <?php if ($pending_templates == 0): ?>

        <div class="alert alert-success">🎉 All templates are approved!</div>

    <?php else: ?>

        <div class="pending-wrapper">

            <?php while ($row = $pendingList->fetch_assoc()):

                $preview = "../templates/" . $row['preview_image'];
                if (!file_exists($preview) || empty($row['preview_image'])) {
                    $preview = "../assets/no-preview.png";
                }
            ?>
                <div class="template-card">
                    <img src="<?= $preview ?>" alt="Preview">

                    <div>
                        <h5><?= $row['template_name'] ?></h5>
                        <p><b>Designer:</b> <?= $row['designer_name'] ?></p>
                        <p><b>Uploaded:</b> <?= date("d M Y, h:i A", strtotime($row['created_at'])) ?></p>

                        <a class="approve-btn" href="admin_dashboard.php?approve_id=<?= $row['id'] ?>">Approve</a>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>

    <?php endif; ?>



    <!-- RECENT TEMPLATES -->
    <h3 class="mt-5 mb-3">Recent Template Uploads</h3>

    <?php if ($recentCount == 0): ?>

        <div class="alert alert-info">
            📭 No recent uploads yet.
        </div>

    <?php else: ?>

        <?php while ($row = $recentList->fetch_assoc()):

            $preview = "../templates/" . $row['preview_image'];
            if (!file_exists($preview) || empty($row['preview_image'])) {
                $preview = "../assets/no-preview.png";
            }
        ?>
            <div class="template-card">
                <img src="<?= $preview ?>">
                <div>
                    <h5><?= $row['template_name'] ?></h5>
                    <p><b>Designer:</b> <?= $row['designer_name'] ?></p>
                    <p><b>Uploaded:</b> <?= date("d M Y, h:i A", strtotime($row['created_at'])) ?></p>
                </div>
            </div>
        <?php endwhile; ?>

    <?php endif; ?>

</div>

<?php include_once "../footer.php"; ?>
