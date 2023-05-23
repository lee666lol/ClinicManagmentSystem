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
        <title>Product</title>
    </head>
    <body>
    <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="../StaffModule/StaffControlPanel.php">Home</a>
  <a href="../ProductModule/Product.php">Product</a>
  <a href="../Report/Health&Report.php">Medical Payment</a>
  <a href="../Payment/StaffEditPay.php">Patient Payment Status</a>
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
        
        <?php
        // put your code here
        require '../Database/db.php';
        if (isset($_POST['StaffId'])) {
        $StaffId =  $_POST['StaffId'];
        $ProductId = $_POST['ProductId'];
        $ProductName =  $_POST['ProductName'];
        $ProductDetails = $_POST['ProductDetails'];
        $ProductPrices = $_POST['ProductPrices'];
        $ProductImage = $_FILES["ProductImage"]["name"];
        $tempname = $_FILES["ProductImage"]["tmp_name"];
        $folder = "../Image/" . $ProductImage;
        $AddTime = date("d-m-Y H:i:s");
        $query    = "INSERT into `product` (StaffId, ProductId, ProductName, ProductDetails, ProductPrices, ProductImage, AddTime)
                     VALUES ('$StaffId', '$ProductId', '$ProductName', '$ProductDetails', '" .($ProductPrices) . "', '$folder', '$AddTime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
           echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
        }

?>
        
         <form class="form" id="Product_Form" action="" method="post" enctype="multipart/form-data">
        <h1 class="Product-title">Product Adding</h1>
        <hr/>
        <div class="form-group">
        <label>Staff Id:</label>
        <input type="text" class="login-input" name="StaffId" placeholder="Staff Id" required />
        </div>
         <div class="form-group">
        <label>Product Number:</label>
        <input type="text" class="login-input" name="ProductId" placeholder="Product Number" required/>
         </div> 
         <div class="form-group">
        <label>Product Name:</label>
        <input type="text" class="login-input" name="ProductName" placeholder="Product Name" required>
         </div>
         <div class="form-group">
        <label>Product Details:</label>
        <input type="text" class="login-input" name="ProductDetails" placeholder="Product Details / Desription" required/>
         </div>
         <div class="form-group">
        <label>Product Prices:</label>
        <input type="text" class="login-input" name="ProductPrices" placeholder="Product Prices" required/>
         </div>
         <div class="form-group">
        <label>Product Image:</label>
        <input type="file" class="form-control" name="ProductImage" placeholder="Product Image" required/>
         </div>
        <input type="submit" name="submit" value="Product" class="Submit-button">
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
