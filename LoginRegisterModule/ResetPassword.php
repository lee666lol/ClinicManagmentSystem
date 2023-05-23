<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php 
    require('../Database/db.php');
    
    $error = isset($_GET["error"]) ? $_GET["error"] : "";
    
    $hexToken = $_GET["token"];
    $email = $_GET["email"];
    
    $isStaff = isset($_GET["isStaff"]) ? $_GET["isStaff"] : false;
    $isPatient = isset($_GET["isPatient"]) ? $_GET["isPatient"] : false;
    $isDoctor = isset($_GET["isDoctor"]) ? $_GET["isDoctor"] : false;
    
    $a = "SELECT * FROM resetPassword WHERE rpEmail='$email'";
    $result = $con->query($a);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $binToken = hex2bin($hexToken);
            $checkPassword = password_verify($hexToken, $row["rpToken"]);
            if ($checkPassword === false) {
                 header('Location: LoginPatient.php');
                 exit();
            }
        }
        
    }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <title></title>
    </head>
    <body>
        <div class="mx-auto col-10 col-md-8 col-lg-6 mt-5 p-5 border border-secondary">
           
            <br>
            <form class="form" method="post" action="processResetPassword.php">
                 <h3>Change Password</h3>
                 <input hidden value="<?php echo $isPatient ?>" name="isPatient">
                 <input hidden value="<?php echo $isStaff ?>" name="isStaff">
                 <input hidden value="<?php echo $isDoctor ?>" name="isDoctor">
                 <h3 class="text-danger"><?php echo $error ?></h3>
                <input hidden value="<?php echo $email?>" name="email">
                <input hidden value="<?php echo $hexToken?>" name="token">
                <div class="form-group"><!-- comment -->
                    <label>Enter Password</label>
                    <input class="form-group" name="password" type="password">
                </div>
                <div class="form-group"><!-- comment -->
                    <label>Re-enter Password</label>
                    <input class="form-group" name="reenterPassword" type="password">
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
        
    </body>
</html>

