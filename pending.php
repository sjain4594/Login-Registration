<html>

<head>

    <title> Search</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <a href="home.php" class="backbutton">Return Home↩</a>
</head>


<body style=" display: block; align-content: center; color: white;">

    <div class="wrapper2" style="position: absolute; margin-left: 0px;">


        <?php
        include ("config.php");

        session_start();
        if ($_SESSION['admincheck']) {


            $sql = "SELECT * FROM pending ORDER BY status desc";

            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) { ?>


                <table class="table table-bordered table-striped mt-4" style="cellspacing: 0;">
                    <thead>
                        <tr>
                            <th>Redemption Date</th>
                            <th>Name</th>
                            <th>Reward Name</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                            $name = $row['username'];
                            $rewardname = $row['rewardname'];
                            $description = $row['description'];
                            $status = $row['status'];
                            $date = $row['date'];

                            ?>

                            <tr>
                                <td>
                                    <?php echo $date; ?>
                                </td>
                                <td>
                                    <?php echo $name; ?>
                                </td>
                                <td>
                                    <?php echo $rewardname; ?>
                                </td>
                                <td>
                                    <?php echo $description; ?>
                                </td>
                                <td>
                                    <?php

                                    if (strcmp($status, "pending") == 0) {

                                        ?>
                                        <form class="searchForm" action="removepending.php" method="POST"">
                        <input type='hidden' name='uname' value='<?php echo "$name"; ?>'/> 
                        <input type='hidden' name='rewardname' value='<?php echo "$rewardname"; ?>'/> 

                        <button type = " submit" class="btn">Reward Pending - Click to confirm delivered
                                            reward</button>
                                        </form>

                                    <?php
                                    } else {
                                        ?>
                                        Reward completed ✅
                                        <?php
                                    }
                                    ?>



                                </td>
                            </tr>

                            <?php
                        }
                        ?>
                    </tbody>

                </table>
                <?php
            } else {

                echo "<h6 class = 'text-danger text-center mt-3'> No pending rewards </h6> ";
            }
        } else {
            header("Location: index.html");
            exit();
        }

        ?>

    </div>

</body>

</html>