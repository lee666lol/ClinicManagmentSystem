<?php

function check_login($con){
    if(isset($_SESSION['patient_id']))
    {
        $id = $_SESSION['patient_id'];
        $query = "Select * from patients where patient_id = '$id' limit 1";
        
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result)>0){
         $user_data = mysqli_fetch_assoc($result);
         return $user_data;
        } 
    }
    
    header("Location: ../LoginRegisterModule/LoginPatient.php");
    die;
}

function random_num($length){
    $text = "";
     if($length < 6)
     {
         $length = 6;
     }
     
     $len = rand(4,$length);
     
     for($i=0; $i<$length; $i++){
         $text .= rand(0,9);
     }
     return $text;
}




