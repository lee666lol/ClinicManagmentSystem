<?php
require("../Database/db.php");
if (!isset($_SESSION["Login_sess"])) {
    session_start();
}
 
$StaffId = $_SESSION["StaffId"];
$findresult = mysqli_query($con, "SELECT * FROM staff WHERE StaffId= '$StaffId'");
if ($res = mysqli_fetch_array($findresult)) {
    $StaffId = $res['StaffId'];
    $StaffName = $res['StaffName'];
}
 
$patient_id = isset($_POST["patient_id"]) ? $_POST["patient_id"] : "";
$patient_name = "";
$ChargeMedical2 = 0;
$ChargeMedical = 0;
$ChargeMedical3 = 0;
 
mysqli_close($con);
?>
<?php
require("../Database/db.php");
if (isset($_POST['report'])) {
    $appt_id = $_POST['appt_id'];
 
    $_SESSION['apptID'] = $appt_id;
    $query = $con->query("Select * from appointment where appt_id = '$appt_id'");
    while ($row = $query->fetch_assoc()) {
        $patient_id = $row["patient_id"];
        $getPatientName = "Select * from patients WHERE patient_id = '$patient_id'";
        $result = $con->query($getPatientName);
        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $patient_name = $rows["username"];
            }
        }
    }
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Medical And Services Charges</title>
        <link rel="stylesheet" href="../Css&js/aaa.css"/>
    </head>
    <body>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="../StaffModule/StaffControlPanel.php">Home</a>
            <a href="../ProductModule/Product.php">Product</a>
            <a href="../Payment/PaymentService.php">Payment Medical Services</a>
            <a href="../Payment/StaffEdtPay.php">Patient Payment Status</a>
            <a href="../StaffModule/StaffProfile.php">Profile</a>
            <a href="../Report/ReportModule.php">Report</a>
            <?php if (isset($StaffId)) { ?>
                <a href="../LoginRegisterModule/Logout.php">Logout</a>
            <?php } else { ?>
                <a href="../LoginRegisterModule/LoginPage.php">Login</a>
            <?php } ?>
        </div>
        <div id="main">
            <button class="openbtn" onclick="openNav()">☰</button>  
 
 
            <form class="form" method="post" name="Service" id="service" enctype="multipart/form-data" action="">
                <h1 class="Service-title">Services Medical Record </h1>
                <input name="StaffId" hidden value="<?php echo $StaffId ?>">
                <input name="StaffName" hidden value="<?php echo $StaffName ?>">
                <label>Staff/Doctor Name :</label>
                <?php echo $StaffId; ?>
                <br>
                <label>Staff/Doctor Name :</label>
                <?php echo $StaffName; ?>
                <br>
                <label>Appointment ID :</label>
                <input type='text' name='apptId' disabled value='<?= $appt_id ?>'/>
                <br>
                <label>Patient Name :</label>
                <input type="text" class="Service-input" name="Patient_Name" placeholder="Patient Name" required />
                <br>
                <label>Services :</label>
                <br>
                <select name="Services" id="Services">
                    <option value="Please Select the Services">Please Select the Services</option>
                    <option value="Annual Physicals" >Annual Physicals</option>
                    <option value="Vaccinations" >Vaccinations</option>
                    <option value="Laboratory Testing" >Laboratory Testing</option>
                    <option value="Screening And Treatment For Conditions" >Screening And Treatment For Conditions</option>
                    <option value="Care For Minor Symptoms" >Care For Minor Symptoms</option>
                    <option value="Treatment For Common Illnesses" >Treatment For Common Illnesses</option>
                    <option value="Treatment Of Some Injuries" >Treatment Of Some Injuries</option>
                </select>
                <br>
                <br>
                <?php
                if (isset($_POST['Services'])) {
                    if (!empty($_POST['Services'])) {
                        $selected = $_POST['Services'];
                        switch ($selected) {
                            case "Annual Physicals":
                                $Charge = '50.00';
                                break;
                            case "Vaccinations":
                                $Charge = '100.00';
                                break;
                            case "Laboratory Testing":
                                $Charge = '120.00';
                                break;
                            case "Screening And Treatment For Conditions":
                                $Charge = '120.00';
                                break;
                            case "Care For Minor Symptoms":
                                $Charge = '110.00';
                                break;
                            case "Treatment For Common Illnesses":
                                $Charge = '110.00';
                                break;
                            case "Treatment Of Some Injuries":
                                $Charge = '120.00';
                                break;
                        }
                    } else {
                        echo 'Please select the Services.';
                    }
                }
                ?> 
                <label>Details :</label>
                <textarea class="Service-input"id="Details" name="Details" rows="4" cols="50"/></textarea>
                <label>Blood Pressure :</label><br>
                <input type="text" class="Service-input" name="B_Pressure" placeholder="Blood Pressure" required />
                <label>Body Temperature :</label><br>
                <input type="text" class="Service-input" name="B_Temperature" placeholder="Body Temperature" required />
                   <label>Medical :</label>
                <br>
                <select name="Medical" id="Medical">
                    <option value="">Please Select the Services</option>
                    <option value="Panadol" >Panadol</option>
                    <option value="ZamBuk" >ZamBuk</option>
                    <option value="Cotton Pad" >Cotton Pad</option>
                    <option value="Antibiotic" >Antibiotic</option>
                    <option value="Cough drop" >Cough drop</option>
                    <option value="-" >-</option>
                </select>
                <?php
                if (isset($_POST['Medical'])) {
                    if (!empty($_POST['Medical'])) {
                        $selected = $_POST['Medical'];
                        switch ($selected) {
                            case "Panadol":
                                $ChargeMedical = '20.00';
                                break;
                            case "ZamBuk":
                                $ChargeMedical = '15.00';
                                break;
                            case "Cotton Pad":
                                $ChargeMedical = '30.00';
                                break;
                            case "Antibiotic":
                                $ChargeMedical = '50.00';
                                break;
                            case "Cough drop":
                                $ChargeMedical = '38.00';
                                break;
                            case "-":
                                $ChargeMedical = '0.00';
                                break;
                        }
                    } else {
                        echo 'Please select the Medical.';
                    }
                }
                ?> 
                <br>
                <select name="Medical1" id="Medical1">
                    <option value="">Please Select the Services</option>
                    <option value="Panadol" >Panadol</option>
                    <option value="ZamBuk" >ZamBuk</option>
                    <option value="Cotton Pad" >Cotton Pad</option>
                    <option value="Antibiotic" >Antibiotic</option>
                    <option value="cough_drop" >Cough_drop</option>
                    <option value="-" >-</option>
                </select>
                 <?php
                if (isset($_POST['Medical1'])) {
                    if (!empty($_POST['Medical1'])) {
                        $selected = $_POST['Medical1'];
                        switch ($selected) {
                            case "Panadol":
                                $ChargeMedical1 = '20.00';
                                break;
                            case "ZamBuk":
                                $ChargeMedical1 = '15.00';
                                break;
                            case "Cotton Pad":
                                $ChargeMedical1 = '30.00';
                                break;
                            case "Antibiotic":
                               $ChargeMedical1 = '50.00';
                                break;
                            case "Cough drop":
                                $ChargeMedical1 = '38.00';
                                break;
                            case "-":
                                $ChargeMedical1 = '0.00';
                                break;
                        }
                    } else {
                        echo 'Please select the Medical.';
                    }
                }
                ?> 
                <br>
                <select name="Medical2" id="Medical2">
                    <option value="">Please Select the Services</option>
                    <option value="Panadol" >Panadol</option>
                    <option value="ZamBuk" >ZamBuk</option>
                    <option value="Cotton Pad" >Cotton Pad</option>
                    <option value="Antibiotic" >Antibiotic</option>
                    <option value="cough_drop" >Cough_drop</option>
                    <option value="-" >-</option>
                </select>
                <br>
                <br>
                 <?php
                if (isset($_POST['Medical2'])) {
                    if (!empty($_POST['Medical2'])) {
                        $selected = $_POST['Medical2'];
                        switch ($selected) {
                            case "Panadol":
                                $ChargeMedical2 = '20.00';
                                break;
                            case "ZamBuk":
                                $ChargeMedical2 = '15.00';
                                break;
                            case "Cotton Pad":
                                $ChargeMedical2 = '30.00';
                                break;
                            case "Antibiotic":
                                $ChargeMedical2 = '50.00';
                                break;
                            case "Cough drop":
                                $ChargeMedical2 = '38.00';
                                break;
                            case "-":
                                $ChargeMedical2 = '0.00';
                                break;
                        }
                    } else {
                        echo 'Please select the Medical.';
                    }
                }
                ?> 
                <input name="patient_id" hidden value="<?php echo $patient_id ?>">
                <input type="submit" value="submit" name="submit" class="Service-button"/>
 
            </form>
            <?php
 
            if (isset($_POST['submit'])) {
                $staffId = $_POST['StaffId'];
                $staffName = $_POST['StaffName'];
                $Patient_Name=$_POST['Patient_Name'];
                $Services = $_POST['Services'];
                $apptID = $_SESSION['apptID'];
                $Details = $_POST['Details'];
                $B_Pressure = $_POST['B_Pressure'];
                $B_Temperature = $_POST['B_Temperature'];
                $Medical = $_POST['Medical'];
                $Medical1 = $_POST['Medical1'];
                $Medical2 = $_POST['Medical2'];
                $Time = date("d-m-y H:i:s");
 
                $query1 = "INSERT Into `medical` (StaffId, StaffName, Patient_Name, Patient_Id, appt_id, Services, Charge, Details, B_Pressure, B_Temperature, Medical, Medical1, Medical2, ChargeMedical, ChargeMedical1, ChargeMedical2, Time)
                     VALUES ('$StaffId', '$staffName', '$Patient_Name', '$patient_id', '$apptID', '$Services', '" . ($Charge) . "', '$Details', '$B_Pressure', '$B_Temperature', '$Medical', '$Medical1', '$Medical2', '" . ($ChargeMedical) . "', '" . ($ChargeMedical1) . "', '" . ($ChargeMedical2) . "', '$Time')";
 
                $creat_datetime = date("d-m-Y H:i:s");
                $checkNumRows = "SELECT * FROM servicecharges";
                $rowCount = $con->query($checkNumRows)->num_rows;
                $s_number = str_pad( $rowCount, 3, "0", STR_PAD_LEFT );
                $query    = "INSERT into `servicecharges` (doctorid, patient_id, total_price, appt_id, Payment_service_id, paymentTime, status)
                         VALUES ('$StaffId', '$patient_id', '$Charge', '" .($apptID). "', 'SC$s_number', '$creat_datetime', 'Unpaid')";
 
                $query2 = "UPDATE Appointment SET status = 'Done' WHERE appt_id = '$apptID'";
 
                $result   = mysqli_query($con, $query1);
 
                $result1 = mysqli_query($con, $query);
                $result2 = mysqli_query($con, $query2);
                if ($result || $result1 || $result2) {
                     echo "Records added successfully.";
                     echo '<script>';
                     echo 'document.getElementById("service").style.display = "none";';
                     echo '</script>';
                     echo "<script>window.location = '../StaffModule/StaffMenuControl.php?error=$ex'</script>";
 
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
            } else {
                echo "Tssss";
            }
 
            ?>
        </div>
 
        <script>
            function openNav() {
                document.getElementById("mySidebar").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }
 
            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
        </script>
 
    </body>
</html>