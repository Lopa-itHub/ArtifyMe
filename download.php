<?php

$templateId = $_GET['id'];

include "dbConnect.php";

$q = $con->prepare("SELECT * FROM template_dummy WHERE id=?");
$q->bind_param("i", $templateId);
$q->execute();
$t = $q->get_result()->fetch_assoc();

$folder = "templates/" . $t['folder_name'];

if (!isset($_POST['cleanHtml'])) {
    die("No HTML received.");
}

$body = $_POST['cleanHtml'];
$css  = file_get_contents("$folder/dummy.css");

// Build full HTML
$finalHtml = "
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<style>
@page { margin: 0; }
html, body { margin: 0; padding: 0; }
$css
</style>
</head>
<body>
$body
</body>
</html>
";

$tempHtml = "temp_" . time() . ".html";
file_put_contents($tempHtml, $finalHtml);

$outputPdf = "portfolio_" . time() . ".pdf";

$wkhtml = "\"C:\\Program Files\\wkhtmltopdf\\bin\\wkhtmltopdf.exe\"";

// EXACT PDF generation
$cmd = "$wkhtml --page-size A4 --margin-top 0 --margin-bottom 0 --margin-left 0 --margin-right 0 $tempHtml $outputPdf";
shell_exec($cmd);

// Download PDF
header("Content-Type: application/pdf");
header("Content-Disposition: attachment; filename=portfolio.pdf");
readfile($outputPdf);

unlink($tempHtml);
unlink($outputPdf);
?>
