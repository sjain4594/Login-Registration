<?php
$sessionTime = 365 * 24 * 60 * 60;
$sessionName = "";
session_set_cookie_params($sessionTime);
session_name($sessionName);
session_start();
if (isset($_COOKIE[$sessionName])) {
    setcookie($sessionName, $_COOKIE[$sessionName], time() + $sessionTime, "/");
}
$password = $_POST['password'];
$name = $_POST['username'];

include ("config.php");


$sql = "SELECT * FROM register WHERE username = '$name' && password = '$password'";
$res = mysqli_query($conn, $sql);

$num = mysqli_num_rows($res);

if ($num == 1) {

    $sql = "SELECT role FROM register WHERE username = '$name' && password = '$password' && role = 'admin'";

    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    if ($num == 1) {
        $_SESSION['admincheck'] = true;
    } else {
        $_SESSION['admincheck'] = false;
    }
    $_SESSION['message'] = $name;
    $_SESSION['loggedin'] = true;
    header('location:home.php');
} else {
    echo ("<script>alert('Inccorect username/password')</script>");
    echo ("<script>window.location = 'index.html';</script>");

}

mysqli_close($conn);




?>