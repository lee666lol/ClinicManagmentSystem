<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include("../Database/db.php");
echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $gender = isset($_POST["gender"])? $_POST["gender"] : "";
    $ic = isset($_POST["ic"]) ? $_POST["ic"] : "";
    $password = isset($_POST["password"]) ?$_POST["password"] : "";
    $address = isset($_POST["address"])? $_POST["address"] : "";
    $age = isset($_POST["age"]) ? $_POST["age"] : "";
    $error = "";
    
    
    
    if ($username === "") {
        $error = "Username is empty!";
    }
    
    if ($email === "") {
        $error = "Email is empty!";
    }
    
    if ($phone === "") {
        $error = "Phone is empty!";
    }
    
    if ($gender === "") {
        $error = "Gender is empty!";
    }
    
    if ($ic === "") {
        $error = "Ic is empty!";
    }
    
    if ($password === "") {
        $error = "Password is empty!";
    }
    
    if ($address === "") {
        $error = "Address is empty!";
    }
    
    if ($age === "") {
        $error = "Age is empty!";
    }
    
    if ($error != null) {
        header("Location: RegisterPatient.php?error=$error");
        exit();
    }
   
    ;
    
    $checkEmailExist = "Select * from patients WHERE email='$email'";
    $checkRowExist = $con->query($checkEmailExist)->num_rows;
    
    if ($checkRowExist > 0) {
        $error = "Email exist!";
        header("Location: RegisterPatient.php?error=$error");
        die;
    }
    
    $checkNumRows = "Select * from patients";
    
    $numrows = $con->query($checkNumRows)->num_rows;
    $s_number = str_pad( $numrows, 3, "0", STR_PAD_LEFT );
    $insertPatientQuery = "INSERT INTO Patients (patient_id, password, username, gender, ic_number, email, phone_num, address, age) VALUES "
            . "('P$s_number', '$password', '$username', '$gender', '$ic', '$email', '$phone', '$address', '$age')";
    
    $query = $con->query($insertPatientQuery);

    if ($query === TRUE) {

        header("Location: LoginPatient.php");
        
    }
}

?>