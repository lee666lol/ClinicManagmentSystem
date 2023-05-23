<?php
session_start();
    include("../Database/db.php");
    include("../Database/function.php");
  
    $user_data = check_login($con);
        $status = '';

if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["AddCart"])) {
    foreach($_SESSION["AddCart"] as $key => $value) {
      if($_POST["ProductId"] == $key){
      unset($_SESSION["AddCart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["AddCart"]))
      unset($_SESSION["AddCart"]);
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["AddCart"] as &$value){
    if($value['ProductId'] === $_POST["ProductId"]){
        $value['Quantity'] = $_POST["Quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
$checkNumRows = "SELECT * FROM Delivery";
        $numrows = $con->query($checkNumRows)->num_rows;
$_SESSION["delivery_id"] = $numrows;



?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cart</title>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="../Css&js/cartDesign.css"/>
    </head>
    <body>
       
        <div class="cart">
           
            <?php
            if(isset($_SESSION["AddCart"])){
                $total_price = 0;
            ?>	
            <h2>Cart Item</h2>
            <hr/>
            <table class="table">
            <tbody>
            <a href="../ProductModule/ProductPage.php" class="btn btn-shop">Continue To Shop</a>
            <tr>
            <td></td>
            <td>ITEM NAME</td>
            <td>QUANTITY</td>
            <td>UNIT PRICE</td>
            <td>ITEMS TOTAL</td>
            </tr>	
            <?php
            $num=0;
            $a=array();
            foreach ($_SESSION["AddCart"] as $product){
            ?>
            <tr>
            <td>
            <img src='<?php echo $product["ProductImage"]; ?>' width="100" height="100" />
            </td>
            <td><?php echo $product["ProductName"]; ?><br />
            <form method='post' action=''>
            <input type='hidden' name='ProductId' value="<?php echo $product["ProductId"]; ?>" />
            <input type='hidden' name='action' value="remove" />
            <input type='hidden' name='number' value="<?php array_push($a,$product["ProductName"]); ?>" />
            <input type='hidden' name='number' value="<?php print_r($a); ?>" />
            <button type='submit' class='remove'>Remove Item</button>
            </form>
            </td>
            <td>
            <form method='post' action=''>
            <input type='hidden' name='ProductId' value="<?php echo $product["ProductId"]; ?>" />
            <input type='hidden' name='action' value="change" />
            <select name='Quantity' class='Quantity' onChange="this.form.submit()">
            <option <?php if($product["Quantity"]==1) echo "selected";?>
            value="1">1</option>
            <option <?php if($product["Quantity"]==2) echo "selected";?>
            value="2">2</option>
            <option <?php if($product["Quantity"]==3) echo "selected";?>
            value="3">3</option>
            <option <?php if($product["Quantity"]==4) echo "selected";?>
            value="4">4</option>
            <option <?php if($product["Quantity"]==5) echo "selected";?>
            value="5">5</option>
            </select>
            </form>
            </td>
            <td><?php echo "RM".$product["ProductPrices"]; ?></td>
            <td><?php echo "RM".$product["ProductPrices"]*$product["Quantity"]; ?></td>
            </tr>
            <?php
            echo "<script> var sessionValue = '<%=Session['total_price']%>'</script>";
            
          
            $total_price += ($product["ProductPrices"]*$product["Quantity"]);
            }
            ?>
            <tr>
            <td colspan="5" align="right">
            <strong>TOTAL: <?="RM".$total_price ?></strong>
              <form method="post" action">
                    <input type="hidden" name="total_price" value="<?=$total_price?>">
                    <input type="hidden" name="ProductName" value="<?=$product["ProductName"]?>">
                    <br>
                    <input type="submit" name="AddPay" class="btn btn-success" value="Proceed to Checkout">
            </form>
            </td>
            </tr>
            </tbody>
          
            </table>		
              <?php
            }else{
                    echo "<h3>Your cart is empty!</h3>";
                    }
            ?>
            </div>

            <div style="clear:both;"></div>

            <div class="message_box" style="margin:10px 0px;">
            <?php echo $status; ?>
            </div>
          
   <?php
   if(isset($_POST["AddPay"])){

        $total_price = $_POST['total_price'];
        
        if(!empty($total_price)){
            $patient_id = $user_data['patient_id'];
            $cart_id = random_int(100000, 999999);
            $payment_id = random_int(100000, 999999);
            $status = 'Pending';
            

    
            $sql = "INSERT INTO `payment`(`payment_id`, `patient_id`, `cart_id`, `total_price`, `status`) VALUES ('$payment_id','$patient_id','$cart_id','$total_price','$status')";
            //mysqli_query($con,$sql);
            
                        $product_Name = $_POST["ProductName"];
            
        $checkNumRows = "SELECT * FROM Delivery";
        $numrows = $con->query($checkNumRows)->num_rows;
        $s_number = str_pad( $numrows, 10, "0", STR_PAD_LEFT );
        $fname = "";
        $phone_num = "";
        $adr = "";
        $city = "";
        $city = "";
        $state = "";
        $zip = "";
        $mark = "";
        $status = "self_pickup";
        $user_data = "";
         $query    = "INSERT into `delivery` (delivery_id, fname, phone_num, address, city, state, zip, mark, status, patient_id)
                     VALUES ('DL$s_number', '$fname', '" .($phone_num). "', '$adr', '$city', '$state', '" .($zip) . "', '$mark', '$status', '$user_data')";
        $result   = mysqli_query($con, $query);
        $_SESSION["delivery_id"] = $s_number;
        if ($result) {
            echo 'test';
        } else {
            echo 'test2';
       }
        
       $products = "";
         for($i=0;$i<sizeof($a);$i++){
             $qry = "INSERT INTO `paymentdetail`(`payment_id`, `productName`) VALUES ('$payment_id','$a[$i]')";
              mysqli_query($con,$qry);
              $products .= $a[$i] . ",";
              
           };
           echo "Test";
           $cartItemsNo = "SELECT * FROM cart";
            $queryCart = $con->query($cartItemsNo)->num_rows;
            $s_number = str_pad( $queryCart, 4, "0", STR_PAD_LEFT );
            $cart_item = "INSERT INTO `cart` (cart_id, product_list, patient_id) VALUES ('C$s_number','$products', '$patient_id')";
            $_SESSION["cart"] = "C$s_number";
            mysqli_query($con,$cart_item);
            echo "<script> window.location.href = '../Payment/CheckOut.php';</script>";
           die;
       }
       else{
           echo "<script>alert('Please enter valid information')</script>";
          
       }
   }  
       
   
   ?>
                      
    </body>
</html>
