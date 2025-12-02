<?php 
include_once "../navbar.php"; 
include_once "../dbConnect.php";


    if (!isset($_SESSION['id']) || !isset($_SESSION['user_type'])) {
        header("location: ../login.php");
        exit;
    }

    if ($_SESSION['user_type'] !== "designer") {
        header("location: ../login.php");
        exit;
    }

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $templateName = $_POST['template_name'];

    // Create unique folder
    $uniqueFolder = "template_" . time();
    $targetFolder = "../templates/" . $uniqueFolder;
    mkdir($targetFolder, 0777, true);

    // Upload ZIP
    $zipTemp = $_FILES['zipFile']['tmp_name'];
    $zipName = time() . "_" . $_FILES['zipFile']['name'];
    $zipPath = "../uploads/" . $zipName;

    if (move_uploaded_file($zipTemp, $zipPath)) {

        // Extract ZIP
        $zip = new ZipArchive;
        if ($zip->open($zipPath) === TRUE) {
            $zip->extractTo($targetFolder);
            $zip->close();
        }

        // AUTO DETECT FILES
        $templateFile = "";
        $schemaFile = "";

        $files = scandir($targetFolder);

        foreach ($files as $f) {
            if (strpos($f, ".html") !== false) {
                $templateFile = $f;
            }
            if (strpos($f, ".json") !== false) {
                $schemaFile = $f;
            }
        }

        // Detect preview image
        $previewImage = "";
        if (file_exists($targetFolder . "/preview.png")) {
            $previewImage = $uniqueFolder . "/preview.png"; // IMPORTANT FIX
        }

        $designerId = $_SESSION['id'];

        // Insert into DB
        $sql = "INSERT INTO templates 
                (template_name, folder_name, preview_image, template_file, schema_file,designer_id, status)
                VALUES (?, ?, ?,?, ?, ?, 'pending')";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssi", 
            $templateName,
            $uniqueFolder,
            $previewImage,
            $templateFile,
            $schemaFile,
            $designerId
        );

        if ($stmt->execute()) {
            $message = "Template uploaded successfully!";
        } else {
            $message = "DB Error: " . $con->error;
        }

    } else {
        $message = "Zip upload failed!";
    }
}
?>
    <div>
        <h1 class="text-center text-info mb-5">UPLOAD DESIGN</h1>

        <div class="box">
            <?php if ($message) echo "<p class='msg'>$message</p>"; ?>

            <h3>Upload Template (ZIP)</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="template_name" placeholder="Template Name" class="form-control" required><br>
                <input type="file" name="zipFile" accept=".zip" class="form-control" required><br>
                
                <button type="submit">Upload Template</button>
            </form>
        </div>

    </div>
    
<?php include_once "../footer.php"; ?>