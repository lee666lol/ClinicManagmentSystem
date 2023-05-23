<?php
    
    include("../Database/db.php");
    include("../Database/function.php");

    $query = "Select * from payment";
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
        <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
   <a href="../StaffModule/StaffControlPanel.php">Home</a>
  <a href="../ProductModule/Product.php">Product</a>
  <a href="../Report/Health&Report.php">Medical Payment</a>
  <a href="../Payment/StaffEdtPay.php">Patient Payment Status</a>
  <a href="../StaffModule/StaffProfile.php">Profile</a>
  <a href="../Report/ReportModule.php">Report</a>
  <a href="../Chatbot/AddInfor.php">Chat</a>
   <?php
             if(isset($StaffId)){ ?>
            <a href="../LoginRegisterModule/Logout.php">Logout</a>
             <?php } else{ ?>
            <a href="../LoginRegisterModule/LoginPage.php">Login</a>
             <?php } ?>
</div>
        <div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>  

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
        <h2 style="text-align: center">Product Buying History By Patient</h2>
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
                $patient_id = $row['patient_id'];
                $getPaymentDetailProduct="";
            $qry = "Select * from paymentdetail where payment_id='$getPaymentID'";
            $payment_Detail_Query_ = mysqli_query($con,$qry);
            $cart_id = $row['cart_id'];
                ?>
            <tr>
                <td><?php echo $row['payment_id']?></td>
                <td><?php echo $patient_id?></td>
                <?php $patientQuery = "Select * from patients WHERE patient_id = '$patient_id'"; ?>
                                     <?php $patientResult = $con->query($patientQuery); 
                                     if ($patientResult->num_rows == 1) { ?>
                                         <?php while ($patient_row = $patientResult->fetch_assoc()) {
                                             $patientName = $patient_row['username'];
                                         } ?>
                                         <td name='username' value="<?php echo $patientName?>"><?php echo $patientName;?></td>
                                       <?php }; ?>
                <td><?php echo $cart_id?></td>
                <td><?php echo $row['total_price']?></td>
                <td><?php echo ($row['status'] == 1) ? "Paid" : "Not paid"?></td>
                <?php $query = "SELECT * FROM Cart WHERE Cart_id='$cart_id'";
                        $productList = "";
                        $result = $con->query($query);
                        if ($result == true) {
                            while ($row = $result->fetch_assoc()) {
                                $productList .= $row["product_list"];
                            };
                            
                        }
                        ?>
                <td><?php echo $productList ?></td>
                
            </tr>
        <?php
            }
        }else{
        echo "No Record Found";
        }
        ?>
    </table>
        </div>
   <script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
    </body>
</html>

