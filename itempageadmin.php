<?php
session_start();
if (!$_SESSION['admincheck']) {
    header('Location: home.php');
    exit();
}
if (isset($_SESSION['loggedin'])) {
} else {
    header('Location: index.html');
    exit();
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Reward Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style4.css">
    <a href="home.php" class="backbutton">Return Home↩</a>
</head>

<body>

    <div class="container">

        <?php

        include ('config.php');

        $sql = "SELECT * FROM rewards";

        $res = mysqli_query($conn, $sql);


        while ($row = mysqli_fetch_assoc($res)) {
            $name = $row['name'];
            $description = $row['description'];
            $points = $row['points'];
            $url = $row['url'];

            ?>


            <div class="card">
                <img src="Images/<?php echo $url; ?>">
                <div class="card-content">
                    <h3>
                        <?php echo $name; ?>
                    </h3>
                    <p>
                        <?php echo $description; ?>
                    </p><br>
                    <a href="" class="card-button">Available to students for
                        <?php echo $points; ?> points
                    </a> </br></br>


                    <form action="removecard.php" method="POST">
                        <button type="submit" class="card-button2">Remove Reward</button>
                        <input type='hidden' name='rewardname' value='<?php echo "$name"; ?>' />
                        <input type='hidden' name='urlsend' value='<?php echo "$url"; ?>' />
                    </form>

                </div>

            </div>

            <?php
        }
        ?>







    </div>

</body>

</html>