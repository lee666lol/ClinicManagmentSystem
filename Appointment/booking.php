<?php
session_start();
    
    include("../Database/db.php");
    include("../Database/function.php");
    
    $user_data = check_login($con);

    $query = "Select * from appointment where patient_id='$user_data[patient_id]'";
    $query_run = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../Css&js/BookingDesign.css"/>
    </head>
    <body>
        <br>
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

        <hr/>
    <style>
table, th, td {
  border:1px solid black;
  text-align: center
}
</style>
    <table class="table table-bordered" style="width: 100%">
        <br>
        <br>
        <br>
        <h2 style="text-align: center">Booking</h2>
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
        </tr>
        
        <?php 
        if($query_run){
            while($row = mysqli_fetch_array($query_run)){
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
               
                <form action="editBooking.php" method="post">
                    <input type="hidden" name="appt_id" value="<?php echo $row['appt_id']?>">
                    <td> <input type="submit" name="edit" class="btn btn-success" value="edit"> </td>
            </form>
            <form action="dltBooking.php" method="post">
                    <input type="hidden" name="appt_id" value="<?php echo $row['appt_id']?>">
                    <input type="hidden" name="date" value="<?php echo $row['date']?>">
                    <td> <input type="submit" name="delete" class="btn btn-danger" value="delete"> </td>
            </form>
            </tr>
        <?php
            }
        }else{
        echo "No Record Found";
        }
        ?>
    </table>
    </body>
</html>

