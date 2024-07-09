<?php

session_start();
if (isset($_SESSION['loggedin']) && isset($_POST['rewardname'])) {

    include ("config.php");

    $rewardname = $_POST['rewardname'];
    $url = $_POST['urlsend'];


    $detemail = "DELETE FROM rewards WHERE name = '$rewardname'";
    $query = mysqli_query($conn, $detemail);
    array_map('unlink', glob("Images/$url"));
    echo ("<script>alert('Reward successfully removed!')</script>");
    echo ("<script>window.location = 'itempageadmin.php';</script>");




} else {
    header('Location: index.html');
    exit();
}
?>