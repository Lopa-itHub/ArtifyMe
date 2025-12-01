<?php 
include_once "../navbar.php"; 
include_once "../dbConnect.php";


    if (!isset($_SESSION['id']) || !isset($_SESSION['user_type'])) {
        header("location: ../login.php");
        exit;
    }

    if ($_SESSION['user_type'] !== "user") {
        header("location: ../login.php");
        exit;
    }
?>
    <div>
        <h1>User Dashboard</h1>
        <div class="container py-4">
    <h2 class="mb-4">Available Templates</h2>

    <?php
        $sql = "SELECT * FROM templates WHERE status='approved'";
        $res = $con->query($sql);

        if ($res->num_rows == 0) {
            echo "<p>No approved templates available.</p>";
        }

        while ($row = $res->fetch_assoc()) {

            // FIXED PREVIEW PATH
            $previewPath = "../templates/" . $row['preview_image'];

            if (!file_exists($previewPath) || empty($row['preview_image'])) {
                $previewPath = "assets/no-preview.png"; // OPTIONAL FALLBACK
            }

            echo "
            <div class='template-card'>
                <img src='$previewPath' alt='Preview'>
                <div>
                    <h4>{$row['template_name']}</h4>
                    <a href='editor.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit Template</a>
                </div>
            </div>";
        }
        ?>

    </div>
    </div>
    
    <?php include_once "../footer.php"; ?>