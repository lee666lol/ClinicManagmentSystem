<?php
session_start();
require '../Database/db.php';
require '../Database/function.php';
  
    $user_data = check_login($con);
            $cart_id = random_int(100000, 999999);
            $payment_id = random_int(100000, 999999);
            $status = 'Pending';
            $patient_id = $user_data['patient_id'];
            $username = $user_data['username'];
    
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */ 
  	  if(isset($_POST['AddCart'])){
         $total_price = $_POST['amount'];
        $ProductName = $_POST['product'];
        
//        if(!empty($total_price)&& !empty($ProductName)){
//            $query = "insert into payment(payment_id,PatientId,cart_id,total_price,username,product,status) values ('$payment_id','$patient_id','$cart_id','$total_price,'$username','$ProductName','$status')";
//            mysqli_query($con,$query);
//            
//            header("Location: ../Payment/CheckOut.php");
//            die;
//        }
//        else{
//            echo "Please enter valid information";
//            echo "<script>alert('Nothing')</script>";
//           
//        }
          }
          
          
 ?>


     