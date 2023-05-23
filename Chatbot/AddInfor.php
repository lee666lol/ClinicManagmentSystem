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
        <title>Added Question</title>
        <link rel="stylesheet" href="../Css&js/QuestionDesign.css"/>
    </head>
    <body>
               <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="../StaffModule/StaffControlPanel.php">Home</a>
  <a href="../ProductModule/Product.php">Product</a>
  <a href="../MedicationAndServiceChargeModule/Medical.php">Medical Record</a>
  <a href="../Report/Health&Report.php">Medical Payment</a>
  <a href="../Payment/StaffEdtPay.php">Patient Payment Status</a>
  <a href="../StaffModule/StaffProfile.php">Profile</a>
  <a href="../Report/ReportModule.php">Report</a>
   <a href="AddInfor.php">Chat</a>

   <?php
             if(isset($StaffId)){ ?>
            <a href="../LoginRegisterModule/Logout.php">Logout</a>
             <?php } else{ ?>
            <a href="../LoginRegisterModule/LoginPage.php">Login</a>
             <?php } ?>
</div>
        <div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>  
  <h1 style="text-align: center">Add Question/FAQ</h1>
  <br>
  <hr>
  <?php
        require('../Database/db.php');
        if (isset($_POST['submit'])) {
            $queries = $_POST['queries'];
            $replies = $_POST['replies'];
            $query   = "INSERT into bot (queries, replies) VALUES ('$queries', '$replies')";
            $result   = mysqli_query($con, $query);
         if ($result) {
           echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
        }
        
        ?>
 <form class="Question" id="Question_form" action="" method="post" enctype="multipart/form-data">
      <label>Question Ask:</label>
             <input type="text" class="login-input" name="queries" placeholder="Question" required />
             <label>Answer Ask:</label>
<!--             <testarea name="replies" placeholder="Ans Question" required></<textarea>-->
             <textarea name="replies" placeholder="Ans Question" required rows="5" cols="40" style="margin-bottom: -65px "></textarea>
             <input type="submit" name="submit" value="Add Question" class="login-button">
        </form>
        
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
