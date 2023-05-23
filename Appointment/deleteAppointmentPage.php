<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php include_once '../headerCustomer.php'; ?>
<?php

    $id = $_GET["appt_id"];
    $selectQuery = "SELECT * FROM appointment WHERE appt_id='$id'";
    
    $result = $con->query($selectQuery);

    
    $staff = "SELECT * FROM staff WHERE Possition = 'Doctor'";
    $query = $con->query($staff);

?>
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
        
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {?>
        <div class="mx-auto col-10 col-md-8 col-lg-6 mt-5 p-5 border border-secondary">
            <h1>DELETE THIS RECORD?</h1>
            <form action="processDeleteAppointment.php" method="post">
                <input hidden value="<?php echo $id?>" name="appt_id">

                <div class="form-group">
                   <label>Username</label>
                   <input name="username" class="form-control" value="<?php echo $row["username"] ?>" disabled > 
                </div>
                
                <br>
                <div class="form-group">
                    <label>Phone number</label>
                    <input name="phoneNumber" class="form-control" value="<?php echo $row["phone_num"] ?>" disabled >
                </div>
                <br>
                <div class="form-group">
                    <label>Appointment Time</label>
                    <input type="date" class="form-control" id="appointmentTime" name="appointmentTime" value="<?php echo $row["date"] ?>" disabled >
                </div>
                <br>
                
                <fieldset name="reason" disabled >
                    <label>Reason</label>
                    <select class="form-control" name="reason" disabled >
                        <option value="null">Select reason</option>
                        <option value="AnnualPhysicals" <?=$row["reason"] == 'AnnualPhysicals' ? 'selected="selected"' : ''?> disabled >Annual Physicals</option>
                        <option value="Vaccinations" <?=$row["reason"] == 'Vaccinations' ? 'selected="selected"' : ''?> disabled >Vaccinations</option>
                        <option value="Treatment for common illnesses" <?=$row["reason"] == 'Treatment for common illnesses' ? 'selected="selected"' : ''?> disabled >Treatment for common illnesses</option>
                    </select>
                </fieldset>
                <br>
                <fieldset>
                    <label>Doctor name</label>
                    <select class="form-control" name="doctorName" disabled>
                        <option value="">Select doctor</option>
                        
                        <?php if ($query->num_rows > 0) {?>>
                            <?php while($rows = $query->fetch_assoc()) {?>
                                <?php $staffid = $rows["StaffId"];?>
                                <?php $StaffName = $rows["StaffName"];?>
                                <option value="<?php echo $staffid?>" <?= $row["doc_name"] == $staffid ? 'selected="selected"' : '' ?> disabled><?php echo $StaffName?></option>
                        <?php } } ?>
                    </select>
                </fieldset>
                 <br>
                <fieldset name="visitType">
                    <label>Visit Type</label>
                    <select class="form-control" name="visitType" disabled >
                        <option value="null" readonly>Select visit type</option>
                        <option value="Home Visit" <?=$row["pattern"] == 'Home Visit' ? 'selected="selected"' : ''?> disabled >Home Visit</option>
                        <option value="Walk in" <?=$row["pattern"] == 'Walk in' ? 'selected="selected"' : ''?> disabled >Walk in</option>
                    </select>
                </fieldset>
                 <br>
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
        </div>
            
        <?php    
            }
        }
        ?>
    </body>
</html>
