<?php 
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user_type'])) {
    header("location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtifyMe</title>

    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
            <ul class="navbar-nav ms-auto">

                <?php if ($_SESSION['user_type'] == "user") { ?>
                    <li class="nav-item"><a class="nav-link" href="../3user_dashboard/profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="../3user_dashboard/dashboard.php">User Dashboard</a></li>
                    <div>
                        <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
                    </div>
                <?php } ?>

                <?php if ($_SESSION['user_type'] == "designer") { ?>
                    <li class="nav-item"><a class="nav-link" href="../2designer_dashboard/designer_dashboard.php">Designer Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="../2designer_dashboard/profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
                <?php } ?>

                <?php if ($_SESSION['user_type'] == "admin") { ?>
                    <li class="nav-item"><a class="nav-link" href="../1admin_dashboard/admin_dashboard.php">Admin Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="../1admin_dashboard/profile.php">Profile</a></li>
                    <li class="nav-item logout"><a class="nav-link" href="../logout.php">Logout</a></li>
                <?php } ?>

            </ul>
        </div>
        <div class="hero">
            
            <div class="content">

