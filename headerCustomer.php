<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
 <?php
          include'Database/db.php';
          include("Database/function.php");
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

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta charset="UTF-8">
        <meta name="author" content="Sahil Kumar">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="Css&js/customerHeader.css"/>
        <script src="Css&js/PatientProfile.js"></script>   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            /*
            Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
            Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/css.css to edit this template
            */
            /* 
                Created on : Dec 9, 2022, 2:36:21 AM
                Author     : User
            */
            @import url('https://fonts.googleapis.com/css?family=Abel|Aguafina+Script|Artifika|Athiti|Condiment|Dosis|Droid+Serif|Farsan|Gurajada|Josefin+Sans|Lato|Lora|Merriweather|Noto+Serif|Open+Sans+Condensed:300|Playfair+Display|Rasa|Sahitya|Share+Tech|Text+Me+One|Titillium+Web');
            body{
                  box-sizing: border-box;
                  font-family: Arial, Helvetica, sans-serif;
            }
            /*Pill Navbar*/

            /* The navbar */
            .topnav {
              background-color: whitesmoke;
            }

            /* Navbar links */
            .topnav a {
              float: left;
              color: black;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
              font-size: 17px;
            }

            .topnav a:hover {
              background-color: #ddd;
              color: black;
            }

            .column .image img{
                background-color: red;
                height: 50px;
                width: 50px;
            }

            .sidebar {
              height: 100%;
              width: 0;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #111;
              overflow-x: hidden;
              transition: 0.5s;
              padding-top: 60px;
            }

            .sidebar a {
              padding: 8px 8px 8px 32px;
              text-decoration: none;
              font-size: 25px;
              color: #818181;
              display: block;
              transition: 0.3s;
            }

            .sidebar a:hover {
              color: #f1f1f1;
            }

            .sidebar .closebtn {
              position: absolute;
              top: 0;
              right: 25px;
              font-size: 36px;
              margin-left: 50px;
            }

            .openbtn {
              font-size: 20px;
              cursor: pointer;
              background-color: #111;
              color: white;
              padding: 10px 15px;
              border: none;
            }

            .openbtn:hover {
              background-color: #444;
            }

            #main {
              transition: margin-left .5s;
              padding: 30px;
            }

            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
              .sidebar {padding-top: 15px;}
              .sidebar a {font-size: 18px;}
            }



            .Addcart{
                padding: 50px 100px;
                background-color: ghostwhite;
            }

            .column {
              float: left;
              width: 25%;
              padding: 0 10px;
            }

            /* Remove extra left and right margins, due to padding */
            .row {margin: 0 -5px;}

            /* Clear floats after the columns */
            .row:after {
              content: "";
              display: table;
              clear: both;
            }

            /* Responsive columns */
            @media screen and (max-width: 600px) {
              .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
              }
            }

            /* Style the counter cards */
            .card {
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
              padding: 16px;
              text-align: center;
              background-color: #f1f1f1;
            }
            
            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown .dropbtn {
              font-size: 16px;  
              border: none;
              outline: none;
              color: white;
              padding: 14px 16px;
              background-color: inherit;
              font-family: inherit;
              margin: 0;
            }
            
            .navbar a:hover, .dropdown:hover .dropbtn {
                background-color: inherit;
            }

            .dropdown-content {
              display: none;
              position: absolute;
              background-color: black;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }

            .dropdown-content a {
              float: none;
              color: white;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
              text-align: left;
            }

            .dropdown-content a:hover {
              background-color: #ddd;
            }

            .dropdown:hover .dropdown-content {
              display: block;
            }
            #Product_Form{
                min-width: 600px;
                min-height: 300px;
                text-align: center;
                font-size: 20px;
                background-color: ghostwhite;
            }

            .table, th, td {
              border:1px solid black;
              text-align: center
            }
        </style>
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
            <a href="../PatientModule/viewProfilePage.php">Profile</a>
            <a href="../Appointment/addAppointmentPage.php">Appointment</a>
            <a href="../Appointment/viewAppointments.php">Booking</a>
            <a href="../Payment/patientPaymentPage.php">Payment</a>
            <?php } else{ ?>
            <a href="../LoginRegisterModule/LoginPage.php">Login</a>
             <?php } ?>
             
             </div>
             </div> 
         </div>
  </div>
    <hr/>
    
    <br>
    </body>
</html>