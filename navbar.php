<?php 
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user_type'])) {
    header("location: ../login.php");
    exit;
}

    $name = ($_SESSION['name']);
    $profileLetter = strtoupper($name[0]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtifyMe</title>

    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/designerStyles.css">
    <link rel="stylesheet" href="../styles/adminStyles.css">
    <link rel="stylesheet" href="../styles/userStyles.css">
    <link rel="stylesheet" href="../styles/editor.css">
    <link rel="stylesheet" href="../styles/template.css">
    <link rel="stylesheet" herf="../styles/show_template_for_admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="topbar d-flex align-items-center px-4">
    <div class="flex-grow-1"></div>
    
    <div class="searchbar d-flex align-items-center me-auto">
        <i class="bi bi-search search-icon ms-2"></i>
        <input type="text" class="form-control border-0" placeholder="Search template...">
    </div>
    <div class="flex-grow-1"></div>
    
    <div class="d-flex align-items-center">
        <div class="logo me-2"></div>
        <div class="text">
            <p class="artifyme-text mb-0">ARTIFYME</p>
            <p class="theme-text mb-0">DESIGN YOUR DIGITAL SELF</p>
        </div>
    </div>

</div>


    <div class="container-fluid">
        <div class="sidebar">
            <!-- <ul class="navbar-nav ms-auto"> -->

                <?php if ($_SESSION['user_type'] == "user") { ?>
                    <div class="mb-5">
                        <a class="nav-link" href="profile.php"><div class="profile-icon"><?php echo $profileLetter ?></div></a>
                    </div>
                    <div>
                        <a class="nav-link" href="../3user_dashboard/user_dashboard.php">Home</a>
                        <a class="nav-link" href="../3user_dashboard/templates.php">Templates</a>
                        <a class="nav-link" href="#contact">Review/Contact Us</a>
                    </div>
                    <div class="mb-0 mt-auto">
                        <a class="nav-link fs-4 text-dark" href="../logout.php"><div class="logout-icon"></div></a>
                    </div>  
                <?php } ?>

                <?php if ($_SESSION['user_type'] == "designer") { ?>
                    <div class="mb-5">
                        <a class="nav-link" href=""><div class="profile-icon"><?php echo $profileLetter ?></div></a>
                    </div>
                    <div>
                        <a class="nav-link" href="../2designer_dashboard/designer_dashboard.php">Home</a>
                        <a class="nav-link" href="../2designer_dashboard/my_designs.php">My designs</a>
                        <a class="nav-link" href="../3user_dashboard/templates.php">Templates</a>
                    </div>
                    <div class="mb-0 mt-auto">
                        <a class="nav-link fs-4 text-dark" href="../logout.php"><div class="logout-icon"></div></a>
                    </div>  
                <?php } ?>

                <?php if ($_SESSION['user_type'] == "admin") { ?>
                    <div class="mb-5">
                        <a class="nav-link" href=""><div class="profile-icon-admin"><?php echo $name ?></div></a>
                    </div>
                    <div>
                        <a class="nav-link" href="../1admin_dashboard/admin_dashboard.php">Home</a>
                        <a class="nav-link" href="../1admin_dashboard/user_details.php">User Data</a>
                        <a class="nav-link" href="../1admin_dashboard/designer_details.php">Designer Data</a>
                        <a class="nav-link" href="../1admin_dashboard/template_details.php">Template Data</a>
                    </div>
                    <div class="mb-0 mt-auto">
                        <a class="nav-link fs-4 text-dark" href="../logout.php"><div class="logout-icon"></div></a>
                    </div>   
                <?php } ?>

            <!-- </ul> -->
        </div>
        <div class="hero">
            
            <div class="content">

