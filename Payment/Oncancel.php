<!DOCTYPE html>
<?php 
use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/PHPMailer/src/Exception.php';
    require '../PHPMailer/PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    
    include '../Email/failPay.php';
    
require '../Database/db.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Cancel</title>

    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <link rel="stylesheet" href="../Css&js/SucessfulPayment.css">

</head>
<body>
<main id="cart-main">

    <div class="site-title text-center">
        <div><img src="../Image/cancel.png" alt="" style="width: 100px; height: 100px;margin-left: 700px"></div>
        <h1 class="font-title">Payment Cancel For Some Reason</h1>
    </div>
      
     <form action="../MainMedicalPage.php" method="post">
                
                    <td> <input type="submit" name="update" class="btn btn-danger" value="Back To The Home Page"> </td>
            </form>

</main>
</body>
</html>

