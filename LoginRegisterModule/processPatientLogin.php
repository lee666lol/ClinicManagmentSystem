<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include("../Database/db.php");
session_start();
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$isStaff = isset($_GET["isStaff"]) ? $_GET["isStaff"] : false;
$isPatient = isset($_GET["isPatient"]) ? $_GET["isPatient"] : false;
$password = isset($_POST["password"]) ? $_POST["password"] : "" ;
$error = "";

$q = "Select * from patients WHERE email = '$email'";
$result = $con->query($q);

if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {

    if ($password == $row["password"]) {
                $_SESSION["patient_id"] = $row["patient_id"];
                header("Location: ../MainMedicalPage.php");


            } else {
                $error = "Username/Password is wrong!";
                header("Location: LoginPatient.php?error=$error");
            }
      }
    } else {
        $error = "Username/Password is wrong!";
        header("Location: LoginPatient.php?error=$error");
    }
?>