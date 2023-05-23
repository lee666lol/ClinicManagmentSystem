<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php include_once '../headerCustomer.php'; ?>
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
        <form method="POST" action="editProfile.php" class="form mx-auto col-10 col-md-8 col-lg-6 mt-5 p-5 border border-secondary">
            <h3>Profile details</h3>
            <div class="form-group">
                <label>Username</label><input class="form-control" value="<?php echo $user_data['username']?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label>IC Number</label><input class="form-control" value="<?php echo $user_data['ic_number']?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label>Gender</label><input class="form-control" value="<?php echo $user_data['gender']?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label>Email</label><input class="form-control" value="<?php echo $user_data['email']?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label>Phone number</label><input class="form-control" value="<?php echo $user_data['phone_num']?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label>Address</label><input class="form-control" value="<?php echo $user_data['address']?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label>Age</label><input class="form-control" value="<?php echo $user_data['age']?>" readonly="readonly">
            </div>
            <button class="btn btn-primary">Edit profile</button>
        </form>
    </body>
</html>
