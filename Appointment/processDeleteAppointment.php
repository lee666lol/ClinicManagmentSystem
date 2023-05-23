<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

    $appt_id = $_POST["appt_id"];

    $servername = "localhost";
    $user = "root";
    $password = "";
    $database = "clinic";

    $con = mysqli_connect("localhost","root","", $database);
    
    $deleteQuery = "DELETE FROM Appointment WHERE appt_id='$appt_id'";
    
    if ($con->query($deleteQuery) === TRUE) {
        header("Location: viewAppointments.php");
    } else {
        echo $con->error;
    }

?>