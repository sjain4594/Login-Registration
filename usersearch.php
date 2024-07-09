<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    $printusername = $_SESSION['message'];
} else {
    header('Location: index.html');
    exit();
}
if ($_SESSION['admincheck'] == false) {
    header('Location: home.php');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>



    <title> Search</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    <a href="home.php" class="backbutton">Return Home↩</a>
</head>


<body style=" display: block; align-content: center;">
    <div class="conS" style: "position: absolute;">

        <h2>Search for student here</h2>


        <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search...">
    </div>

    <div class="wrapper2" style="position: absolute; margin-left: 0px;">
        <div id="searchresult">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        </div>
        <script type="text/javascript">
            $(document).ready(function () {

                $("#live_search").keyup(function () {

                    var input = $(this).val();

                    if (input != "") {
                        $.ajax({

                            url: "livesearch.php",
                            method: "POST",
                            data: { input: input },

                            success: function (data) {
                                $("#searchresult").html(data);
                                $("#searchresult").css("display", "block");
                            }

                        });
                    } else {

                        $("#searchresult").css("display", "none");
                    }
                });
            });
        </script>


</body>

</html>