<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Control</title>
        <link rel="stylesheet" href="../Css&js/LoginControlDesign.css"/>
    </head>
    <body>
        
        <form class="form" action="processPatientLogin.php" method="post">
            <h3 style="text-align: center">Welcome to our L&M Clinic Center</h3>
            <button type=button class="button"onClick="location.href='LoginPatient.php'">Login Customer</button>
            <br>
            <br>
            <button type=button class="button"onClick="location.href='LoginStaff.php'">Login Staff</button>
        </form>
        
    </body>
</html>