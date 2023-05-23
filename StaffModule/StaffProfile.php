<?php
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
 require_once("../Database/db.php");
if(!isset($_SESSION["Login_sess"])) 
{
     session_start();
}
  $StaffId=$_SESSION["StaffId"];
  $findresult = mysqli_query($con, "SELECT * FROM staff WHERE StaffId= '$StaffId'");
if($res = mysqli_fetch_array($findresult))
{
$StaffId = $res['StaffId']; 
$StaffName = $res['StaffName']; 
$Password = $res['Password']; 
$Email = $res['Email'];  
$Address = $res['Address']; 
$Phone = $res['Phone']; 
$Age = $res['Age'];
$Possition = $res['Possition']; 
$Status = $res['Status']; 
$created_datetime = $res['created_datetime']; 
$Image= $res['StaffImage'];
}
 ?> 
 <!DOCTYPE html>
 <!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title> My Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../Css&js/StaffProfileDesign.css">
</head>
<body>
    <!-- comment -->
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

    <!-- comment -->
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            
        </div>
        <div class="col-sm-6">
  <div class="login_form">
      <h2 onclick="window.location.href='../StaffModule/StaffControlPanel.php'">L&M Staff Profile</h2> <br> 
     
          <div class="row">
            <div class="col"></div>
           <div class="col-6"> 
             <?php if(isset($_GET['profile_updated'])) 
      { ?>
    <div class="successmsg">Profile saved ..</div>
      <?php } ?>
        <?php if(isset($_GET['password_updated'])) 
      { ?>
    <div class="successmsg">Password has been changed...</div>
      <?php } ?>
            <center>
            <?php if($Image==NULL)
                {
                 echo '<img src="https://technosmarter.com/assets/icon/user.png">';
                } else { echo '<img src="'.$Image.'" style="height:80px;width:auto;border-radius:50%;">';}?> 

  <p> Welcome! <span style="color:#33CC00"><?php echo $StaffName; ?></span> </p>
  </center>
           </div>
            <div class="col"><p><a href="../LoginRegisterModule/Logout.php"><span style="color:red;">Logout</span> </a></p>
         </div>
          </div>

          <table class="table">
          <tr>
              <th>Staff ID </th>
              <td><?php echo $StaffId; ?></td>
          </tr>
          <tr>
              <th>Staff Name </th>
              <td><?php echo $StaffName; ?></td>
          </tr>
           <tr>
              <th>Email </th>
              <td><?php echo $Email; ?></td>
          </tr>
          <tr>
              <th>Address </th>
              <td><?php echo $Address; ?></td>
          </tr>
          <tr>
              <th>Phone </th>
              <td><?php echo $Phone; ?></td>
          </tr>
          <tr>
              <th>Age </th>
              <td><?php echo $Age; ?></td>
          </tr>
          <tr>
              <th>Possition Staff </th>
              <td><?php echo $Possition; ?></td>
          </tr>
          <tr>
              <th>Status Staff </th>
              <td><?php echo $Status; ?></td>
          </tr>
          <tr>
              <th>Created Account Time and Date </th>
              <td><?php echo $created_datetime; ?></td>
          </tr>
          </table>
           <div class="row">
            <div class="col-sm-2">
            </div>
             <div class="col-sm-4">
                <a href="../StaffModule/EditStaffProfile.php"><button type="button" class="btn btn-primary">Edit Profile</button></a>
            </div>
           </div>
        </div>
        <div class="col-sm-3">
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
        
</body>

</html>