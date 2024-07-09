<?php

session_start();
if (isset($_SESSION['loggedin']) && isset($_POST['uname'])) {

    include ("config.php");

    $username = $_POST['uname'];
    $rewardname = $_POST['rewardname'];


    $detemail = "UPDATE pending SET status = 'completed' WHERE rewardname = '$rewardname' && username = '$username'";
    $query = mysqli_query($conn, $detemail);
    echo ("<script>alert('Reward successfully confirmed!')</script>");
    echo ("<script>window.location = 'home.php';</script>");




} else {
    header('Location: index.html');
    exit();
}
?>