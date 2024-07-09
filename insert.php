<?php
session_start();
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $code = $_POST['code'];

    if (strcmp($role, "admin") == 0 and $code != 2008) {
        echo ("<script>alert('Incorrect admin code. If you are not an admin, please register as a student instead. ')</script>");
        echo ("<script>window.location = 'register.html';</script>");

    } else {

        include ("config.php");

        $sql = "SELECT * FROM register WHERE username = '$username' || email = '$email'";
        $res = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($res);

        if ($num >= 1) {
            echo ("<script>alert('Already Registered! Please log-in')</script>");
            echo ("<script>window.location = 'index.html';</script>");
        } else {
            $sql2 = "INSERT INTO register(username, password, email, points, role, token) VALUES ('$username', '$password', '$email',0, '$role', '')";
            if (mysqli_query($conn, $sql2)) {
                echo ("<script>alert('Thank you for registering! Please login now!')</script>");
                echo ("<script>window.location = 'index.html';</script>");
            }
            mysqli_close($conn);


        }


    }
} else {
    header('location: register.html');
}

?>