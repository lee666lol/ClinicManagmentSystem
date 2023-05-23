<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include('../Database/db.php');
if (isset($_GET["key"]) && isset($_GET["Email"]) && isset($_GET["action"]) 
&& ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $key = $_GET["key"];
  $email = $_GET["Email"];
  $curDate = date("d-m-Y H:i:s");
  $query = mysqli_query($con,
  "SELECT * FROM `staff` WHERE `key`='".$key."' and `Email`='".$Email."';"
  );
  $row = mysqli_num_rows($query);
  if ($row==""){
  $error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="https://www.allphptricks.com/forgot-password/index.php">
Click here</a> to reset password.</p>';
	}else{
  $row = mysqli_fetch_assoc($query);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
  ?>
  <br />
  <form method="post" action="" name="update">
  <input type="hidden" name="action" value="update" />
  <br /><br />
  <label><strong>Enter New Password:</strong></label><br />
  <input type="password" name="Password" maxlength="25" required />
  <br /><br />
  <input type="hidden" name="email" value="<?php echo $Email;?>"/>
  <input type="submit" value="Reset Password" />
  </form>
<?php
}else{
$error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>";
            }
      }
if($error!=""){
  echo "<div class='error'>".$error."</div><br />";
  }			
} // isset email key validate end


if(isset($_POST["Email"]) && isset($_POST["action"]) &&
 ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["Password"]);
$email = $_POST["Email"];
$curDate = date("Y-m-d H:i:s");

  if($error!=""){
echo "<div class='error'>".$error."</div><br />";
}else{
$Password = md5($Password);
mysqli_query($con,
"UPDATE `staff` SET `Password`='".$Password."', `trn_date`='".$curDate."' 
WHERE `email`='".$email."';"
);

mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
	
echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="https://www.allphptricks.com/forgot-password/login.php">
Click here</a> to Login.</p></div><br />';
	  }		
}
?>