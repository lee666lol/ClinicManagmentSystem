<?php include_once '../headerCustomer.php'; ?>
<?php 
    $payeeID = $_GET["PayerID"];
    $payment_id = isset($_GET["payment_id"]) ? $_GET["payment_id"] : "";
    $date = new DateTime(); // format: YYYY-MM-DD
    $result = $date->format('Y-m-d');
    $patient_id = $user_data['patient_id'];
    $cartId = $_SESSION["cart"];
    $price = $_GET["total_price"];
    $date = new DateTime(); // format: YYYY-MM-DD
    $paymentDate = $date->format('Y-m-d');
    
    $paymentQuery = "INSERT INTO payment VALUES ('$payment_id', '$patient_id', '$cartId', $price, '$paymentDate', 'Paid')";
    $result = $con->query($paymentQuery);
    if ($result == true) {


    } else {
        echo "<script>alert('Error setting payment to paid!');</script>";
        echo $con->error;
        die;
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
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta http-equiv="refresh" content="5;url=../MainMedicalPage.php">
    </head>
    <body>
        <div class="">
            <div class="d-flex justify-content-center">
                <div><img src="../Image/checked.png" alt="" width="300" height="300"></div>
            </div>
            <div class="d-flex justify-content-center">
                <h1>Payment Done Successfully...!</h1>
            </div>
            <div class="d-flex justify-content-center">
                <a href="../MainMedicalPage.php">Return to main page</a>
            </div>
        </div>
    </body>
</html>