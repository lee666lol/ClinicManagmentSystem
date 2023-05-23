<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
    <form class="form" method="post" name="login" action="processDoctorLogin.php">
        <h1 class="login-title">Login</h1>
        <input value="true" name="isDoctor" hidden>
        <input type="text" class="login-input" name="DoctorId" placeholder="Doctor ID" autofocus="true"/>
        <input type="password" class="login-input" name="Password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="ForgetPassword.php?isDoctor=true">Reset Password</a></p>
        <p class="link"><a href="RegisterDoctor.php">New Registration</a></p>
  </form>
<?php
    
?>

    </body>
</html>
