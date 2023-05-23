<?php
session_start();
    
    include("../Database/db.php");
    include("../Database/function.php");
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if(!empty($email)&& !empty($password)){
            $query = "Select * from patients where email = '$email' limit 1";
            $result = mysqli_query($con,$query);
            
        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] == $password){
                    $_SESSION['patient_id'] = $user_data['patient_id'];
                     
                         header("Location: ../MainMedicalPage.php");
                      
                    die;
                    }
                   
                }
            
        }
            echo "<script>alert('Wrong email or password!')</script>";
        }else{
            echo "<script>alert('Please insert valid information')</script>";
        }    
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <<link rel="stylesheet" href="../Css&js/LoginPatientDesign.css"/>
    </head>
    <body>
        <style type="text/css">
            
      
        </style>
        
        <div id="box">
            <form method="post">
                <div style="font-size: 20px; margin: 10px; text-align: center">Login</div>
                <input id="text" type="text" name="email" placeholder="Email">
                <input id="text" type="password" name="password" placeholder="Password" required="Please enter the password"/>

                <input id="button" type="submit" value="login">
                <br>
                   <br>
                <a href="../Login&RegisterModule/forgot_password_patient.php">Forgot Password?</a><br><br>
                
                <a href="../Login&RegisterModule/signup.php">Signup</a><br><br>

            </form>
        </div>
        

    </body>
</html>

