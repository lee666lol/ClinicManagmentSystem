 <?php
//             require_once("Database/db.php");
//               if(!isset($_SESSION["Login_sess"])) 
//                {
//                    session_start();
//                }
//                if(isset($_SESSION['patient_id'])) {
//                $user_data = $_SESSION['patient_id'];
//                 }
             ?>

<!DOCTYPE html>
<html>
<!--    <head>
        <meta charset="UTF-8">
        <title>About Us</title>
        <link rel="stylesheet" href="../Css&js/aboutus.css">
    </head>
    <body>
        
         <div class="nav">
         <div class="topnav">
            <a href="../MainMedicalPage.php">Home</a>
            <a href="../ProductModule/ProductPage.php">Product</a>
            <a href="../AboutUs/aboutus.php">About</a>
            
         </div>
        </div>
        <br>
        <hr/>
        <section id="about">
            <div id="about-1">
                 <h1>About Us</h1>
                 <hr/>
                <h1>"I Care, I am Reliable, I Make a Difference"</h1>
                <p>L&M Clinic Centre is a Private Clinic located in Setapak. L&M Clinic Centre offers a wide range of
                    medical services, including outpatient specialist care, health and wellness programs, 24-hour emergency
                    services, and construction and innovative medical equipment. These are backed by solid support,
                    including medical specialists, allied health personnel, and well-trained, dedicated nursing staff. L&M
                    Clinic Centres is an Australian Council for Healthcare Standards (ACHS) approved private practice,
                    Malaysia's first and most established private medical and health sciences university, established in 1999.
                    Designed to provide healthcare in a state-of-the-art environment, the L&M Clinic Centre is currently
                    building a clinic management system and is expected to start operations in 2023. Equipped with many
                    features to help patients and staff.

                    L&M Clinic Centre is linked to the Jeffrey Shea School of Medicine and Health Sciences, Monash
                    University Malaysia, Cambridge University, Royal Papworth Hospital and Harvard Medical School to
                    better meet clinical care, education and research needs.</p><br>
            </div>
            <hr/>
            <div id="about-2">
         
                    <div class="container">
                        <div class="row">
                            <div class="column">
                                <div class="about-item text-center">
                                    <i class="fa fa-book"></i>
                                        <h3>OUR VISSION</h3>
                                   
                                        <p>To be one of the leading private medical centres in the</p>
                                        <p>ASEAN region</p><br>
                                </div>
                                </div>
                            <div class="column">
                                <div class="about-item text-center">
                                    <i class="fa fa-book"></i>
                                        <h3>OUR MISSION</h3>
                                       
                                        <p>"Service with a SMILE"</p><br>

                                        <p>S -	Satisfactory return to stakeholders</p>
                                        <p>M -	Modern, comprehensive and safe facility and environment</p>
                                        <p>I -	Inspired, engaged and driven teams</p>
                                        <p>L -	Leading-edge clinical practices and technologies</p>
                                        <p>E -	Exceed customers’ expectations</p><br>
                                </div>
                            </div>
                            <div class="column">
                            
                                <div class="about-item text-center">
                                    <i class="fa fa-book"></i>
                                        <h3>OUR VALUES</h3>
                                 
                                        <p>Compassion</p>
                                        <p>We are always sensitive to our patients’ needs</p><br>

                                        <p>Humility</p>
                                        <p>We believe in being humble, polite and respectful</p><br>

                                        <p>Excellence</p>
                                        <p>We strive for excellence and take pride in all that we do</p><br>

                                        <p>Respect</p>
                                        <p>We respect every individual and are always professional in our conduct and behaviour</p><br>

                                        <p>Integrity</p>
                                        <p>We believe in doing the right thing at all times</p><br>
                                </div>
                     
                    </div>
                      
                </div>
            </div>
        
                </div>
        </section>
        <div class="footer">
          <h2>L&M Clinic Center</h2>
         <li><a href="MainMedicalPage.php">Home</a></li>
         <li><a href="Chatbot/bot.php">FAQ</a></li>
         <li><a href="AboutUs/aboutus.php">About</a></li>
         <p> Copyright 2023 by L&M Clinic Management System. All Rights Reserved.</p>
    </div>
    </body>-->
<style>
* {
  font-family: Nunito, sans-serif;
}

.text-blk {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  line-height: 25px;
}

.responsive-cell-block {
  min-height: 75px;
}

.responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: space-evenly;
}

.outer-container {
  padding-top: 10px;
  padding-right: 50px;
  padding-bottom: 10px;
  padding-left: 50px;
  background-color: rgb(244, 252, 255);
}

.inner-container {
  max-width: 1320px;
  flex-direction: column;
  align-items: center;
  margin-top: 50px;
  margin-right: auto;
  margin-bottom: 50px;
  margin-left: auto;
}

.section-head-text {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 5px;
  margin-left: 0px;
  font-size: 35px;
  font-weight: 700;
  line-height: 48px;
  color: rgb(0, 135, 177);
  margin: 0 0 10px 0;
}

.section-subhead-text {
  font-size: 25px;
  color: rgb(153, 153, 153);
  line-height: 35px;
  max-width: 470px;
  text-align: center;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 60px;
  margin-left: 0px;
}

.img-wrapper {
  width: 100%;
}

