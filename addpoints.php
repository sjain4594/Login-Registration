<?php

session_start();
if (isset($_SESSION['loggedin']) && isset($_POST['uname'])) {




    include ("config.php");


    $name = $_POST['uname'];
    $point = $_POST['pointCount'];
    echo "<script>console.log('" . $point . " " . $name . "' );</script>";

    $addPoints = "UPDATE register SET points = $point + points WHERE username = '$name'";
    mysqli_query($conn, $addPoints);

    echo ("<script>alert('$point points added successfully to $name')</script>");
    echo ("<script>window.location = 'usersearch.php';</script>");


} else {
    header('Location: index.html');
    exit();
}
?>