<?php
session_start();
    
    include("../Database/db.php");
    include("../Database/function.php");
    
    $user_data = check_login($con);

    $query = "Select * from payment where patient_id='$user_data[patient_id]'";
    $query_run = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../Css&js/BookingDesign.css"/>
    </head>
    <body>
        <br>
         <div class="container">
         <div class="topnav">
            <a href="../MainMedicalPage.php">Home</a>
            <a href="../ProductModule/ProductPage.php">Product</a>
            <a href="../AboutUs/aboutus.php">About</a>
            <?php
             if(isset($user_data)){ ?>
            <a href="../LoginRegisterModule/Logout.php">Logout</a>
            <div class="dropdown">
                <button class="dropbtn">
                <i class="fa fa-user" style="color: black"></i>
            </button>
             <div class="dropdown-content">
            <a href="../PatientModule/profile.php">Profile</a>
            <a href="../Appointment/appointment.php">Appointment</a>
            <a href="../Appointment/appointment.php">Booking</a>
             <a href="../Payment/myPay.php">Payment</a>
             </div>
             </div> 
             <?php } else{ ?>
            <a href="../LoginRegisterModule/LoginPage.php">Login</a>
             <?php } ?>
         </div>
        </div>

        <hr/>
    <style>
table, th, td {
  border:1px solid black;
  text-align: center
}
</style>
    <table class="table table-bordered" style="width: 100%">
        <br>
        <br>
        <br>
        <h2 style="text-align: center">Payment</h2>
        <tr>
            <th>Payment ID</th>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Cart ID</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Product</th>
        </tr>
        
        <?php 
        if($query_run){
            while($row = mysqli_fetch_array($query_run)){
                $getPaymentID = $row['payment_id'];
                $getPaymentDetailProduct="";
            $qry = "Select * from paymentdetail where payment_id='$getPaymentID'";
            $payment_Detail_Query_ = mysqli_query($con,$qry);
            
                ?>
            <tr>
                <td><?php echo $row['payment_id']?></td>
                <td><?php echo $row['patient_id']?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['cart_id']?></td>
                <td><?php echo $row['amount']?></td>
                <td><?php echo $row['status']?></td>
                <?php
                while($row = mysqli_fetch_array($payment_Detail_Query_)){
                $getPaymentDetailProduct.=$row['productName'].",";
                }
                echo "<td>$getPaymentDetailProduct</td>";
                ?>
            </tr>
        <?php
            }
        }else{
        echo "No Record Found";
        }
        ?>
    </table>
    </body>
</html>

