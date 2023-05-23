<?php
//session_start();
include '../Database/db.php';
include '../Database/generateRandPswFunc.php';

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files 
require '../PHPMailer/PHPMailer/src/Exception.php';
require '../PHPMailer/PHPMailer/src/PHPMailer.php';
require '../PHPMailer/PHPMailer/src/SMTP.php';

// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer();

if (isset($_POST["reset-btn"])) {
    $email = $_POST['email'];

    
    $query = "Select * from patients where email='$email'";
    $query_run = mysqli_query($con,$query);

    if ($query_run && mysqli_num_rows($query_run) > 0) {
        // existing user, proceed with reset password
        // generate a random code
        $code = generateRandomString();

        // Update password
        $query = "update patient set password='$code' where email = '$email'";
        $query_run = mysqli_query($con, $query);

        // Send email with the reset password
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'manjk-wm19@student.tarc.edu.my';                     //SMTP username
            $mail->Password = 'vsfijtugjmwaqylo';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Sender
            $mail->setFrom('manjk-wm19@student.tarc.edu.my');

            //Recipient
            $mail->addAddress("$email");     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password Reset';
            $mail->Body = '<p>Dear ' . $email . ',</p>
                
                <p>Please use this new password to login:</p> 
                <h3><u>' . $code . '</u></h3>
    
                Best wishes,
                <br>
                <hr>
                <p>Do not reply to this email.</p>';

            // Send email 
            if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                // Notification
                echo "<script>alert ('Please check your email (including spam) to see the reset password and use it to login.');</script>";
                echo "<script>";
                echo "window.location = '../Login&RegisterModule/LoginPatient.php';";
                echo "</script>";
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert ('Email does not exist!');</script>";
    }
}
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title>Forgot Password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"/>
    </head>
    <body style="background-color: ghostwhite;">
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <div class="container-sm mt-5">
            <h1 class="fw-bold text-center" style="color: black">Forgot Password</h1>
            <div class="row mt-3 d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 p-3 border rounded-4" style="background-color: whitesmoke">
                    <div class="h4 text-muted text-center pt-2">Please input your email for password reset.</div>
                    <form id="custForgotPswForm" method="post" action="forgot_password_patient.php">
                        <div class="mb-3 mt-4">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="true" autofocus="true">
                        </div>
                        <div class="d-grid pt-3 mb-2">
                            <button type="submit" id="reset-btn" name="reset-btn" class="btn btn-block fw-bold text-white rounded-pill text-uppercase btn-danger" >Send Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3 d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 pt-2">
                    <p style="text-align: center"><a href="../Login&RegisterModule/LoginPatient.php" class="fw-bold h4 text-dark" style="text-decoration: none">Return to Login</a></p>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
