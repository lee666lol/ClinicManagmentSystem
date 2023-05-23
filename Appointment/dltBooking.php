<?php
        require '../Database/db.php';
        $TDdate = date("Y-m-d");
        $date = $_POST['date'];
        $newDate = (strtotime($date) - strtotime($TDdate))/ (60 * 60 * 24);
        
        if(isset($_POST['delete'])){
            if($newDate >= 4) {
            $appt_id = $_POST['appt_id'];
            
            $query = "delete from appointment where appt_id='$appt_id'";
            $query_run = mysqli_query($con, $query);
            
            if($query_run){
                header("location:../Appointment/booking.php");
            }else{
                header("location:../Appointment/booking.php");
                echo "<script>alert('The Appointment can't be deleted);</script>";
            }
        }else{
                echo "<script>alert('The Appointment can't be deleted);</script>";
                header("location:../Appointment/booking.php");
            }
        }
        

