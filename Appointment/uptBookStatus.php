    <?php
        require '../Database/db.php';
        $status = 'Done';
        
        if(isset($_POST['update'])){
            
            $query = "update appointment set Status='$status'";
            $query_run = mysqli_query($con, $query);
            
            if($query_run){
                header("location:../Appointment/booking.php");
            }else{
                echo "<script>alert ('The Appointment can't be deleted);</script>";
                header("location:../Appointment/booking.php");
            }
        }
        

