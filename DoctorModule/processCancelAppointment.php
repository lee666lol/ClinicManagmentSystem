<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include("../Database/db.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files 
require '../PHPMailer/PHPMailer/src/Exception.php';
require '../PHPMailer/PHPMailer/src/PHPMailer.php';
require '../PHPMailer/PHPMailer/src/SMTP.php';

$cancelReason = isset($_POST["cancelReason"]) ? $_POST["cancelReason"]  : "";
$appt_id = isset($_POST["appt_id"]) ? $_POST["appt_id"]  : "";
$patient_id = isset($_POST["patient_id"]) ? $_POST["patient_id"]  : "";
$doctorid=$_SESSION["DoctorId"];
$appointment_date = "";
$appointment_time = "";
$patient_email = "";
$doctor_name = "";
$error = "";
if ($cancelReason == "") {
    $error = "Cancel Reason must be chosen!";
}

if ($error != "") {
    header("Location: doctorCancelAppointment.php?error=$error");
}

$getEmailPatientQuery = "Select * from patients WHERE patient_id = '$patient_id'";
$result = $con->query($getEmailPatientQuery);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $patient_email = $row["email"];
    }
}
$getDoctorNameQuery = "SELECT * FROM doctor WHERE doctorId = '$doctorid'";
$result = $con->query($getDoctorNameQuery);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $doctor_name = $row["doctorName"];
    }
}
$getAppointmentDateAndTime = "SELECT * FROM appointment WHERE appt_id = '$appt_id'";
$result = $con->query($getAppointmentDateAndTime);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $appointment_date = $row["date"];
        $appointment_time = $row["time"];
    }
}

$query = "UPDATE Appointment SET cancelReason = '$cancelReason', status = 'Cancelled' WHERE appt_id = '$appt_id'";
if ($con->query($query) === TRUE) {
    echo $patient_email;
    echo $patient_id;
    $mail = new PHPMailer();
    //Send email to patient
    try {
            //Server settings                   //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'ngpl-wm19@student.tarc.edu.my';                     //SMTP username
            $mail->Password = '010512060509';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Sender
            $mail->setFrom('ngpl-wm19@student.tarc.edu.my');

            $mail->SMTPDebug = 2;
            $mail->addAddress("$patient_email");   


            $mail->isHTML(true);                                 
            $mail->Subject = 'Appointment Cancelled';
            $mail->Body = '<p>Dear ' . $patient_email . ',</p>
                
                <p>Sorry, ' . $doctor_name .' has decided to cancel the appointment at:</p>
                <br>Date: ' . $appointment_date . '
                <br>Time: ' . $appointment_time . '
                <h3>Due to: <u>' . $cancelReason . '</u></h3>
    
                Best wishes,
                <br>
                <hr>
                <p>Do not reply to this email.</p>';

            // Send email 
            if (!$mail->send()) {
                
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                // Notification
                echo "<script>alert ('An email has been sent to the patient.');</script>";
                echo "<script>window.location = 'DoctorControlPanel.php'</script>";
                
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}
?>