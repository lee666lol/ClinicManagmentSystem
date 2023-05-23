<?php
        require '../Database/db.php';
        
        if(isset($_POST['delete'])){
            $appt_id = $_POST['appt_id'];
            
            $query = "delete from appointment where appt_id='$appt_id'";
            $query_run = mysqli_query($con, $query);
            
            if($query_run){
                header("location:../StaffModule/StaffControlPanel.php");
            }else{
                echo "<script>alert ('The Appointment can't be deleted);</script>";
                header("location:../StaffModule/StaffControlPanel.php");
            }
        }
        

