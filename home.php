<?php
session_start();
if (isset($_SESSION['loggedin'])) {
  $printusername = $_SESSION['message'];
} else {
  header('Location: index.html');
  exit();
}
?>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="stylereg.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


  <?php
  if (!$_SESSION['admincheck']) {

    ?>
    <a href="" class="pointCheck">Your points:
      <?php
      include ('config.php');
      $username = $_SESSION['message'];

      $detemail = "SELECT points FROM register WHERE username ='$username'";
      $query = mysqli_query($conn, $detemail);
      $row = mysqli_fetch_assoc($query);
      $pointreq = $row['points'];
      echo $pointreq;
      ?>



    </a>

    <?php
  }
  ?>

</head>

<body>
  <div class="wrapper">






    <form action="usersearch.php">
      <h1>Welcome
        <?= $printusername; ?>!
      </h1>
      <?php
      if ($_SESSION['admincheck']) {
        ?>
        <br><button type="submit" class="btn">Give Points to a Student</button><br>


      <?php } ?>
    </form>



    <form action="addreward.php">
      <?php
      if ($_SESSION['admincheck']) {

        ?>
        <br><button type="submit" class="btn">Add a Reward</button>


      <?php } ?>
    </form>





    <form action="itempageadmin.php">
      <?php
      if ($_SESSION['admincheck']) {

        ?>
        <br><button type="submit" class="btn">See/Remove Current Rewards</button>


      <?php } ?>
    </form>



    <form action="itempage.php">
      <?php
      if (!$_SESSION['admincheck']) {

        ?>
        <br><button type="submit" class="btn">Redeem a Reward</button>


      <?php } ?>
    </form>




    <form action="pending.php">
      <?php
      if ($_SESSION['admincheck']) {

        ?>
        <br><button type="submit" class="btn">See Pending Rewards</button>


      <?php } ?>
    </form>

    <form action="studenthistory.php">
      <?php
      if (!$_SESSION['admincheck']) {

        ?>
        <br><button type="submit" class="btn">Your redeemed rewards</button>


      <?php } ?>
    </form>


    <div class="register-link">
      <p><a href="logout.php">Logout</a></p>
    </div>

  </div>




</body>


</html>