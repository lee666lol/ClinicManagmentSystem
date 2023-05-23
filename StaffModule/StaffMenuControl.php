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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <link rel="stylesheet" href="../Css&js/MenuStaff.css"/>
        <title></title>
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
    <h2>Welcome Staff <?php echo $StaffId ?></h2>
   <div class="row">
       <div class="column" style="background-color:#aaa;">
           <div style="display: flex; justify-content: center;">
           <img src="../Image/staff.jpg" width="150px" height="150px" alt="#"/>
           </div>
           <br>
           <div style="display: flex; justify-content: center;">
           <button onclick="window.location.href='../StaffModule/StaffProfile.php';" style="width: 20% ">Click Here
           </div>
  </div>
  <div class="column" style="background-color:#bbb;">
      <div style="display: flex; justify-content: center;">         
  <img src="../Image/booking.png" width="150px" height="150px" alt="#"/>
  </div>
      <br>
       <div style="display: flex; justify-content: center;">
   <button onclick="window.location.href='../StaffModule/StaffControlPanel.php';"  style="width: 20% ">Click Here
       </div>
  </div>
  <div class="column" style="background-color:#ccc;">
      <div style="display: flex; justify-content: center;">
  <img src="../Image/chat.jpg" width="150px" height="150px" alt="#"/>
      </div>
      <br>
      <div style="display: flex; justify-content: center;">
    <button onclick="window.location.href='../Chatbot/AddInfor.php'; " style="width: 20%">Click Here
        </div>
  </div>
  <div class="column" style="background-color:#ddd; ">
      <div style="display: flex; justify-content: center;">
  <img src="../Image/report.png" width="150px" height="150px" alt="#"/>
      </div>
      <br>
      <div style="display: flex; justify-content: center;">
   <button onclick="window.location.href='../Report/ReportModule.php';" style="width: 20%">Click Here
      </div>
  </div>
</div>
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
