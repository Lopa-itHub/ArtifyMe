<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    require_once "dbConnect.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM users WHERE email=?";
    $stmt = $con->prepare($qry);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "invalid";
        exit;
    }

    $user = $result->fetch_assoc();

    if ($user['password'] !== $password) {
        echo "invalid";
        exit;
    }

    session_start();
    $_SESSION['id'] = $user['id'];
    $_SESSION['user_type'] = $user['user_type'];
    $_SESSION['name'] = $user['name'];

    echo $user['user_type'];
    exit;
}
?>
