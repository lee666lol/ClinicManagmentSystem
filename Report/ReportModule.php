<?php
    
    include("../Database/db.php");
    if(!isset($_SESSION["Login_sess"])) 
{
     session_start();
}
 
  $StaffId=$_SESSION["StaffId"];
  ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
       <meta charset="UTF-8">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                 <link rel="stylesheet" href="../Css&js/ProductPageDesign.css"/>
        <title>Report</title>
    </head>
    <body>
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
   <form enctype="multipart/form-data" action="" method="post">
       <h2 style="text-align: center; font-size: 20px" ><strong>Report Details For Patient Buying </strong></h2>
  <label>Patient ID</label>
  <input type="text" name="search">
  <input type="submit" name="searching" >
  <button type="submit" name="refresh">Refresh</button>
  </form>
   <?php
        require '../Database/db.php'; 
        
        if(isset($_POST["searching"])){
        $src = $_POST['search'];
            $query = "SELECT * FROM payment where patient_id like '%$src%'";
            
        } else {
            $query = "SELECT * FROM payment";
            
        }
        
        if(isset($_POST["refresh"])){
            $query = "SELECT * FROM payment";
        }
            
            $query = mysqli_query($con,$query);
          
        
        
        ?>
 <hr />
  
        <table class="table table-bordered" style="width: 100%">
            
        <tr>
            <th>Payment ID</th>
            <th>Patient ID</th>
            <th>Cart ID</th>
            <th>Username</th>
            <th>Total Prices</th>
           
        </tr>
        
        <?php 
        if($query->num_rows > 0){
            while($row = mysqli_fetch_array($query)){
                $patient_id = $row['patient_id'];
                ?>
            <tr>
                <td><?php echo $row['payment_id']?></td>
                <td><?php echo $patient_id?></td>
                <td><?php echo $row['cart_id']?></td>
                
                <?php $query1 = "Select * from patients WHERE patient_id='$patient_id'"; 
                    $result1 = $con->query($query1);
                if ($result1->num_rows > 0) {
                    while ($rows = $result1->fetch_assoc()) {
                        $username = $rows['username'];
                    }
                        echo "<td>$username</td>";
                    };
                
                    
                ?>
                <td><?php echo $row['total_price']?></td>
                
            </tr>
     
        <?php
            }
        }else{
        echo "No Record Found";
        }
        
        ?>
        </table>
        <hr/>
       <?php
       if(isset($_POST['searching'])){
             $results = mysqli_query($con, "SELECT sum(total_price) FROM payment WHERE patient_id= '$src' ") or die(mysqli_error());
        while($rows = mysqli_fetch_array($results)){?>
        <label style=" margin-left: 1200px">Total Sales:</label> <?php echo $rows['sum(total_price)']; } 
       } else {
            $results = mysqli_query($con, "SELECT sum(total_price) FROM payment ") or die(mysqli_error());
        while($rows = mysqli_fetch_array($results)){?>
        <label style=" margin-left: 1200px">Total Sales:</label> <?php echo $rows['sum(total_price)']; } 
       }
      
           ?> 
          <form enctype="multipart/form-data" action="" method="post">
       <h2 style="text-align: center; font-size: 20px" ><strong>Report Details For Patient Service Payment</strong></h2>
  <label>Patient Name</label>
  <input type="text" name="sc">
  <input type="submit" name="src" >
  <button name="refresh">Refresh</button>
  </form>
         <?php
        require '../Database/db.php'; 
        
        
        if(isset($_POST["src"])){
            $srcs = $_POST['sc'];
            $getPatientRecord = "Select * from patients where username like '%$srcs%'";
            $patientRecordResult = $con->query($getPatientRecord);
            $patientId = "";
            if ($patientRecordResult->num_rows > 0) {
                while ($rowPatientRecord = $patientRecordResult->fetch_assoc()) {
                    $patientId = $rowPatientRecord["patient_id"];
                }
            }
            echo "<script>"
            . "document.getElementById('test').style.display = 'none'"
                    . "</script>";
            $query = "Select * from  servicecharges Where patient_id = '$patientId'";
            $query = mysqli_query($con,$query);
        
        } else {
            $query = "Select * from  servicecharges";
            $query = mysqli_query($con,$query);
        }
          
        
        
        ?>
 <hr />
  
        <table class="table table-bordered" style="width: 100%">
            
        <tr>
            <th>Patient Name</th>
            <th>Appointment ID</th>
            <th>Charge</th>
            <th>Details</th>
            <th>Payment_service_id</th>
            <th>Time</th>
           
        </tr>
        
        <?php 
        if($query){
            while($row = mysqli_fetch_array($query)){
                $patient_id = $row['patient_id'];
                $appt_id = $row['appt_id'];
                ?>
            <tr>
                <?php $patientQuery = "Select * from patients WHERE patient_id = '$patient_id'"; ?>
                                     <?php $patientResult = $con->query($patientQuery); 
                                     if ($patientResult->num_rows == 1) { ?>
                                         <?php while ($patient_row = $patientResult->fetch_assoc()) {
                                             $patientName = $patient_row['username'];
                                         } ?>
                                         <td name='username' value="<?php echo $patientName?>"><?php echo $patientName;?></td>
                                       <?php }; ?>
           
                <td><?php echo $row['appt_id']?></td>
                <td><?php echo $row['total_price']?></td>
                <?php $apptQuery = "SELECT * FROM appointment WHERE appt_id = '$appt_id'"; ?>
                                     <?php $apptResult = $con->query($apptQuery); 
                                     if ($apptResult->num_rows == 1) { ?>
                                         <?php while ($appt_row = $apptResult->fetch_assoc()) {
                                             $apptReason = $appt_row['reason'];
                                         } ?>
                                         <td name='reason' value="<?php echo $apptReason?>"><?php echo $apptReason;?></td>
                                       <?php }; ?>
                <td><?php echo $row['Payment_service_id']?></td>
                <td><?php echo $row['paymentTime']?></td>
            </tr>
     
        <?php
            }
        }else{
        echo "No Record Found";
        }
        
        ?>
        </table>
        <hr/>
       <?php
       if(isset($_POST['srcs'])){
             $results = mysqli_query($con, "SELECT sum(total_price) FROM servicecharges WHERE patient_id= '$patientId' ") or die(mysqli_error());
        while($rows = mysqli_fetch_array($results)){?>
        <label style=" margin-left: 1200px">Total Sales:</label> <?php echo $rows['sum(total_price)']; } 
       } else {
            $results = mysqli_query($con, "SELECT sum(total_price) FROM servicecharges ") or die(mysqli_error());
        while($rows = mysqli_fetch_array($results)){?>
        <label style=" margin-left: 1200px">Total Sales:</label> <?php echo $rows['sum(total_price)']; } 
       }
      
           ?> 
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
        
        <?php
        // put your code here
    
        ?>
    </body>
</html>
