<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php 
    
    $error = isset($_GET["error"]) ? $_GET["error"] : "";

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
            <h3>Login as Patient</h3>
            <h5 class="text-danger"><?php echo $error ?></h5>
            <br>
            <form class="form" method="post" action="processPatientLogin.php">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button class="btn btn-primary">Login</button>
                <br>
                <a href="ForgetPassword.php?isPatient=true">Forgot username/password</a>
                <br>
                <a href="RegisterPatient.php">Create new account</a>
            </form>
        </div>
        
    </body>
</html>
