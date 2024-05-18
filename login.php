<?php
session_start();
$password = $_POST['password'];
$name = $_POST['username'];
$host = "localhost";
$dbUsername = "id21644756_marsh";
$dbPassword = "Rockburn1!";
$dbname = "id21644756_details";
//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

$sql = "SELECT * FROM register WHERE username = '$name' && password = '$password'";
$res = mysqli_query($conn, $sql);
        
$num = mysqli_num_rows($res);
        
if($num == 1){
    $_SESSION['message'] = $name;
    $_SESSION['loggedin'] = true;
    header('location:home.php');
} else{
    echo("<script>alert('Inccorect username/password')</script>");
    echo("<script>window.location = 'index.html';</script>");

}

mysqli_close($conn);




?>