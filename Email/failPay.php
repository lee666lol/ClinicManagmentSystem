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
    
    $mail->addAddress("leekx-wm19@student.tarc.edu.my");
    
    $mail->isHTML(true);
    
    $mail->Subject = "Payment Cancel!";
    
    $mail->Body = "The paymet has been canceled!";
    
    if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } 
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


