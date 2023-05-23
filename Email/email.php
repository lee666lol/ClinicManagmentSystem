<?php
try{
    
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'manjk-wm19@student.tarc.edu.my';                     
    $mail->Password   = 'vsfijtugjmwaqylo'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    
    $mail->setFrom('manjk-wm19@student.tarc.edu.my');
    
    $mail->addAddress("$email");
    
    $mail->isHTML(true);
    
    $mail->Subject = "Register Successfully!";
    
    $mail->Body = "You have successfully registering in our website!";
    
    if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                // Notification
                echo "<script>alert ('Please check your email (including spam) to see the reset password and use it to login.');</script>";
                echo "<script>";
                echo "window.location = 'customer_login.php';";
                echo "</script>";
            }
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


