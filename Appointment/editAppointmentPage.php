<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

<?php

    $id = $_GET["appt_id"];
    $error = isset($_GET["error"]) ? $_GET["error"] : "";
    
    $selectQuery = "SELECT * FROM Appointment WHERE appt_id='$id'";
    
    $con = mysqli_connect("localhost", "root", "", "clinic");
    
    $result = $con->query($selectQuery);
    
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
        
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {?>
        <div class="mx-auto col-10 col-md-8 col-lg-6 mt-5 p-5 border border-secondary">
            <h1>Edit Appointment</h1>
            <h3 class="text-danger"><?php echo $error ?></h3>
            <form action="processEditAppointment.php" method="post">
                <input hidden value="<?php echo $id?>" name="appt_id">
                <div class="form-group">
                   <label>Username</label>
                   <input name="username" class="form-control" value="<?php echo $row["username"] ?>" readonly> 
                </div>
                
                <br>
                <div class="form-group">
                    <label>Phone number</label>
                    <input name="phoneNumber" class="form-control" value="<?php echo $row["username"] ?>" readonly>
                </div>
                <br>
                <div class="form-group">
                    <label>Appointment Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $row["date"] ?>">
                </div>
                
                <fieldset name="time">
                    <label>Appointment Time</label>
                    <select class="form-control" name="time">
                        <option value="null">Select time</option>
                        <option value="11am-12pm" <?=$row["time"] == '11am-12pm' ? 'selected="selected"' : ''?>>11am-12pm</option>
                        <option value="1pm-2pm" <?=$row["time"] == '1pm-2pm' ? 'selected="selected"' : ''?>>1pm-2pm</option>
                        <option value="2pm-3pm" <?=$row["time"] == '2pm-3pm' ? 'selected="selected"' : ''?>>2pm-3pm</option>
                    </select>
                </fieldset>
                <br>
                
                <fieldset name="reason">
                    <label>Reason</label>
                    <select class="form-control" name="reason" >
                        <option value="null">Select reason</option>
                        <option value="AnnualPhysicals" <?=$row["reason"] == 'AnnualPhysicals' ? 'selected="selected"' : ''?>>Annual Physicals</option>
                        <option value="Vaccinations" <?=$row["reason"] == 'Vaccinations' ? 'selected="selected"' : ''?>>Vaccinations</option>
                        <option value="Treatment for common illnesses" <?=$row["reason"] == 'Treatment for common illnesses' ? 'selected="selected"' : ''?>>Treatment for common illnesses</option>
                    </select>
                </fieldset>
                <br>
                <fieldset>
                    <label>Doctor name</label>
                    <select class="form-control" name="doctorName">
                        <option value="">Select doctor</option>
                        
                        <?php if ($query->num_rows > 0) {?>>
                            <?php while($rows = $query->fetch_assoc()) {?>
                                <?php $staffid = $rows["StaffId"];?>
                                <?php $StaffName = $rows["StaffName"];?>
                                <option value="<?php echo $staffid?>" <?= $row["doc_name"] == $staffid ? 'selected="selected"' : '' ?>><?php echo $StaffName?></option>
                        <?php } } ?>
                    </select>
                </fieldset>
                 <br>
                <fieldset name="visitType">
                    <label>Visit Type</label>
                    <select class="form-control" name="visitType">
                        <option value="null">Select visit type</option>
                        <option value="Home Visit" <?=$row["pattern"] == 'Home Visit' ? 'selected="selected"' : ''?>>Home Visit</option>
                        <option value="Walk in" <?=$row["pattern"] == 'Walk in' ? 'selected="selected"' : ''?>>Walk in</option>
                    </select>
                </fieldset>
                 <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
            
        <?php    
            }
        }
        ?>
    </body>
</html>