.team-card {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.social-media-links {
  width: 125px;
  display: flex;
  justify-content: space-between;
}

.name {
  font-size: 25px;
  font-weight: 700;
  color: rgb(102, 102, 102);
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 5px;
  margin-left: 0px;
}

.position {
  font-size: 25px;
  font-weight: 700;
  color: rgb(0, 135, 177);
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 50px;
  margin-left: 0px;
}

.team-img {
  width: 100%;
  height: 100%;
}

.team-card-container {
  width: 280px;
  margin: 0 0 40px 0;
}

@media (max-width: 500px) {
  .outer-container {
    padding: 10px 20px 10px 20px;
  }

  .section-head-text {
    text-align: center;
  }
}
    </style>
    <head>
        <meta charset="UTF-8">
        <title>About Us</title>
        <link rel="stylesheet" href="../Css&js/aboutus.css">
    </head>
    <body>
        
         <div class="nav">
         <div class="topnav">
            <a href="../MainMedicalPage.php">Home</a>
            <a href="../ProductModule/ProductPage.php">Product</a>
            <a href="../AboutUs/aboutus.php">About</a>
            
         </div>
        </div>
        
<div class="responsive-container-block outer-container">
  <div class="responsive-container-block inner-container">
    <p class="text-blk section-head-text">
      L&M Clinic Center</p>
    <p class="text-blk section-subhead-text">
      "I Care, I am Reliable, I Make a Difference"
    </p>
    <div class="responsive-container-block">
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
        <div class="team-card">
          <div class="img-wrapper">
            <img class="team-img" src="../Image/lee.png">
          </div>
          <p class="text-blk name">
            Lee Ka Xiang
          </p>
          <p class="text-blk position">
            CEO
          </p>
          <div class="social-media-links">
            <a href="http://www.twitter.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-twitter.svg">
            </a>
            <a href="http://www.facebook.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-fb.svg">
            </a>
            <a href="http://www.instagram.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
            </a>
            <a href="http://www.gmail.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
            </a>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
        <div class="team-card">
          <div class="img-wrapper">
            <img class="team-img" src="../Image/ng.png">
          </div>
          <p class="text-blk name">
            Ng Pheng Loong
          </p>
          <p class="text-blk position">
            CEO
          </p>
          <div class="social-media-links">
            <a href="http://www.twitter.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-twitter.svg">
            </a>
            <a href="http://www.facebook.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-fb.svg">
            </a>
            <a href="http://www.instagram.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
            </a>
            <a href="http://www.gmail.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
            </a>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
        <div class="team-card">
          <div class="img-wrapper">
            <img class="team-img" src ="../Image/tan.png">
          </div>
          <p class="text-blk name">
            Tan Dian Yao
          </p>
          <p class="text-blk position">
            CEO
          </p>
          <div class="social-media-links">
            <a href="http://www.twitter.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-twitter.svg">
            </a>
            <a href="http://www.facebook.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-fb.svg">
            </a>
            <a href="http://www.instagram.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
            </a>
            <a href="http://www.gmail.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
            </a>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
        <div class="team-card">
          <div class="img-wrapper">
            <img class="team-img" src="../Image/man.png">
          </div>
          <p class="text-blk name">
            Man Jun Kang
          </p>
          <p class="text-blk position">
            Staff
          </p>
          <div class="social-media-links">
            <a href="http://www.twitter.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-twitter.svg">
            </a>
            <a href="http://www.facebook.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-fb.svg">
            </a>
            <a href="http://www.instagram.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
            </a>
            <a href="http://www.gmail.com/" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        <section id="about">
            <div id="about-1">
                <h1>History</h1>
                <p>L&M Clinic Centre is a Private Clinic located in Setapak. L&M Clinic Centre offers a wide range of
                    medical services, including outpatient specialist care, health and wellness programs, 24-hour emergency
                    services, and construction and innovative medical equipment. These are backed by solid support,
                    including medical specialists, allied health personnel, and well-trained, dedicated nursing staff. L&M
                    Clinic Centres is an Australian Council for Healthcare Standards (ACHS) approved private practice,
                    Malaysia's first and most established private medical and health sciences university, established in 1999.
                    Designed to provide healthcare in a state-of-the-art environment, the L&M Clinic Centre is currently
                    building a clinic management system and is expected to start operations in 2023. Equipped with many
                    features to help patients and staff.

                    L&M Clinic Center is linked to the Jeffrey Shea School of Medicine and Health Sciences, Monash
                    University Malaysia, Cambridge University, Royal Papworth Hospital and Harvard Medical School to
                    better meet clinical care, education and research needs.</p><br>
            </div>
                    <div id="about-2">
         
                    <div class="container">
                        <div class="row">
                            <div class="column">
                                <div class="about-item text-center">
                                    <i class="fa fa-book"></i>
                                        <h3>OUR VISSION</h3>
                                   
                                        <p>To be one of the leading private medical centres in the</p>
                                        <p>ASEAN region</p><br>
                                </div>
                                </div>
                            <div class="column">
                                <div class="about-item text-center">
                                    <i class="fa fa-book"></i>
                                        <h3>OUR MISSION</h3>
                                       
                                        <p>"Service with a SMILE"</p><br>

                                        <p>S -	Satisfactory return to stakeholders</p>
                                        <p>M -	Modern, comprehensive and safe facility and environment</p>
                                        <p>I -	Inspired, engaged and driven teams</p>
                                        <p>L -	Leading-edge clinical practices and technologies</p>
                                        <p>E -	Exceed customers’ expectations</p><br>
                                </div>
                            </div>
                            <div class="column">
                            
                                <div class="about-item text-center">
                                    <i class="fa fa-book"></i>
                                        <h3>OUR VALUES</h3>
                                 
                                        <p>Compassion</p>
                                        <p>We are always sensitive to our patients’ needs</p><br>

                                        <p>Humility</p>
                                        <p>We believe in being humble, polite and respectful</p><br>

                                        <p>Excellence</p>
                                        <p>We strive for excellence and take pride in all that we do</p><br>

                                       
                                </div>
                     
                    </div>
                      
                </div>
            </div>
        
                </div>
        </section>
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
