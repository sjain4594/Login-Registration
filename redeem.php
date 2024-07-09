<?php

session_start();
if (isset($_SESSION['loggedin']) && isset($_POST['rewardname'])) {




    include ("config.php");

    $rewardname = $_POST['rewardname'];
    $point = $_POST['pointvalue'];
    $username = $_SESSION['message'];




    $detemail = "SELECT points FROM register WHERE username ='$username'";
    $query = mysqli_query($conn, $detemail);
    $row = mysqli_fetch_assoc($query);
    $pointreq = $row['points'];

    $detemail = "SELECT description FROM rewards WHERE name ='$rewardname'";
    $query = mysqli_query($conn, $detemail);
    $row = mysqli_fetch_assoc($query);
    $description = $row['description'];

    if ($point > $pointreq) {
        echo ("<script>alert('You do not have enough points to redeem this reward.')</script>");
        echo ("<script>window.location = 'itempage.php';</script>");
    } else {
        $addPoints = "UPDATE register SET points = points - $point WHERE username = '$username'";
        $date = date('m/d/Y');
        $insertPending = "INSERT INTO pending(username, rewardname, description, points, status, date) VALUES ('$username', '$rewardname', '$description', '$point', 'pending', '$date')";
        mysqli_query($conn, $addPoints);
        mysqli_query($conn, $insertPending);

        echo ("<script>alert('Reward successfully redeemed!')</script>");
        echo ("<script>window.location = 'home.php';</script>");
    }




} else {
    header('Location: index.html');
    exit();
}
?>