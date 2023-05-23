<?php
session_start();
    
    include("../Database/db.php");
    include("../Database/function.php");
    
    $user_data = check_login($con);
    ?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to L&M Medical Design</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../Css&js/PatientDesign.css"/>
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
    
        
        <hr />
        <form method="POST" action="editProfile.php" class="User_profile">
            <br>
             <h1>Profile</h1>
             <hr />
            <div class="form-group">
                <label for="username">Username :</label>
                <?php echo $user_data['username']?>
            </div>
             <br>
            <div class="form-group">
                <label for="password">Password :</label>
                <?php echo $user_data['password']?>
            </div>
             <br>
            <div class="form-group">
                <label for="ic_number">IC Number :</label>
                <?php echo $user_data['ic_number']?>
            </div>
             <br>
            <div class="form-group">
                <label for="gender">Gender :</label>
                <?php echo $user_data['gender']?>
            </div>
             <br>
            <div class="form-group">
                <label for="age">Date Of Birth :</label>
                <?php echo $user_data['age']?>
            </div>
             <br>
            <div class="form-group">
                <label for="email">Email :</label>
                <?php echo $user_data['email']?>
            </div>
             <br>
            <div class="form-group">
                <label for="phone_num">Phone Number :</label>
                <?php echo $user_data['phone_num']?>
            </div>
             <br>
            <div class="form-group">
                <label for="address">Address :</label>
                <?php echo $user_data['address']?>
            </div>
             <br>
                    <input type="submit" name="edit" class="Edit" value="Edit">
        </form>
          <div class="footer">
          <h2>L&M Clinic Center</h2>
         <li><a href="../MainMedicalPage.php">Home</a></li>
         <li><a href="../Chatbot/bot.php">FAQ</a></li>
         <li><a href="../AboutUs/aboutus.php">About</a></li>
    </div>
    </body>
</html>
