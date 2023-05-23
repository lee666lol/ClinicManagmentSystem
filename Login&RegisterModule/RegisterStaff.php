<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register Staff</title>
        <link rel="stylesheet" href="../Css&js/Register&LoginStaffDesign.css"/>
    </head>
    <body>
      
      <form class="form" id="Register_Form" action="" method="post" enctype="multipart/form-data">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="StaffId" placeholder="Staff Id" required />
        <input type="text" class="login-input" name="StaffName" placeholder="Staff Name" required/>
        <input type="password" class="login-input" name="Password" placeholder="Password" required/>
        <input type="text" class="login-input" name="Email" placeholder="Email" required/>
        <input type="text" class="login-input" name="Address" placeholder="Address" required/>
        <input type="text" class="login-input" name="Phone" placeholder="Phone Number" required/>
        <input type="text" class="login-input" name="Age" placeholder="Age" required/>
        <input type="text" class="login-input" name="Possition" placeholder="Possition" required/>
        <input type="text" class="login-input" name="Status" placeholder="Status" required/>
        <input type="file" class="form-control" name="StaffImage" placeholder="Staff Image" required/>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="../Login&RegisterModule/LoginStaff.php">Click to Login</a></p>
    </form>
  <?php
     require('../Database/db.php');
     include '../Php&jsFunction/PhpFunction.php';
?>
    </body>
</html>
