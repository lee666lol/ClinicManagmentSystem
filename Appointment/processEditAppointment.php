<?php
    
    $appt_id = $_POST["appt_id"];
    $username = $_POST["username"];
    $phone = $_POST["phoneNumber"];
    $appointmentDate = $_POST["date"];
    $appointmentTime = $_POST["time"];
    $reason = $_POST["reason"];
    $doctorName = $_POST["doctorName"];
    $visitType = $_POST["visitType"];
    
    $servername = "localhost";
    $user = "root";
    $password = "";
    $database = "clinic";

    $con = mysqli_connect("localhost","root","", $database);
    
    $time = strtotime($appointmentDate);

    $date = date('Y-m-d',$time);

    $checkRowCountQuery = "SELECT COUNT(*) as count FROM Appointment";
    $checkAppointmentExistQuery = "SELECT * FROM appointment where date='$appointmentDate' and time='$appointmentTime' and doc_name='$doctorName'";
    $row_count = $con->query($checkRowCountQuery)->num_rows;
    $appointmentQuery = $con->query($checkAppointmentExistQuery);
    $checkAppointmentExist = $con->query($checkAppointmentExistQuery)->num_rows;
    
    if ($appointmentQuery == TRUE) {
        if ($checkAppointmentExist == 0) {
         updateAppointment($con, $username, $phone, $date, $appointmentTime, $reason, $visitType, $doctorName, $appt_id);
    } else {
        
        while($row = $appointmentQuery->fetch_assoc()) {
            if ($row["appt_id"] == $appt_id) {
                updateAppointment($con, $username, $phone, $date, $appointmentTime, $reason, $visitType, $doctorName, $appt_id);
            }
        }
        
        $error = "Timeslot booked! Please choose another doctor or another time";
        header("Location: editAppointmentPage.php?error='$error'&appt_id=$appt_id");
    }
    }
    
    function updateAppointment($con, $username, $phone, $date, $appointmentTime, $reason, $visitType, $doctorName, $appt_id) {
        $updateQuery = "UPDATE Appointment SET username='$username', phone_num='$phone', date='$date', time='$appointmentTime', reason='$reason', pattern='$visitType', doc_name='$doctorName' WHERE appt_id='$appt_id'";

        if ($con->query($updateQuery) === TRUE) {
            header("Location: viewAppointments.php");
            die;
        } else {
            echo $con->error;
        }
    }
?>