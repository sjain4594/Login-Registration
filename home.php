<?php
  session_start(); 
  if (isset($_SESSION['loggedin'])){
    $printusername = $_SESSION['message'];
  }else{
    header('Location: index.html');
    exit();
  }
?>
<html>
<head>
    
<title> Home Page </title>
    <link rel="stylesheet" type="text/css" href="style.css">
          <link rel="stylesheet" type = "text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          >
</head>
<body>
    
    
    <div class="container">
    <a class="float-right" href="logout.php"> LOGOUT </a>
        <h1> Welcome <?= $printusername; ?> </h1>

    
    
    </div>
    
    
</body>


</html>