<?php

include ("config.php");


if (isset($_POST['input'])) {
    $input = $_POST['input'];


    $sql = "SELECT * FROM register WHERE username LIKE '{$input}%' && role = 'student'";


    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) { ?>


        <table class="table table-bordered table-striped mt-4" style="cellspacing: 0;">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Reward Points</th>
                    <th>Add points</th>
                </tr>

            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($res)) {
                    $name = $row['username'];
                    $email = $row['email'];
                    $points = $row['points'];

                    ?>

                    <tr>
                        <td>
                            <?php echo $name; ?>
                        </td>
                        <td>
                            <?php echo $email; ?>
                        </td>
                        <td>
                            <?php echo $points; ?>
                        </td>
                        <td>
                            <form class="searchForm" action="addpoints.php" method="POST"">
                         <div class=" input-box2">
                                <input type="number" name="pointCount" placeholder="Points" required>
                                <input type='hidden' name='uname' value='<?php echo "$name"; ?>' />
                                <i class='bx bxs-envelope'></i>
                                </div>
                                <button type="submit" class="btn" style="float: right; margin-top: -40px;">Add Points</button>


                            </form>
                        </td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>

        </table>
        <?php
    } else {

        echo "<h6 class = 'text-danger text-center mt-3'> No students found </h6> ";
    }
}




?>