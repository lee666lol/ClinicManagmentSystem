<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include("../Database/db.php");
echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $error = "";
    $doctorId   = isset($_POST['doctorId']) ? $_POST['doctorId'] : ""; 
        $doctorname = isset($_POST['doctorName']) ? $_POST['doctorName'] : "";
        $Password  = isset($_POST['Password']) ? $_POST['Password'] : "";
        $Email     = isset($_POST['Email']) ? $_POST['Email'] : "";
        $Address   = isset($_POST['Address']) ? $_POST['Address'] : "";
        $Phone     = isset($_POST['Phone']) ? $_POST['Phone'] : "";
        $Age       = isset($_POST['Age']) ? $_POST['Age'] : "";
        $specialization = isset($_POST["Specialization"]) ? $_POST["Specialization"] : "";
        $Status    = isset($_POST['Status']) ? $_POST['Status'] : "";
        $StaffImage = $_FILES["StaffImage"]["name"];
        $tempname = $_FILES["StaffImage"]["tmp_name"];
        $folder = "../Image/" . $StaffImage;
        $created_datetime = date("d-m-Y H:i:s");
    
    
    if ($doctorId == "") {
    $error = "doctorId is empty!";
    }
    if ($doctorname == "") {
        $error = "doctorname is empty!";
    }
    if ($Password == "") {
        $error = "Password is empty!";
    }
    if ($Email == "") {
        $error = "Email is empty!";
    }
    if ($Address == "") {
        $error = "Address is empty!";
    }
    if ($Phone == "") {
        $error = "Phone is empty!";
    }
    if ($Age == "") {
        $error = "Age is empty!";
    }

    if ($Status == "") {
        $error = "Status is empty!";
    }
    
    if ($error != null) {
        header("Location: RegisterDoctor.php?error=$error");
        exit();
    }
  
    
    $checkEmailExist = "SELECT * FROM Doctor WHERE email='$Email'";
    $checkRowExist = $con->query($checkEmailExist)->num_rows;
    
    if ($checkRowExist > 0) {
        $error = "Email exist!";
        header("Location: RegisterDoctor.php?error=$error");
        die;
    }
    
    $rownum ="SELECT * FROM Doctor";
    $s = $con->query($rownum)->num_rows;
    $s_number = str_pad( $s, 10, "0", STR_PAD_LEFT );
    
    $query    = "INSERT into `doctor` (doctorName, Password, Email, Address, Phone, Age, specialization, Status, StaffImage, created_datetime)
                     VALUES ('D', '$doctorname', '" .($Password) . "', '$Email', '$Address', '" .($Phone) . "', '" .($Age) . "', '$specialization', '$Status', '$folder', '$created_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo '<script>';
            echo 'document.getElementById("Register_Form").style.display = "none";';
            echo '</script>';
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='LoginDoctor.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='RegisterDoctor.php'>registration</a> again.</p>
                  </div>";
        }
}

?>