<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php include_once '../headerCustomer.php'; ?>
<?php 
include("../Database/db.php");
$error = isset($_GET["error"]) ? $_GET["error"] : "";
$user = isset($_GET["username"]) ? $_GET["username"] : "";
$phone = isset($_GET["phone"]) ? $_GET["phone"] : "";
$appointmentDate = isset($_GET["appointmentDate"]) ? $_GET["appointmentDate"] : "";
$appointmentTime = isset($_GET["appointmentTime"]) ? $_GET["appointmentTime"] : "";
$reason = isset($_GET["reason"]) ? $_GET["reason"] : "";
$doctorName = isset($_GET["doctorName"]) ? $_GET["doctorName"] : "";
$visitType = isset($_GET["visitType"]) ? $_GET["visitType"] : "";

$staff = "SELECT * FROM staff";
$query = $con->query($staff);

?>
<?php include_once '../headerCustomer.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        
        <div class="mx-auto col-10 col-md-8 col-lg-6 mt-5 p-5 border border-secondary">
            <h1>Add new Appointment</h1>
            <h5 class="text-danger"><?php echo $error?></h5>
            <form action="processAddAppointment.php" method="post">
                <input hidden name="appt_id">
                <div class="form-group">
                    <input hidden name="patient_id" class="form-control" value="<?php echo $user_data["patient_id"]?>" readonly="readonly"> 
                   <label>Username</label>
                   <?php if ($user == "") {?>
                    <input name="username" class="form-control" value="<?php echo $user_data["username"]?>" readonly="readonly"> 
                   <?php } else { ?>
                    <input name="username" class="form-control" value="<?php echo $user_data["username"]?>" readonly="readonly"> 
                   <?php }?>
                </div>
                
                <br>
                <div class="form-group">
                   <label>Phone number</label>
                   <?php if ($phone == "") {?>
                    <input class="form-control" name="phoneNumber" value="<?php echo $user_data["phone_num"]?>" readonly="readonly"> 
                   <?php } else { ?>
                    <input class="form-control" name="phoneNumber" value="<?php echo $user_data["phone_num"]?>" readonly="readonly"> 
                   <?php }?>
                </div>
                
                <br>
                <div class="form-group">
                   <label>Appointment Date</label>
                   <?php if ($phone == "") {?>
                    <input type="date" class="form-control" id="date" name="date">
                   <?php } else { ?>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $appointmentDate?>">
                   <?php }?>
                </div>
                <fieldset name="time">
                    <label>Appointment Time</label>
                    <select class="form-control" name="time" >
                        <option value="null">Select time</option>
                     
                        <option value="11am-12pm" <?= $appointmentTime == "11am-12pm" ? 'selected="selected"' : '' ?>>11am-12pm</option>
                        <option value="1pm-2pm" <?= $appointmentTime == "1pm-2pm" ? 'selected="selected"' : '' ?>>1pm-2pm</option>
                        <option value="2pm-3pm" <?= $appointmentTime == "2pm-3pm" ? 'selected="selected"' : '' ?>>2pm-3pm</option>
                    </select>
                </fieldset>
                <br>
                
                <fieldset name="reason">
                    <label>Reason</label>
                    <select class="form-control" name="reason" >
                        <option value="">Select reason</option>
                        <option value="AnnualPhysicals" <?= $reason == "AnnualPhysicals" ? 'selected="selected"' : '' ?>>Annual Physicals</option>
                        <option value="Vaccinations" <?= $reason == "Vaccinations" ? 'selected="selected"' : '' ?>>Vaccinations</option>
                        <option value="Treatment for common illnesses" <?= $reason == "Treatment for common illnesses" ? 'selected="selected"' : '' ?>>Treatment for common illnesses</option>
                    </select>
                </fieldset>
                <br>
                <fieldset>
                    <label>Doctor name</label>
                    <select class="form-control" name="doctorName">
                        <option value="">Select doctor</option>
                        
                        <?php if ($query->num_rows > 0) {?>>
                            <?php while($row = $query->fetch_assoc()) {?>
                                <?php $staffid = $row["StaffId"];?>
                                <?php $StaffName = $row["StaffName"];?>
                                <option value="<?php echo $staffid?>" <?= $doctorName == $staffid ? 'selected="selected"' : '' ?>><?php echo $StaffName?></option>
                        <?php } } ?>
                    </select>
                </fieldset>
                 <br>
                <fieldset name="visitType">
                    <label>Visit Type</label>
                    <select class="form-control" name="visitType">
                        <option value="">Select visit type</option>
                        <option value="Home Visit" <?= $visitType == "Home Visit" ? 'selected="selected"' : '' ?>>Home Visit</option>
                        <option value="Walk in" <?= $visitType == "Walk In" ? 'selected="selected"' : '' ?>>Walk in</option>
                    </select>
                </fieldset>
                 <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
