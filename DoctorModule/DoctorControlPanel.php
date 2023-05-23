<?php
    
    include("../Database/db.php");
    if(!isset($_SESSION["Login_sess"])) 
{
     session_start();
}
 
  $doctorid=$_SESSION["DoctorId"];
  
  $searchDoctorName = "select * from appointment where doc_name = '$doctorid'";
  $query = $con->query($searchDoctorName);
 
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
  ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome To Staff Control Panel</title>
        <link rel="stylesheet" href="../Css&js/StaffPageDesign.css"/>
        
        
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
             if(isset($doctorid)){ ?>
            <a href="../LoginRegisterModule/Logout.php">Logout</a>
             <?php } else{ ?>
            <a href="../LoginRegisterModule/LoginPage.php">Login</a>
             <?php } ?>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>  
  <h2 style="text-align: center">Patient Appointment Dashboard</h2>
   <form enctype="multipart/form-data" action="" method="post">
  <label>Search Date</label>
  <input type="text" name="search" required/>
  <input type="submit" name="searching">
  </form>
   <?php
        require '../Database/db.php'; 
        if(isset($_POST["searching"])){
        $src = $_POST['search'];
        echo "<script>"
        . "document.getElementById('test').style.display = 'none'"
                . "</script>";
        $query = "Select * from  appointment Where date = '$src'";
        $query = mysqli_query($con,$query);
        
        }
        if (isset($_POST["searching"])){
            $src = $_POST['search'];
             echo "<script>"
        . "document.getElementById('test').style.display = 'none'"
                . "</script>";
        $query = "Select * from  appointment Where username = '$src'";
        $query = mysqli_query($con,$query);
        
        }
        else {

            }
          
        
        
        ?>
 
  <hr />
  
        <table class="table table-bordered" style="width: 100%">
            
        <tr>
            <th>Appointment ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Reason</th>
            <th>Pattern</th>
            <th>Doctor</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Approval</th>
            <th>Report</th>
            <th>Cancel</th>

        </tr>
        
        <?php 
                if(isset($query)){
            while($row = mysqli_fetch_array($query)){
                ?>
            <tr>
                <td><?php echo $row['appt_id']?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['phone_num']?></td>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['time']?></td>
                <td><?php echo $row['reason']?></td>
                <td><?php echo $row['pattern']?></td>
                <td><?php echo $row['doc_name']?></td>
                <td><?php echo $row['status']?></td>
                
               
                <form action="../StaffModule/StaffEditBooking.php" method="post">
                    <input type="hidden" name="appt_id" value="<?php echo $row['appt_id']?>">
                    <td> <input type="submit" name="edit" class="btn btn-success" value="edit"> </td>
                </form>
                <form action="../StaffModule/StaffDltBooking.php" method="post">
                        <td> <input type="submit" name="delete" class="btn btn-danger" value="delete"> </td>
                </form>
                 <form action="../StaffModule/doctorUpStatus.php" method="post">
                        <input type="hidden" name="appt_id" value="<?php echo $row['appt_id']?>">
                        <input type="hidden"  name="patient_id" value="<?php echo $row['patient_id']?>">
                        <input type="hidden"  name="doctor_id" value="<?php echo $doctorid?>">
                        <td> <input type="submit" name="update" class="btn btn-danger" value="Status"> </td>
                </form>
                <form action="../MedicationAndServiceChargeModule/Medical.php" method="post">
                        <input type="hidden" name="appt_id" value="<?php echo $row['appt_id']?>">
                        <td> <input type="submit" name="report" class="btn btn-danger" value="Report"> </td>
                </form>
                <form action="doctorCancelAppointment.php" method="post">
                        <input type="hidden" name="appt_id" value="<?php echo $row['appt_id']?>">
                        <input name="patient_id" value="<?php echo $row['patient_id']?>">
                        <td> <input type="submit" name="report" class="btn btn-danger" value="Cancel"> </td>
                </form>
                </tr>
            <?php
                }
            }else{
            echo "No Record Found";
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
        
        <style>

</style>
       
  </body>
  
    
    <!-- Footer Design -->
</html>