<?php
session_start();
if (!isset($_POST['password'])) {
    header('location: index.html');
} else if ($_POST['password'] != $_POST['passwordc']) {
    $cctoken = $_SESSION['token'];
    echo ("<script>alert('Passwords do not match. Please try again')</script>");
    echo ("<script>window.location = 'reset.php?token=$cctoken';</script>");
} else {
    $localpass = $_POST['password'];

    include ("config.php");

    $localemail = $_SESSION['cemail'];
    $sql = "UPDATE register SET password = '$localpass' WHERE email = '$localemail'";
    mysqli_query($conn, $sql);
    $sqlg = "UPDATE register SET token = '' WHERE email = '$localemail'";
    mysqli_query($conn, $sqlg);
    echo ("<script>alert('Password successfully changed!')</script>");
    echo ("<script>window.location = 'index.html';</script>");

}
?>