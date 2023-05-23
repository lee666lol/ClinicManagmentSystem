<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php 
$error = isset($_GET["error"]) ? $_GET["error"] : "";
$appt_id = isset($_POST["appt_id"]) ? $_POST["appt_id"] : "";
$patient_id = isset($_POST["patient_id"]) ? $_POST["patient_id"] : "";
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
        <div class="container mx-auto col-10 col-md-8 col-lg-6 mt-5 p-5 border border-secondary">
            <form class="form" method="post" action="processCancelAppointment.php">
                <input value="<?php echo $appt_id ?>" name="appt_id" hidden>
                <input value="<?php echo $patient_id ?>" name="patient_id" hidden>
                <h3 class="text-danger"><?php echo $error ?></h3>

            <fieldset name="cancelReason">
                    <label>Cancel Reason</label>
                    <select class="form-control" name="cancelReason">
                        <option value="">Select reason</option>
                        <option value="Personal or family emergency">Personal or family emergency</option>
                        <option value="Feeling sick or unwell">Feeling sick or unwell</option>
                        <option value="Stuck in traffic">Stuck in traffic</option>
                    </select>
                </fieldset>
                <button class="btn btn-danger mt-5">Cancel booking</button>
            </form>
        </div>
        
    </body>
</html>
