<?php
session_start();
if (isset($_POST['username'])){
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$role = $_POST['role'];
 $host = "localhost";
    $dbUsername = "id21644756_marsh";
    $dbPassword = "Rockburn1!";
    $dbname = "id21644756_details";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    $sql = "SELECT * FROM register WHERE username = '$username' || email = '$email'";
    $res = mysqli_query($conn, $sql);
        
    $num = mysqli_num_rows($res);
        
    if($num >= 1){
        echo("<script>alert('Already Registered! Please log-in')</script>");
        echo("<script>window.location = 'index.html';</script>");
    }
 else {
        $sql2 = "INSERT INTO register(username, password, email, role, token) VALUES ('$username', '$password', '$email', '$role', '')";
        if (mysqli_query($conn, $sql2)) {
                  echo("<script>alert('Thank you for registering!')</script>");
        echo("<script>window.location = 'index.html';</script>");

        }
        mysqli_close($conn);

      
     }

}else{
    header('location: register.html');
}

?>