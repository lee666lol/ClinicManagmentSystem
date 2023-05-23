<?php
        require '../Database/db.php';
        $status = 0;
        
        if(isset($_POST['update'])){
            $payment_id = $_POST['payment_id'];
            $query = "update payment set Status='$status' where payment_id='$payment_id'";
            $query_run = mysqli_query($con, $query);
            
            if($query_run){
                header("location:../Payment/StaffEdtPay.php");
            }else{
                echo "<script>alert ('The Appointment can't be deleted);</script>";
                header("location:../Payment/StaffEdtPay.php");
            }
        }
        

