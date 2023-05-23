<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include("../Database/db.php");
$formUser = isset($_POST["username"]) ? $_POST["username"] : "";
$phone = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"]: "";
$appointmentDate = isset($_POST["date"]) ? $_POST["date"]: "";
$appointmentTime = isset($_POST["time"]) ? $_POST["time"]: "";
$reason = isset($_POST["reason"]) ? $_POST["reason"]: "";
$doctorName = isset($_POST["doctorName"]) ? $_POST["doctorName"]: "";
$visitType = isset($_POST["visitType"]) ? $_POST["visitType"]: "";
$patient_id = isset($_POST["patient_id"]) ? $_POST["patient_id"]: "";
$row_count = 0;

//$date = $appointment->format('Y-m-d');
//$time = $appointment->format('H:i:s');
//$datetime = strtotime($appointment);
//$datetime = date('d/m/Y:H:i:s', $datetime);
//$date = date_format($appointment, 'Y/m/d');
//$time = date_format($appointment, 'H:i:s');

//$date1 = new DateTime($appointment);
//$date = $date1->format('Y/m/d');
//$time = $date->format('H:m:i');
$time = strtotime($appointmentDate);

$date = date('Y-m-d',$time);

if ($formUser == "") {
    $error = "Please enter username!";
}

if ($phone == "") {
    $error = "Please enter phone!";
}

if ($appointmentDate == "") {
    $error = "Please enter appointment date!";
}

if ($appointmentTime == "") {
    $error = "Please enter appointment time!";
}
if ($reason == "") {
    $error = "Please enter reason for visit!";
}
if ($doctorName == "") {
    $error = "Please enter doctor name!";
}

if ($visitType == "") {
    $error = "Please enter visit type!";
}

if (isset($error)) {
    header("Location: addAppointmentPage.php?error=$error&username=$formUser&phone=$phone&appointmentDate=$appointmentDate&appointmentTime=$appointmentTime&reason=$reason&doctorName=$doctorName&visitType=$visitType");
   die;
}
$checkRowCountQuery = "SELECT COUNT(*) as count FROM Appointment";
$checkAppointmentExistQuery = "SELECT * FROM appointment where date='$appointmentDate' and time='$appointmentTime' and doc_name='$doctorName'";
$row_count = $con->query($checkRowCountQuery)->num_rows;
$checkAppointmentExist = $con->query($checkAppointmentExistQuery)->num_rows;

$checkNumRows = "SELECT * FROM Appointment";
$numrows = $con->query($checkNumRows)->num_rows;
$s_number = str_pad( $numrows, 5, "0", STR_PAD_LEFT );
    
if ($checkAppointmentExist == 0) {
    $insertQuery = "INSERT INTO appointment (appt_id, patient_id, username, phone_num, date, time, reason, pattern, doc_name, status, possition)"
        . "VALUES ('A$s_number','$patient_id','$formUser','$phone','$date','$appointmentTime', '$reason','$visitType','$doctorName', 'Active','Pending')";
    

    if ($con->query($insertQuery)) {
        
        header("Location: viewAppointments.php");
    } else {
        echo $con->error;
    }
} else {
    $error = "Timeslot booked! Please choose another doctor or another time";
    
    header("Location: addAppointmentPage.php?error='$error'");
}
?>