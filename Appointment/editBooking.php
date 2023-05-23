<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Booking</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../Css&js/BookingDesign.css"/>
    </head>
    <body>
       <div class="container">
         <div class="topnav">
            <a href="../MainMedicalPage.php">Home</a>
            <a href="../ProductModule/ProductPage.php">Product</a>
            <a href="../AboutUs/aboutus.php">About</a>
            <?php
             if(isset($user_data)){ ?>
            <a href="../Login&RegisterModule/Logout.php">Logout</a>
            <div class="dropdown">
                <button class="dropbtn">
                <i class="fa fa-user" style="color: black"></i>
            </button>
             <div class="dropdown-content">
            <a href="../PatientModule/profile.php">Profile</a>
            <a href="../Appointment/appointment.php">Appointment</a>
            <a href="../Appointment/appointment.php">Booking</a>
            <a href="../Payment/myPay.php">Payment</a>
             </div>
             </div> 
             <?php } else{ ?>
            <a href="../Login&RegisterModule/LoginPage.php">Login</a>
             <?php } ?>
         </div>
        </div>
    
        <?php
        require '../Database/db.php';
        $appt_id = $_POST['appt_id'];
        
        $query = "Select * from appointment where appt_id = '$appt_id'";
        $query_run = mysqli_query($con, $query);
        
        if($query_run){
            while($row = mysqli_fetch_array($query_run)){
            ?>
        <div class="form-edit">
            <h2>Edit Booking</h2>
            <hr/>
            <form action="" method="post">
                <input type="hidden" name="appt_id" value="<?php echo $row['appt_id']?>">
                <div class="form-group">
                    <label for="username">Name:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $row['username']?>" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="phone_num">Phone Number:</label>
                    <input type="text" name="phone_num" class="form-control" value="<?php echo $row['phone_num']?>" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <?php $mindate = date("Y-m-d");
                    $maxdate = date("Y-m-d", strtotime("+21 Days"));?>
                    <label for="date">Appointment Date:</label>
                    <input type="date" name="date" class="form-control" value="<?php echo $row['date']?>" min="<?=$mindate;?>" max="<?=$maxdate;?>" required>
                </div>
                <div class="form-group">
                    <label for="time">Appointment Time:</label>
                    <select name="time">
                    <option value="<?=$row['time']?>"><?php echo $row['time']?></option>
                    <option value="9am-10am">9am-10am</option>
                    <option value="10am-11am">10am-11am</option>
                    <option value="11am-12am">11am-12am</option>
                    <option value="1pm-2pm">1pm-2pm</option>
                    <option value="2pm-3pm">2pm-3pm</option>
                    <option value="3pm-4pm">3pm-4pm</option>
                    <option value="4pm-5pm">4pm-5pm</option>
                </select><br>
                </div>
                <div class="form-group">
                    <label for="reason">Reason of Visit:</label>
                    <input type="text" name="reason" class="form-control" value="<?php echo $row['reason']?>" placeholder="Enter your reason" required>
                </div>
                <div class="form-group">
                    <label for="pattern">Pattern of Visit:</label>
                    <input type="text" name="pattern" class="form-control" value="<?php echo $row['pattern']?>" placeholder="Enter your pattern" required>
                </div>
                <div class="form-group">
                    <label for="doc_name">Doctor Name:</label>
                    <input type="text" name="doc_name" class="form-control" value="<?php echo $row['doc_name']?>" placeholder="Enter your doctor name" required>
                </div>
                
                <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                
                <a href="../Appointment/booking.php" class="btn btn-danger">Cancel</a>
            </form>
            <?php 
            if(isset($_POST['update'])){
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
                    header("location:../Appointment/booking.php");
                }else{
                    header("location:../Appointment/editBooking.php");
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
