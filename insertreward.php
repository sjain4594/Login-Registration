<?php
if (isset($_POST['named'])) {
    include ('config.php');
    $name1 = $_POST['named'];
    $description1 = $_POST['description'];
    $points1 = $_POST['points'];

    $file_name = $_FILES['image']['name'];
    echo ("<script>alert('$file_name')</script>");

    $tempname = $_FILES['image']['tmp_name'];

    $folder = 'Images/' . $file_name;
    $sql2 = "INSERT INTO rewards(name, description, points, url) VALUES ('$name1', '$description1', '$points1', '$file_name')";

    $query = mysqli_query($conn, $sql2);
    if (move_uploaded_file($tempname, $folder)) {
        echo ("<script>alert('Reward successfully added!')</script>");
        echo ("<script>window.location = 'home.php';</script>");
    } else {
        echo ("Unsuccessful reward upload.");
    }
} else {
    header('location: index.html');
}

?>