<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require('../Database/db.php');
$error = "";

$isStaff = isset($_POST["isStaff"]) ? $_POST["isStaff"] : false;
$isPatient = isset($_POST["isPatient"]) ? $_POST["isPatient"] : false;
$isDoctor = isset($_POST["isDoctor"]) ? $_POST["isDoctor"] : false;


if (isset($_POST["token"]) && isset($_POST["email"])) {
    $email = $_POST["email"];
    $token = $_POST["token"];
    $password = $_POST["password"];
    $reenterPassword = $_POST["reenterPassword"];
    $error = "";
    if ($password != $reenterPassword) {
        $error = "Password is not the same!";
        header("Location: ResetPasswordPatient.php?email=$email&token=$token&error=$error");
    } else {
        if ($isPatient == true) {
            $query = "UPDATE patients SET password = '$password' WHERE email='$email'";
        } else if ($isStaff == true) {
            $query = "UPDATE staff SET password = '$password' WHERE email='$email'";
        } else if ($isDoctor == true) {
            $query = "UPDATE doctor SET password = '$password' WHERE email='$email'";
        }
        $terminateUserPasswordChange = "DELETE FROM resetPassword WHERE rpEmail='$email'"; 
        $con->query($terminateUserPasswordChange);
        if ($con->query($query) === TRUE) {
            if ($isPatient == true) {
                header("Location: LoginPatient.php");
            } else if ($isStaff == true){
                header("Location: LoginStaff.php");
            } else if ($isDoctor == true) {
                header("Location: LoginDoctor.php");
            }
        }
    }
}
?>