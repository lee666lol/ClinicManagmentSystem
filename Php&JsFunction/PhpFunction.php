<?php
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
    require('../Database/db.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['StaffId'])) {
        $StaffId   = $_POST['StaffId']; 
        $Staffname = $_POST['StaffName'];
        $Password  = $_POST['Password'];
        $Email     = $_POST['Email'];
        $Address   = $_POST['Address'];
        $Phone     = $_POST['Phone'];
        $Age       = $_POST['Age'];
        $Possition = $_POST['Possition'];
        $Status    = $_POST['Status'];
        $StaffImage = $_FILES["StaffImage"]["name"];
        $tempname = $_FILES["StaffImage"]["tmp_name"];
        $folder = "../Image/" . $StaffImage;
        $created_datetime = date("d-m-Y H:i:s");
        
        $query    = "INSERT into `staff` (StaffId, StaffName, Password, Email, Address, Phone, Age, Possition, Status, StaffImage, created_datetime)
                     VALUES ('$StaffId', '$Staffname', '" .($Password) . "', '$Email', '$Address', '" .($Phone) . "', '" .($Age) . "', '$Possition', '$Status', '$folder', '$created_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo '<script>';
            echo 'document.getElementById("Register_Form").style.display = "none";';
            echo '</script>';
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='../Login&RegisterModule/LoginStaff.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='../Login&RegisterModule/RegisterStaff.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>

    <?php 
    
    } 
    ?>

