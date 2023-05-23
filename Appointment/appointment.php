<?php
session_start();
    
    include("../Database/db.php");
    include("../Database/function.php");
  
    $user_data = check_login($con);
    $appt_id = random_num(6);
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $patient_id = $_POST['patient_id'];
        $username = $_POST['username'];
        $phone_num = $_POST['phone_num'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $reason = $_POST['reason'];
        $pattern = $_POST['pattern'];
        $doc_name = $_POST['doc_name'];
        $possition = $_POST['possition'];
        
        if(!empty($patient_id)&&!empty($username)&& !empty($phone_num)&& !empty($date)&& !empty($time)&& !empty($reason)&& !empty($pattern)&& !empty($doc_name) &&!empty($possition)){
            $status = "Active";
            $query = "insert into appointment(appt_id,patient_id,username,phone_num,date,time,reason,pattern,doc_name,status,possition) values ('$appt_id','$patient_id','$username','$phone_num','$date','$time','$reason','$pattern','$doc_name','$status','$possition')";
            mysqli_query($con,$query);
            
            header("Location: ../MainMedicalPage.php");
            die;
        }
        else{
            echo "<script>alert('Please fill up all the information!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Appointment</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../Css&js/AppointmentDesign.css"/>
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
            <a href="../Appointment/booking.php">Booking</a>
            <a href="../Payment/myPay.php">Payment</a>
             </div>
             </div> 
             <?php } else{ ?>
            <a href="../Login&RegisterModule/LoginPage.php">Login</a>
             <?php } ?>
         </div>
        </div>
        <hr />
        
        <br>
              <br>
        <div id="box">
            <form method="post">
                <div style="font-size: 20px; margin: 10px;">Appointment</div>
                <input type="hidden" name="patient_id" value="<?php echo $user_data['patient_id']?>"><br><br>
                Name:<input id="text" type="text" name="username"><br><br>
                Phone number:<input id="text" type="text" name="phone_num"><br><br>
                <?php $mindate = date("Y-m-d");
                $maxdate = date("Y-m-d", strtotime("+21 Days"));?>
                Appointment Date:<input id="text" type="date" value="<?=$mindate;?>" name="date" min= "<?=$mindate;?>" max="<?=$maxdate;?>" required><br><br>
                Appointment Time:<select name="time">
                    <option value="">--Select--</option>
                    <option value="9am-10am">9am-10am</option>
                    <option value="10am-11am">10am-11am</option>
                    <option value="11am-12am">11am-12am</option>
                    <option value="1pm-2pm">1pm-2pm</option>
                    <option value="2pm-3pm">2pm-3pm</option>
                    <option value="3pm-4pm">3pm-4pm</option>
                    <option value="4pm-5pm">4pm-5pm</option>
                </select><br><br>
                Reason for Visit:<input list="browsers" name="reason" id="reason">
                  <datalist id="browsers">
                    <option value="Annual Physicals">
                    <option value="Vaccinations">
                    <option value="Laboratory Testing">
                    <option value="Screening And Treatment For Conditions">
                    <option value="Care For Minor Symptoms">
                    <option value="Treatment For Common Illnesses">
                         <option value="Treatment Of Some Injuries">
                  </datalist><br><br>
<!--                <select name="reason">
                    <option value="">--Select--</option>
                    <option value="Common Cold">Common Cold</option>
                    <option value="Earache">Earache</option>
                    <option value="Headache">Headache</option>
                    <option value="Stomachache">Stomachache</option>
                    <option value="Fever">Fever</option>
                </select><br><br>-->
                Visit Pattern:<select name="pattern">
                    <option value="">--Select--</option>
                    <option value="Home Visit">Home Visit</option>
                    <option value="Walk-in">Walk-in</option>
                </select><br><br>
                Doctor:<select name="doc_name">
                    <option value="">--Select--</option>
                    <option value="Mr.Doctor John">Mr.Doctor John</option>
                    <option value="Mr.Doctor Micheal">Mr.Doctor Micheal</option>
                    <option value="Mr.Doctor Jack">Mr.Doctor Jack</option>
                    <option value="Mr.Doctor Wong">Mr.Doctor Wong</option>
                </select><br><br>
                <input id="text" type="hidden" name="possition" value="pending"><br><br>
                <input id="button" type="submit" value="Book"><br><br>

            </form>
        </div>
    </body>
</html>

