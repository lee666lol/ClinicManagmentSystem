<?php
        require '../Database/db.php';
        $status = 'Done';
        
        if(isset($_POST['update'])){
            $appt_id = $_POST['appt_id'];
            $query = "update appointment set Status='$status' where appt_id='$appt_id'";
            $query_run = mysqli_query($con, $query);
            
            if($query_run){
                header("location:../StaffModule/StaffControlPanel.php");
            }else{
                echo "<script>alert ('The Appointment can't be deleted);</script>";
                header("location:../StaffModule/StaffControlPanel.php");
            }
        }
        
