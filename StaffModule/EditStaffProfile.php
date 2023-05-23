<?php
    
    include("../Database/db.php");
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
        
    if(isset($_POST['submit'])){
        $StaffId=isset($_POST['StaffId']) ?$_POST['StaffId'] : "";
        $StaffName=isset($_POST['StaffName']) ?$_POST['StaffName'] : "";
        $Password=isset($_POST['Password']) ?$_POST['Password'] : "";
        $Email=isset($_POST['Email']) ?$_POST['Email'] : "";
        $Address=isset($_POST['Address']) ?$_POST['Address'] : "";
        $Phone=isset($_POST['Phone']) ?$_POST['Phone'] : "";
        $Age=isset($_POST['Age']) ?$_POST['Age'] : "";
        $Possition=isset($_POST['Possition']) ?$_POST['Possition'] : "";
        $Status=isset($_POST['Status']) ?$_POST['Status'] : "";
        $error = "";


        if ($_POST['StaffId'] == "") {
            echo $_POST['StaffId'];
            $error = "StaffId is empty";
        }
        if ($_POST['StaffName'] == "") {
            echo $_POST['StaffName'];
            $error = "StaffName is empty";
        }
        if ($_POST['Password'] == "") {
            echo $_POST['Password'];
    $error = "Password is empty";
        }
        if ($_POST['Email'] == "") {
            echo $_POST['Email'];
    $error = "Email is empty";
        }
        if ($_POST['Address'] == "") {
            echo $_POST['Address'];
    $error = "Address is empty";
        }
        if ($_POST['Phone'] == "") {
            echo $_POST['Phone'];
    $error = "Phone is empty";
        }
        if ($_POST['Age'] == "") {
            echo $_POST['Age'];
    $error = "Age is empty";
        }
        if ($_POST['Possition'] == "") {
            echo $_POST['Possition'];
            $error = "Possition is empty";
        }
        if ($_POST['Status'] == "") {
            echo $_POST['Status'];
            $error = "Status is empty";
        }
        
    if ($error != "") {
        $_SESSION['errMsg']="Username,Password,IC Number,Gender,Email,Phone number and address are required!";
            header("Location:../StaffModule/EditStaffProfile.php");
           die;
    } else {
        $query = "update staff set StaffId ='$StaffId',StaffName='$StaffName',Password='$Password',Email='$Email',Address='$Address',Phone='$Phone',Age='$Age',Possition='$Possition',Status='$Status' where StaffId='$StaffId'";
           mysqli_query($con,$query);
           $_SESSION['successMsg']="Profile has been updated!";
    }
        
    }
}
       

    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Profile</title>
         <link rel="stylesheet" href="../Css&js/StaffPageDesign.css"/>
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
 
                <form method="POST" class="ProfileEdit">
                    <br>
                     <h1 >Profile</h1>
                     <hr/>
                    <input type="hidden" name="StaffId" value="<?php echo $StaffId ?>">
            <div class="form-group">
                <label for="username">Staff ID :</label>
                <input type="text" value="<?php echo $StaffName?>" class="form-control" id="StaffName" placeholder="Enter Name" name="StaffName">
            </div>
                    <br>
            <div class="form-group">
                <label for="Password">Password :</label>
                <input type="text" value="<?php echo $Password?>" class="form-control" id="Password" placeholder="Enter Password" name="Password">
            </div>
             <br>
            <div class="form-group">
                <label for="Email">Email :</label>
                <input type="text" value="<?php echo $Email?>" class="form-control" id="Email" placeholder="Enter Email" name="Email">
            </div>
             <br>
            <div class="form-group">
                <label for="Address">Address :</label>
                <input type="text" value="<?php echo $Address?>" class="form-control" id="Address" placeholder="Enter Address" name="Address">
            </div>
                     <br>
            <div class="form-group">
                <label for="Phone">Phone :</label>
                <input type="text" value="<?php echo $Phone?>" class="form-control" id="Phone" placeholder="Enter Phone" name="Phone">
            </div>
             <br>
            <div class="form-group">
                <label for="Age">Age :</label>
                <input type="text" value="<?php echo $Age?>" class="form-control" id="Age" placeholder="Enter Age" name="Age">
            </div>
             <br>
            <div class="form-group">
                <label for="Possition">Position :</label>
                <input type="text" value="<?php echo $Possition?>" class="form-control" id="Possition" placeholder="Enter Position" name="Possition">
            </div>
              <br>
            <div class="form-group">
                <label for="Status">Status :</label>
                <input type="text" value="<?php echo $Status?>" class="form-control" id="Status" placeholder="Enter Status" name="Status">
            </div>
               <br>
<!--             <div class="form-group">
             <input type="file"  class="form-control" name="StaffImage"  placeholder="Staff Image" required/>        
             </div>-->
                <br>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
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


