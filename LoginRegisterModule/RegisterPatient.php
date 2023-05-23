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
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="mx-auto col-10 col-md-8 col-lg-6 mt-5 p-5 border border-secondary">
            <h3>Register as Patient</h3>
            <h3 class="text-danger"><?php echo $error?></h3>
            <form class="form" method="post" action="processPatientSignup.php">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" id="username">
                </div>
                <br>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" name="password" id="password" type="password">
                </div>
                <br>
                <div class="form-group">
                    <label>IC Number</label>
                    <input class="form-control" name="ic">
                </div>
                <br>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email">
                </div>
                <br>
                <fieldset><!-- comment -->
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender" name="gender" >
                            <option value="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </fieldset>
<br>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" name="phone">
                </div>
<br>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" name="address">
                </div>
<br>
                <div class="form-group">
                    <label>Age</label>
                    <input class="form-control" name="age">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
        
    </body>
</html>
