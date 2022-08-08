<?php
session_start();
// Xác nhận email 
include 'config.php';
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM customers WHERE token='$token' LIMIT 1";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE customers SET verified=1 WHERE token='$token'";
        $result = $conn->query($query);
        if ($result) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = true;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = 'alert-success';
            header("location:../login.php"); 
            exit(0);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}
