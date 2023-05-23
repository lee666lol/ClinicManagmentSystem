<?php
session_start();
    include("../Database/db.php");
    include("../Database/function.php");
  
    $user_data = check_login($con);
    $status="";
     if(isset($_SESSION["AddPay"])){
    $total_price = 0;
   $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   
    $paypal_email = 'sb-l7bjy25856462@business.example.com';
     };
     $paymentNumbers = "SELECT * FROM payment";
     $paymentQuery = $con->query($paymentNumbers)->num_rows;
     $s_number = str_pad( $paymentQuery, 4, "0", STR_PAD_LEFT );
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Check Out Page</title>
            <link rel="stylesheet" href="../Css&js/CheckOutDesign.css">
    </head>
    <body>
        <h2>Check Out Product Details</h2>
        <hr />
        
            <?php
            if(isset($_SESSION["AddCart"])){
                $total_price = 0;
            ?>	
            <table class="table">
            <tbody>
            <tr>
            <td></td>
            <td>ITEM NAME</td>
            <td>QUANTITY</td>
            <td>UNIT PRICE</td>
            <td>ITEMS TOTAL</td>
            </tr>	
            <?php		
            foreach ($_SESSION["AddCart"] as $product){
            ?>
            <tr>
            <td>
            <img src='<?php echo $product["ProductImage"]; ?>' width="100" height="100" />
            </td>
            <td><?php echo $product["ProductName"]; ?><br />
           
            </td>
            <td>
                <?php echo $product["Quantity"]; ?></td>
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
            </td>
            </tr>
            </tbody>
            
            </table>
              <?php
            }else{
                    echo "<h3>Your cart is empty!</h3>";
                    }
            ?>
    
        <button onclick="window.location = '../Payment/Delivery.php'">Delivery</button>
            
        <?php $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   
    $paypal_email = 'sb-l7bjy25856462@business.example.com'; ?>
        <div class="buttons">
        <form action="<?php echo $paypal_url; ?>" method="post">			
			<!-- Paypal business test account email id so that you can collect the payments. -->
			<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">			
			<!-- Buy Now button. -->
			<input type="hidden" name="cmd" value="_xclick">			
			<!-- Details about the item that buyers will purchase. -->
			<input type="hidden" name="item_name" value="<?php echo "qwe" ?>">
			<input type="hidden" name="item_number" value="<?php echo 132 ?>">
			<input type="hidden" name="amount" value="<?php echo $total_price?>">
			<input type="hidden" name="currency_code" value="USD">			
			<!-- URLs -->
			<input type='hidden' name='cancel_return' value='http://localhost/ClinicManagementSystem/Payment/cancel.php'>
			<input type='hidden' name='return' value='http://localhost/ClinicManagmentSystem/Payment/productPaymentSuccess.php?payment_id=<?php echo "P$s_number"?>&total_price=<?php echo $total_price ?>'>
			<!-- payment button. -->
                        <button name="submit" type="submit" class="btn btn-primary">Make payment</button> 
	</form>
    </div>
        <?php
        unset ($_SESSION["AddCart"]);
        ?>
    </body>
</html>
