<?php include_once '../headerCustomer.php'; ?>
 
<?php 
    include("../Database/db.php");
    $query = "SELECT * FROM servicecharges WHERE patient_id='" . $user_data["patient_id"] . "'";
    $result = $con->query($query);
 $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   
    $paypal_email = 'sb-l7bjy25856462@business.example.com';
 
?>
 
<!DOCTYPE html>
 
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container mt-5">
            <table class="table table-bordered pt-4" id="allRecord">
                <thead>
 
                <th>ServiceChargeId</th>
                <th>Doctor Name</th>
                <th>Reason</th>
                <th>Username</th>
                <th>TotalPrice</th>
                <th>PaymentTime</th>
                <th>Status</th>
                <th>Make Payment</th>
 
            </thead>
                <tbody>
                <?php if ($result->num_rows > 0) {?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <?php $paymentAmount = $row["total_price"];
                          $isPaid = $row["status"];
                          $id = $row["Payment_service_id"];
                          $DoctorId = $row["doctorId"];
                          $appt_id = $row["appt_id"];
                          $patient_id = $row["patient_id"];
                    ?>
                         <tr>
 
 
                            <td name='paymentID' value="<?php echo $id?>"><?php echo $id?></td>
                            <td name='doctorID' value="<?php echo $DoctorId?>"><?php echo $DoctorId?></td>
                            <td name='appt_id' value="<?php echo $appt_id?>"><?php echo $appt_id?></td>
                            <td name='patient_id' value="<?php echo $id?>"><?php echo $patient_id?></td>
 
 
                            <td name='payment_amount'><?php echo $paymentAmount?></td>
                            <td name='payment_date'><?php echo $row["paymentTime"]?></td>
 
                            <td name='status'><?php echo $isPaid ?></td>
                            <div class="buttons">
            </div>
 
 
                            <td>
                                <?php if ($isPaid == "Paid") {
                                    echo "<button class='btn btn-primary' disabled>Payment Made</button>";
                                } else {?>
                                    <div class="buttons">
        <form action="<?php echo $paypal_url; ?>" method="post">			
			<!-- Paypal business test account email id so that you can collect the payments. -->
			<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">			
			<!-- Buy Now button. -->
			<input type="hidden" name="cmd" value="_xclick">			
			<!-- Details about the item that buyers will purchase. -->
			<input type="hidden" name="item_name" value="<?php echo "qwe" ?>">
			<input type="hidden" name="item_number" value="<?php echo 132 ?>">
			<input type="hidden" name="amount" value="<?php echo $paymentAmount?>">
			<input type="hidden" name="currency_code" value="USD">			
			<!-- URLs -->
			<input type='hidden' name='cancel_return' value='http://localhost/ClinicManagementSystem/Payment/cancel.php'>
			<input type='hidden' name='return' value='http://localhost/ClinicManagmentSystem/Payment/patientSuccess.php?payment_id=<?php echo $id?>'>
			<!-- payment button. -->
                        <button name="submit" type="submit" class="btn btn-primary">Make payment</button> 
	</form>
    </div>
                                <?php } ?>
 
                            </td>
                       </tr>
 
 
                    <?php } ?>
                <?php } ?>
                </tbody>
    </table>
 
 
        </div>
 
    </body>
</html>