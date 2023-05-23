 <?php
          include'../Database/db.php';
          include("../Database/function.php");
          session_start();
          $user_data = check_login($con);
          $status="";
                 if (isset($_POST['code']) && $_POST['code']!=""){
                    $code = $_POST['code'];
                    $result = mysqli_query($con,"SELECT * FROM `product` WHERE `ProductId`='$code'");
                    $row = mysqli_fetch_assoc($result);
                    $ProductName = $row['ProductName'];
                    $code = $row['ProductId'];
                    $ProductPrices = $row['ProductPrices'];
                    $ProductImage = $row['ProductImage'];

                 $cartArray = array(
                 $code=>array(
                 'ProductName'=>$ProductName,
                 'ProductId'=>$code,
                 'ProductPrices'=>$ProductPrices,
                 'Quantity'=>1,
                 'ProductImage'=>$ProductImage)
         );
                 if(empty($_SESSION["AddCart"])) {
             $_SESSION["AddCart"] = $cartArray;
             $status = "<div class='box'>Product is added to your cart!</div>";

         }else{
             $array_keys = array_keys($_SESSION["AddCart"]);
             if(in_array($code,$array_keys)) {
                 $status = "<div class='box' style='color:red;'>
                 Product is already added to your cart!</div>";	
             } else {
             $_SESSION["AddCart"] = array_merge(
             $_SESSION["AddCart"],
             $cartArray
             );
             $status = "<div class='box'>Product is added to your cart!</div>";
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
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping Cart System</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet" href="../Css&js/ProductPageDesign.css"/>
</head>

<body>
    <br>
  <div class="container">
         <div class="topnav">
            <a href="../MainMedicalPage.php">Home</a>
            <a href="../ProductModule/ProductPage.php">Product</a>
            <a href="../AboutUs/aboutus.php">About</a>
            <?php
             if(isset($user_data)){ ?>
            <a href="../LoginRegisterModule/Logout.php">Logout</a>
            <div class="dropdown">
                <button class="dropbtn">
                <i class="fa fa-user" style="color: black"></i>
            </button>
             <div class="dropdown-content">
            <a href="../PatientModule/profile.php">Profile</a>
            <a href="../Appointment/appointment.php">Appointment</a>
            <a href="../Appointment/booking.php">Booking</a>
            <a href="../Payment/myPay.php">Payment</a>
            <?php } else{ ?>
            <a href="../LoginRegisterModule/LoginPage.php">Login</a>
             <?php } ?>
             
             </div>
             </div> 
         </div>
  </div>
    <hr/>
    <br>
    <div class="Addcart">
         <?php
                if(!empty($_SESSION["AddCart"])) {
                $cart_count = count(array_keys($_SESSION["AddCart"]));
                ?>
                <div class="cart_div">
                <a href="Cart.php" class="fa fa-shopping-cart">Cart<span>
                <?php echo $cart_count; ?></span></a>
                </div>
                <?php
                }
                ?>
   
    <?php
                $result = mysqli_query($con, "SELECT * FROM product");
                while($row = mysqli_fetch_assoc($result)){
                $ProductImage = $row ['ProductImage'];
                $ProductName = $row ['ProductName'];
                $ProductDetails = $row ['ProductDetails']; 
                $ProductPrices = $row ['ProductPrices'];
                echo "<td>
                <div class='column'>
                <form method='post' action=''>
                <input type='hidden' name='code' value=".$row['ProductId']." />
                <div class='image' ><img src='".$row['ProductImage']."'style=' height:100px; width: 100px;'/></div>
                <div class='name'>".$row['ProductName']."</div>
                <div class='details'>".$row['ProductDetails']."</div>
                <div class='price'>RM ".$row['ProductPrices']."</div>
                <button type='submit' class='buy' name='AddCart'>Add To Cart</button>
                </form>
                </div></td>";
                }
                 mysqli_close($con);
    ?>
       
        <div style="clear:both;"></div>

        <div class="message_box" style="margin:10px 0px;">
        <?php echo $status; ?>
        </div>
        
    </div>
    </body>
</html>
