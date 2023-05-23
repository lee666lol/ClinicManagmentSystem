<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

          require('../Database/db.php');
          session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['DoctorId'])) {
        $DoctorId = stripslashes($_REQUEST['DoctorId']);    // removes backslashes
        $DoctorId = mysqli_real_escape_string($con, $DoctorId);
        $Password = stripslashes($_REQUEST['Password']);
        $Password = mysqli_real_escape_string($con, $Password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `doctor` WHERE DoctorId='$DoctorId'
                     AND Password='" .($Password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        
        if ($rows == 1) {
            $_SESSION['DoctorId'] = $DoctorId;
            // Redirect to user dashboard page
            header("Location: ../DoctorModule/DoctorControlPanel.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect DoctorId/password.</h3><br/>
                  <p class='link'>Click here to <a href='LoginDoctor.php'>Login</a> again.</p>
                  </div>";
        }
    }
    

?>