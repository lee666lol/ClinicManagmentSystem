<?php
    
    include("../Database/db.php");
    if(!isset($_SESSION["Login_sess"])) 
{
     session_start();
}
 
  $StaffId=$_SESSION["StaffId"];
  
  echo "Test";
  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Booking</title>
         <link rel="stylesheet" href="../Css&js/StaffPageDesign.css"/>
    </head>
    <body>
        <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
   <a href="../StaffModule/StaffControlPanel.php">Home</a>
  <a href="../ProductModule/Product.php">Product</a>
     <a href="../MedicalAndServiceChargeModule/Medical.php">Medical Record</a>
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
        require '../Database/db.php';
        $appt_id = $_POST['appt_id'];
        
        $query = "Select * from appointment where appt_id = '$appt_id'";
        $query_run = mysqli_query($con, $query);
        
        if($query_run){
            while($row = mysqli_fetch_array($query_run)){
            ?>
  
        <div class="container">     
            <h2>Booking Edit</h2>
            <hr/>
            
            <form action="" method="post">
                <input type="hidden" name="appt_id" value="<?php echo $row['appt_id']?>">
                <br>
                <div class="form-group">
                    <label for="username">Name:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $row['username']?>" placeholder="Enter your name" required>
                </div>
                 <br>
                <div class="form-group">
                    <label for="phone_num">Phone Number:</label>
                    <input type="text" name="phone_num" class="form-control" value="<?php echo $row['phone_num']?>" placeholder="Enter your phone number" required>
                </div>
                  <br>
                <div class="form-group">
                    <?php $mindate = date("Y-m-d");
                    $maxdate = date("Y-m-d", strtotime("+21 Days"));?>
                    <label for="date">Appointment Date:</label>
                    <input type="date" name="date" class="form-control" value="<?php echo $row['date']?>" min="<?=$mindate;?>" max="<?=$maxdate;?>" required>
                </div>
                   <br>
                <div class="form-group">
                    <label for="time">Appointment Time:</label>
                    <input type="time" name="time" class="form-control" value="<?php echo $row['time']?>" required>
                </div>
                    <br>
                <div class="form-group">
                    <label for="reason">Reason of Visit:</label>
                    <input type="text" name="reason" class="form-control" value="<?php echo $row['reason']?>" placeholder="Enter your reason" required>
                </div>
                     <br>
                <div class="form-group">
                    <label for="pattern">Pattern of Visit:</label>
                    <input type="text" name="pattern" class="form-control" value="<?php echo $row['pattern']?>" placeholder="Enter your pattern" required>
                </div>
                      <br>
                <div class="form-group">
                    <label for="doc_name">Doctor Name:</label>
                    <input type="text" name="doc_name" class="form-control" value="<?php echo $row['doc_name']?>" placeholder="Enter your doctor name" required>
                </div>
                 <br>
                <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                 <br>
                 <br>
                <a href="../StaffModule/StaffControlPanel.php" class="btn btn-danger">Cancel</a>
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
        
            <?php 
            echo isset($_POST['update']);
            if(isset($_POST['update'])){
                echo "s";
                $username = $_POST['username'];
                $phone_num = $_POST['phone_num'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $reason = $_POST['reason'];
                $pattern = $_POST['pattern'];
                $doc_name = $_POST['doc_name'];
                
                $query = "update appointment set username='$username',phone_num='$phone_num',date='$date',time='$time',reason='$reason',pattern='$pattern',doc_name='$doc_name' where appt_id = '$appt_id'";
                $query_run = mysqli_query($con, $query);
               
                if($query_run){
                    header("location:../StaffModule/StaffControlPanel.php");
                }else{
                    header("location:../StaffModule/StaffEditBooking.php");
                }
            }
            ?>
            </div>
            <?php
                }
            }else{
                echo "No Record Found!";
            }?>
    </body>
</html>
