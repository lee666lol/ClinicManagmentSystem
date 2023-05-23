<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
try{
    
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'leekx-wm19@student.tarc.edu.my';                     
    $mail->Password   = '001020011861'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    
    $mail->setFrom('manjk-wm19@student.tarc.edu.my');
    
    $mail->addAddress("$email");
    
    $mail->isHTML(true);
    
    $mail->Subject = "Reset Password Successfully!";
    
    $mail->Body = "You have successfully to reset the password for this account!";
    
    if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                // Notification
                echo "<script>alert ('Please check your email (including spam) to see the reset password and use it to login.');</script>";
                echo "<script>";
                echo "window.location = '../Login&RegisterModule/LoginStaff.php';";
                echo "</script>";
            }
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>