<?php
        require '../Database/db.php';
        $status = 'Done';
        
        if(isset($_POST['update'])){
            $appt_id = $_POST['appt_id'];
            $patient_id = $_POST['patient_id'];
            $doctor_id = $_POST['doctor_id'];
            $paymentAmount = 50;
            $serviceCharge = $paymentAmount * 0.06;
            $now = new DateTime();
            
            $checkAppointmentDone = "Select * from appointment where appt_id='$appt_id'";
            $result = $con->query($checkAppointmentDone);
            if ($result == true) {
                if ($result->num_rows > 0) {
                    echo "asd";
                    while ($row = $result->fetch_assoc()) {
                        
                        if ($row["status"] == "Done") {
                            
                            header("location:../DoctorModule/DoctorControlPanel.php");
                            die;
                        }
                    }
                }
            } else {
                echo $con->error;
            }
            
            $query = "update appointment set Status='Done' where appt_id='$appt_id'";
            
            $paymentNumRows = "SELECT * FROM servicecharges";
            
            $numRows = $con->query($paymentNumRows)->num_rows;
            $s_number = str_pad( $numRows, 4, "0", STR_PAD_LEFT );
            $query1 = "insert into servicecharges (Payment_service_id, doctorId, appt_id, patient_id, total_price, status) values ('SC$s_number', '$doctor_id', '$appt_id', '$patient_id', 50, false)";
            $query_run = mysqli_query($con, $query);
            $query_run = mysqli_query($con, $query1);
            
            if($query_run && $query_run1){
                header("location:../DoctorModule/DoctorControlPanel.php");
            }else{
                echo "<script>alert ('There is something wrong with updating the appointment);</script>";
                header("location:../DoctorModule/DoctorControlPanel.php");
            }
        }
        
//create table servicecharges (
//Payment_service_id varchar(5),
//doctorId varchar(11),
//appt_id varchar(7),
//patient_id varchar(10),
//total_price double,
//paymentTime varchar(50),
//status boolean
//)