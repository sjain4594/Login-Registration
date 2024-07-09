<?php
session_start();

include ("config.php");

$checktoken = $_GET['token'];
$sql = "SELECT * FROM register WHERE token = '$checktoken'";
$res = mysqli_query($conn, $sql);

$num = mysqli_num_rows($res);
if ($num != 1) {
    echo "<script>window.location.href='index.html';</script>";
    exit();
}
$_SESSION['token'] = $checktoken;
$detemail = "SELECT email FROM register WHERE token ='$checktoken'";
$query = mysqli_query($conn, $detemail);
$row = mysqli_fetch_assoc($query);
$_SESSION['cemail'] = $row['email'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="stylereg.css?verison=20">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>

    <div class="wrapper">
        <form action="changepass.php" method="POST">
            <h1>Reset Password</h1>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="passwordc" placeholder="Confirm Password" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <button type="submit" class="btn">Change Password</button>

            <div class="register-link">
                <p><a href="index.html">
                        Go Back Home</a></p>
            </div>
        </form>
    </div>
</body>

</html>