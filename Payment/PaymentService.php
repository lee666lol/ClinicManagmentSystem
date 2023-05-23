<?php
session_start();
 require '../Database/db.php';
 $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   
    $paypal_email = 'sb-l7bjy25856462@business.example.com';
 
 
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Payment Check Out </title>
        <link rel="stylesheet" href="../Css&js/PaymentMedical.css"/>
    </head>
    <body>
         <?php
           $appt_id = $_POST['appt_id'];
           $query = "Select * from medical where appt_id = '$appt_id'";
           $query = mysqli_query($con, $query);
 
           $getPaymentServiceId = "Select * from servicecharges where appt_id = '$appt_id'";
           $result = $con->query($getPaymentServiceId);
           if ($result->num_rows > 0) {
               while ($rows = $result->fetch_assoc()) {
                   $getPaymentServiceId = $rows["Payment_service_id"];
                   $checkIfPaid = "SELECT * FROM servicecharges where Payment_service_id = '$getPaymentServiceId' && status='Paid'";
                   if ($con->query($checkIfPaid)->num_rows > 0) {
                       echo "Payment has been made!";
                       echo "<br>";
                       echo "<a href='../Report/Health&Report.php'>Go back to health and report</a>";
                       die;
                   }
               }
           }
 
        if($query){
            while($row = mysqli_fetch_array($query)){
            $total_amount = $row['Charge'] + $row['ChargeMedical'] + $row['ChargeMedical1'] + $row['ChargeMedical2'];
        ?>
        <form class="recipt">
        <h1>Payment Details Medical Charges</h1>
        <h2>L&M Clinic Center </h2>
        <hr>
        <label>Staff ID :<?php echo $row['StaffId'] ;?></label><br><br>
        <label>Staff Name :<?php echo $row['StaffName'] ;?></label><br><br>
        <label>Patient Name :<?php echo $row['Patient_Name'] ;?></label>
        <br><br>
        <label>Appointment ID :<?php echo $row['appt_id'] ;?></label>
        <br>
        <br>
        <hr>
        <label style="margin-left: 20px">Services</label><label style="margin-left: 350px">Total</label>
        <hr>
        <a style="margin-left: 20px"><?php echo $row['Services'] ;?></a> <a style="margin-left: 430px"><?php echo $row['Charge'] ;?></a>
        <a style="margin-left: 20px"><?php echo $row['Medical'] ;?></a> <a style="margin-left: 430px"><?php echo $row['ChargeMedical'] ;?></a>
          <a style="margin-left: 20px"><?php echo $row['Medical1'] ;?></a> <a style="margin-left: 430px"><?php echo $row['ChargeMedical1'] ;?></a>
            <a style="margin-left: 20px"><?php echo $row['Medical2'] ;?></a> <a style="margin-left: 430px"><?php echo $row['ChargeMedical2'] ;?></a>
        <hr>
        <label style="margin-left: 310px">Total Amount : <?php echo "RM". $total_amount;?></label>
        <br>
        <a style="text-align: center;">Thanks You!!</a><br>
        <a style="text-align: center;">Please Come Again!!</a><br>
        </form>
          <?php
                }
            }else{
                echo "No Record Found!";
            }?>
 
 
 
        <div id="paypal-button-container" style="text-align: center"></div>
        <!-- Sample PayPal credentials (client-id) are included -->
       <form action="<?php echo $paypal_url; ?>" method="post">			
			<!-- Paypal business test account email id so that you can collect the payments. -->
			<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">			
			<!-- Buy Now button. -->
			<input type="hidden" name="cmd" value="_xclick">			
			<!-- Details about the item that buyers will purchase. -->
			<input type="hidden" name="item_name" value="<?php echo "qwe" ?>">
			<input type="hidden" name="item_number" value="<?php echo 132 ?>">
			<input type="hidden" name="amount" value="<?php echo $total_amount?>">
			<input type="hidden" name="currency_code" value="USD">			
			<!-- URLs -->
			<input type='hidden' name='cancel_return' value='http://localhost/ClinicManagementSystem/Payment/cancel.php'>
			<input type='hidden' name='return' value='http://localhost/ClinicManagmentSystem/Payment/success.php?payment_id=<?php echo $getPaymentServiceId?>'>
			<!-- payment button. -->
                        <button name="submit" type="submit" class="btn btn-primary">Make payment</button> 
	</form>
 
 
    </body>
</html>