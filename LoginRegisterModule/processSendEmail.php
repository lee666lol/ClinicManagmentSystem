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

    $isStaff = isset($_POST["isStaff"]) ? $_POST["isStaff"] : false;
    $isPatient = isset($_POST["isPatient"]) ? $_POST["isPatient"] : false;
    $isDoctor = isset($_POST["isDoctor"]) ? $_POST["isDoctor"] : false;
    
    
    $email = $_POST['email'];
    $token = random_bytes(32);
    
    if ($isPatient == true) {
        $checkEmailExistQuery = "Select * from patients where email='$email'";
        $checkEmailExist = mysqli_query($con,$checkEmailExistQuery);
    } 
    
    if ($isStaff == true) {
        $checkEmailExistQuery = "Select * from staff where email='$email'";
        $checkEmailExist = mysqli_query($con,$checkEmailExistQuery);
    }
    
    if ($isDoctor == true) {
        $checkEmailExistQuery = "Select * from doctor where email='$email'";
        $checkEmailExist = mysqli_query($con,$checkEmailExistQuery);
    }
    
    

    if ($checkEmailExist->num_rows > 0) {
        
         $deleteResetpass = "DELETE FROM resetPassword  WHERE rpEmail='$email'";
         if($con->query($deleteResetpass) === true){
        } else {
            $con->error;
        }
        
        $hexToken = bin2hex($token);
        $hashedToken = password_hash($hexToken, PASSWORD_DEFAULT);
        $newPasswordRequest = "INSERT INTO resetPassword (rpEmail, rpToken) VALUES ('$email', '$hashedToken')";
        $con->query($newPasswordRequest);
        $url = "http://localhost/ClinicManagmentSystem/LoginRegisterModule/ResetPassword.php?email=$email&token=$hexToken&isStaff=$isStaff&isPatient=$isPatient&isDoctor=$isDoctor";
        
        if($con->query($deleteResetpass) === true){
        } else {
            $con->error;
        }
        
        try {
            //Server settings                   //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'ngpl-wm19@student.tarc.edu.my';                     //SMTP username
            $mail->Password = '010512060509';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Sender
            $mail->setFrom('ngpl-wm19@student.tarc.edu.my');

            $mail->SMTPDebug = 2;
            $mail->addAddress("$email");   
            //$mail->addAddress('recipient@domain.tld', 'Receiver Name');//Add a recipient

            $mail->isHTML(true);                                 
            $mail->Subject = 'Password Reset';
            $mail->Body = '<p>Dear ' . $email . ',</p>
                
                <p>Please click on this link to reset password:</p> 
                <h3><u>' . $url . '</u></h3>
    
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
                echo "<script>window.location = '../LoginRegisterModule/LoginPatient.php'</script>";
                
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $error = "Email doesn't exist!";
        header("Location: ForgetPassword.php?error=$error");
    } 

?>