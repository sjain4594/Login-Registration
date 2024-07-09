<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



session_start();

if (isset($_POST['email'])) {
    $printusername = $_POST['email'];

    $email = $_POST['email'];

    include ("config.php");


    $sql = "SELECT * FROM register WHERE email = '$email'";

    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);

    if ($num == 1) {
        $emailTo = $email;
        $subject = "Forgot password";
        $headers = 'From: ' . $_POST['email'];
        $token = bin2hex(random_bytes(16));
        $addtoken = "UPDATE register SET token = '$token' WHERE email = '$email'";
        mysqli_query($conn, $addtoken);

        require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is deprecated
        $mail->SMTPAuth = true;
        $mail->Username = 'hhsresources0@gmail.com'; // email
        $mail->Password = 'imci uenu enit zdli'; // password
        $mail->setFrom('hhsresources0@gmail.com', 'HHS Resources'); // From email and name
        $mail->addAddress($email); // to email and name
        $mail->Subject = 'Forgot Password for HHS Resources';
        $mail->msgHTML("Hello, thank you for visiting HHS Resources. Please click on this link
        to rest your password: https://hhsresources.hstn.me/reset.php?token=$token"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo ("<script>alert('Forget Password Message Sent Successfully! Please check your spam folder if you cannot find it.')</script>");
            echo ("<script>window.location = 'index.html';</script>");
        }

    } else {
        echo ("<script>alert('You don\'t have an account with us. Please sign up')</script>");
        echo ("<script>window.location = 'index.html';</script>");
    }

    mysqli_close($conn);

} else {
    header('location: index.html');
    die();
}

?>