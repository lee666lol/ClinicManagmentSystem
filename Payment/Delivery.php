<?php
session_start();
    include("../Database/db.php");
    include("../Database/function.php");
  
    $user_data = check_login($con);
    
    
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
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
            <form class="form" method="post" id="delivery_form">
            <div class="form-group">
            <label for="fname"><i class="fa fa-user"></i> Full Name</label><br>
            <input type="text" class="form-control"  id="fname" name="fname" placeholder="John M. Doe" required>
            </div>
            <div class="form-group">
            <label for="number"><i class="fa fa-envelope"></i>Phone Number</label><br>
            <input type="text" class="form-control" id="phone_num" name="phone_num" placeholder="012-3456789" required>
            </div>
            <div class="form-group">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label><br>
            <input type="text" id="adr" class="form-control" name="address" placeholder="542 W. 15th Street" required>
            </div>
            <div class="form-group">
            <label for="city"><i class="fa fa-institution"></i> City</label><br>
            <input type="text" id="city" class="form-control" name="city" placeholder="New York" required>
            </div>
            <div class="form-group">
            <label for="state">State</label><br>
            <input type="text" id="state" class="form-control" name="state" placeholder="NY" required>
            </div>
            <div class="form-group">
            <label for="zip">Zip/Post code</label><br>
            <input type="text" id="zip" class="form-control" name="zip" placeholder="10001" required>
            </div>
            <div class="form-group">
            <label for="fname">Mark:</label><br>
            <textarea id="mark" name="mark" class="form-control" rows="10" cols="30"></textarea><br>
            <input type="submit" value="Submit" name="submit">
            </form>
            </div>
        </form>
        </div>
        <?php
        require('../Database/db.php');
        $status = 'Delivery';
// When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        $fname   = $_POST['fname']; 
        $phone_num = $_POST['phone_num'];
        $adr  = $_POST['address'];
        $city    = $_POST['city'];
        $state   = $_POST['state'];
        $zip     = $_POST['zip'];
        $mark    = $_POST['mark'];
        $user_data = $user_data['patient_id'];
        $delivery_id = $_SESSION["delivery_id"];
    $delivery_id = str_pad( $delivery_id, 10, "0", STR_PAD_LEFT );
        $query    = "Update `delivery` SET fname = '$fname', phone_num = '$phone_num', address = '$adr', city = '$city', state = '$state', zip= '$zip', mark = '$mark', status = '$status', patient_id = '$user_data'
                     WHERE delivery_id='DL$delivery_id'";
        
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "Added successful";
            header("../Payment/CheckOut.php");
        } else {
            echo 'Wrong!';
        }
        
    } else {
        
    }
    ?>
        <button style="" onclick="window.location = '../ProductModule/ProductPage.php'">Back</button>;
    </body>
</html>
