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
        <title>Health Medical Report</title>
             <link rel="stylesheet" href="../Css&js/ProductPageDesign.css"/>
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
     <h2 style="text-align: center; font-size: 20px" ><strong>Medical Health Report</strong></h2>
   <form enctype="multipart/form-data" action="" method="post">
  <label>Patient Name</label>
  <input type="text" name="search">
  <input type="submit" name="searching">
  </form>
           <?php
        require '../Database/db.php'; 
        if(isset($_POST["searching"])){
        $src = $_POST['search'];
        echo "<script>"
        . "document.getElementById('test').style.display = 'none'"
                . "</script>";
        $query = "Select * from medical Where Patient_Name = '$src'";
        $query = mysqli_query($con,$query);
        }
        if (isset($_POST["searching"])){
            $src = $_POST['search'];
             echo "<script>"
        . "document.getElementById('test').style.display = 'none'"
                . "</script>";
        $query = "Select * from  medical Where StaffName = '$src'";
        $query = mysqli_query($con,$query);
        }else {
             if(isset($_POST["searching"])==null){
            $query = "Select *,DATEDIFF(`Time`, CURDATE()) AS diff  from  medical ORDER BY diff DESC ";
            $query = mysqli_query($con,$query);
                     }
            }
          
        ?>
         <table class="table table-bordered" style="width: 100%">
              <tr>
                  <td>Staff Name </td>
                  <td>Patient Name </td>
                  <td>Services Name </td>
                  <td>Appointment ID</td>
                  <td>Charges</td>
                  <td>Details </td>
                  <td>Medical</td>
                  <td>Time/Day </td>
                  <td>Payment</td>
              </tr>
    
            
            <?php 
        if($query){
            while($row = mysqli_fetch_array($query)){
                ?>
         
          <tr>
                <td><?php echo $row['StaffName']?></td>
                <td><?php echo $row['Patient_Name']?></td>
                <td><?php echo $row['Services']?></td>
                <td><?php echo $row['appt_id']?></td>
                <td><?php echo $row['Charge']?></td>
                <td><?php echo $row['Details']?></td>
                <td><?php echo $row['Medical']?></td>
                <td><?php echo $row['Time']?><td>
                <form method="post" action="../Payment/PaymentService.php">
                    <input type="hidden" name="Patient_id" value="<?php echo $row['Patient_Id']?>">
                    <input type="hidden" name="StaffId" value="<?php echo $row['StaffId']?>">
                    <input type="hidden" name="StaffName" value="<?php echo $row['StaffName']?>">
                    <input type="hidden" name="Patient_Name" value="<?php echo $row['Patient_Name']?>">
                    <input type="hidden" name="Details" value="<?php echo $row['Details']?>">
                    <input type="hidden" name="Charge" value="<?php echo $row['Charge']?>">
                    <input type="hidden" name="appt_id" value="<?php echo $row['appt_id']?>">
                    <input type="submit" name="Pay" class="btn btn-success" value="Payment">
            </form>
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
