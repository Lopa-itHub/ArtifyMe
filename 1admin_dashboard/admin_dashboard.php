    <?php 
    include_once "../navbar.php"; 
    include "../dbConnect.php";


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
    ?>
    <div>
        <h1>Admin Dashboard</h1>
        <h3>Pending Templates</h3>
    </div>

    <?php
    // Fetch pending templates
    $sql = "SELECT * FROM templates WHERE status='pending'";
    $result = $con->query($sql);

    if ($result->num_rows == 0) {
        echo "<p>No pending templates.</p>";
    }

    while ($row = $result->fetch_assoc()) {

        // Correct preview path
        $previewPath = "../templates/" . $row['preview_image'];

        // If missing preview file → use placeholder
        if (!file_exists($previewPath) || empty($row['preview_image'])) {
            $previewPath = "assets/no-preview.png"; // Add a placeholder
        }

        echo "
        <div class='card'>
            <img class='preview' src='$previewPath' alt='Preview'>

            <div>
                <h4>{$row['template_name']}</h4>
                <p><b>Folder:</b> {$row['folder_name']}</p>
                <a class='approve-btn' href='admin_dashboard.php?approve_id={$row['id']}'>Approve</a>
            </div>
        </div>";
    }
    ?>
    
    <?php include_once "../footer.php"; ?>