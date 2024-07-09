<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Reward</title>
    <link rel="stylesheet" href="stylereg.css?version=200">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <a href="home.php" class="backbutton">Return Home↩</a>


</head>

<body>

    <div class="wrapper">
        <form action="insertreward.php" method="POST" enctype="multipart/form-data"">
            <h1>Add a Reward</h1>
            
            <div class=" input-box">
            <input type="text" name="named" placeholder="Reward Name" required>

    </div>
    <div class="input-box">
        <input type="text" name="description" placeholder="Description" required>
    </div>
    <div class="input-box">
        <input type="text" name="points" placeholder="Point Value" required>

    </div>
    <div class="input-box">
        <input type="file" name="image" placeholder="file" required><br><br><br><br><br>
        <a></a>
    </div>

    <button type="submit" class="btn">Add Reward</button>

    </form>
    <div class="register-link">
        <p><a href="home.php">
                Go Back Home</a></p>
    </div>
    </div>

</body>

</html>