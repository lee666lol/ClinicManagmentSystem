<?php
             require_once("Database/db.php");
               if(!isset($_SESSION["Login_sess"])) 
                {
                    session_start();
                }
                if(isset($_SESSION['patient_id'])) {
                $user_data = $_SESSION['patient_id'];
                 }
 
                 $query
             ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to L&M Medical Design</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="Css&js/MainDesign.css"/>
 
    </head>
    <body>
<div class="bg-image1" 
            style="background-image: url('Image/Clinic.jpg');
                   height: 70vh;">
            <ul class="navbar1 mt-5">
                <li onclick="window.location.href = 'MainMedicalPage.php'">Home</li>
                <li onclick="window.location.href = 'ProductModule/ProductPage.php'">Product</li>
                <li onclick="window.location.href = 'AboutUs/aboutus.php'">About</li>
 
                <?php if (isset($_SESSION['patient_id'])) { ?>
                    <li onclick="window.location.href = 'LoginRegisterModule/Logout.php'">Logout</li>
                    <li class="dropdown-button1"><i class="fa fa-user" style="color: black">
                    <ul class="dropdown1">
                    <li onclick="window.location.href = 'PatientModule/viewProfilePage.php'">Profile</li>
                    <li onclick="window.location.href = 'Appointment/addAppointmentPage.php'">Appointment</li>
                    <li onclick="window.location.href = 'Appointment/viewAppointments.php'">Booking</li>
                    <li onclick="window.location.href = 'Payment/patientPaymentPage.php'">Payment</li>
                </ul>
                    </i>
                    </li>
                <?php } else {?>
                    <li onclick="window.location.href = 'LoginRegisterModule/LoginPage.php'">Login</li>
                <?php }?>
 
 
            </ul>
            <div class="title1">
                <h1><span>Welcome</span> L&M Clinic Center</h1>
                    <h1>We Are HappyTo See You</h1>
                    <h1>We Are Provide Some Of The Services To You</h1>
            </div>
       </div>
 
 <br>
 <br>
 <br>
        <hr/>
 
        <h2 style="text-align: center">Our Team Members Doctor</h2>
        <br>
 
 
        <div class="row">
            <div class="column">
              <div class="card">
                  <img src="Image/Doctor1.jpg" width="150px" height="150px" alt="#"/>
                <p>Mr.Doctor John</p>
                <p>More than 5 years in experinces internal medicine. <br>Fresh graduate from Taylor’s University</p>
                <a href="Appointment/addAppointmentPage.php"><button type="button" class="btn btn-primary">Booking</button></a>
              </div>
            </div>
 
            <div class="column">
              <div class="card">
               <img src="Image/Doctor2.jpg" width="150px" height="150px" alt="#"/>
                <p>Mr.Doctor Micheal</p>
                <p>More than 6 years in experinces internal medicine.<br>Fresh graduate from MAHSA University</p>
                <a href="Appointment/addAppointmentPage.php"><button type="button" class="btn btn-primary">Booking</button></a>
              </div>
            </div>
 
            <div class="column">
              <div class="card">
                <img src="Image/Doctor3.jpg" width="150px" height="150px" alt="#"/>
                <p>Mr.Doctor Jack</p>
                 <p>More than 5 years in experinces surgery & otolaryngology.<br>Graduate from UCSI University</p>
                <a href="Appointment/addAppointmentPage.php"><button type="button" class="btn btn-primary">Booking</button></a>
              </div>
            </div>
 
            <div class="column">
              <div class="card">
                <img src="Image/Doctor4.jpg" width="150px" height="150px" alt="#"/>
                <p>Mr.Doctor Wong</p>
                <p>More than 2 years in experinces surgery & otolaryngology.<br>Graduate from Taylor’s University</p>
                <a href="Appointment/addAppointmentPage.php"><button type="button" class="btn btn-primary">Booking</button></a>
              </div>
            </div>
        </div>
 
        <br>
        <br>
        <br>
               <hr/>
               <br>
               </style>
            
               <h2 style="text-align: center">Blog Artical</h2>
               <br>
               <br>
               <section>
                <div class="container reveal fade-right">
                  <div class="text-container">
                    <div class="text-box1">
                       <img src="Image/covid.jpg"  alt="#" style=" width: 400px; height: 150px;"/>
                       <hr/>
                      <h3>Covid-19 New In Malaysia</h3>
                      <p>
                          The Malaysian government has been asked why<br> it revoked 
                          emergency Covid regulations as cases continue to spike.
                      </p>
                     <p class="link"><a href="https://www.bbc.com/news/world-asia-57993617">For More Details</a></p>
 
                    </div>
                    <div class="text-box2">
                        <img src="Image/Mental-Health.jpg"  alt="#" style=" width: 450px; height: 150px;"/>
                        <hr/>
                      <h3>Good mental health</h3>
                      <p>
                          Good mental health is more than just the absence of mental illness.<br> 
                          It means you are in a state of wellbeing where you feel good and function well in the world.
                      </p>
                       <p class="link"><a href="https://www.healthdirect.gov.au/good-mental-health">For More Details</a></p>
                    </div>
                    <div class="text-box3">
                        <img src="Image/fever.jpg"  alt="#" style=" width: 400px; height: 150px;"/>
                        <hr/>
                      <h3>How to Treat a Viral Fever at Home</h3>
                      <p>
                        A viral fever is any fever that happens as a result of a <br>viral infection. 
                        Viruses are tiny germs that spread easily from person to person.
                      </p>
                       <p class="link"><a href="https://www.healthline.com/health/viral-fever-home-remedies">For More Details</a></p>
                    </div>
                  </div>
                </div>
              </section>
               <hr/>
               <script src="Css&js/ArticalDesignFunction.js"></script>
 
      <div class="footer">
          <h2>L&M Clinic Center</h2>
          
         <li><a href="MainMedicalPage.php">Home</a></li>
         <li><a href="Chatbot/bot.php">FAQ</a></li>
         <li><a href="AboutUs/aboutus.php">About</a></li>
         <p> Copyright 2023 by L&M Clinic Management System. All Rights Reserved.</p>
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7967.19843124024!2d101.734869739789!3d3.199494987102843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc38253567068d%3A0xb73ce055457b55c0!2sWangsa%20Maju%2C%2053300%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1683678260329!5m2!1sen!2smy" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
               
    </body>
 
</html>