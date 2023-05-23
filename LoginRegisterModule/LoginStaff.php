<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Staff</title>
        <link rel="stylesheet" href="../Css&js/Register&LoginStaffDesign.css"/>
    </head>
    <body>
        <?php
          require('../Database/db.php');
          session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['StaffId'])) {
        $StaffId = stripslashes($_REQUEST['StaffId']);    // removes backslashes
        $StaffId = mysqli_real_escape_string($con, $StaffId);
        $Password = stripslashes($_REQUEST['Password']);
        $Password = mysqli_real_escape_string($con, $Password);
        // Check user is exist in the database
        $Password = ($Password);
        $query    = "SELECT * FROM `staff` WHERE StaffId='$StaffId'
                     AND Password='" .($Password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['StaffId'] = $StaffId;
            // Redirect to user dashboard page
            header("Location: ../StaffModule/StaffMenuControl.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect StaffId/password.</h3><br/>
                  <p class='link'>Click here to <a href='LoginStaff.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="StaffId" placeholder="Staff ID" autofocus="true"/>
        <input type="password" class="login-input" name="Password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="ForgetPassword.php?isStaff=true">Reset Password</a></p>
        <p class="link"><a href="RegisterStaff.php">New Registration</a></p>
  </form>
<?php
    }
?>
        
    </body>
</html>
