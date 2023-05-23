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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
        $query    = "SELECT * FROM `staff` WHERE StaffId='$StaffId'
                     AND Password='" .($Password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['StaffId'] = $StaffId;
            // Redirect to user dashboard page
            header("Location: ../StaffModule/StaffControlPanel.php");
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
        <input type="text" class="" name="StaffId" placeholder="Staff ID" autofocus="true"/>
        <input type="password" class="login-input" name="Password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="../Login&RegisterModule/ForgetPasswordStaff.php">Reset Password</a></p>
        <p class="link"><a href="../Login&RegisterModule/RegisterStaff.php">New Registration</a></p>
  </form>
<?php
    }
?>
        ?>
    </body>
</html>
