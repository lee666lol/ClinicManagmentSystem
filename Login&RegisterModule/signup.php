<?php
session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/PHPMailer/src/Exception.php';
    require '../PHPMailer/PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    
    include("../Database/db.php");
    include("../Database/function.php");
    
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ic_number = $_POST['ic_number'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone_num = $_POST['phone_num'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        
        if(!empty($username)&& !empty($password)&& !empty($ic_number)&& !empty($gender)&& !empty($email)&& !empty($phone_num)&& !empty($address) && !empty($age)){
            include '../Email/email.php';
            $patient_id = random_num(6);
            $query = "insert into patient(patient_id,username,password,ic_number,gender,email,phone_num,address,age) values ('$patient_id','$username','$password','$ic_number','$gender','$email','$phone_num','$address','$age')";
            mysqli_query($con,$query);
            
            header("Location: ../Login&RegisterModule/LoginPatient.php");
            die;
        }
        else{
            echo "<script>alert('Please fill up all the information!')</script>";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <style type="text/css">
            
            #text{
                height: 25px;
                border-radius: 5px;
                padding: 4px;
                border: solid thin #aaa;
            }
            
            #button{
                padding: 10px;
                width: 100px;
                color: white;
                background-color: lightblue;
                border: none;
            }
            
            #box{
                background-color: grey;
                margin: auto;
                width: 300px;
                padding: 20px;
            }
        </style>
        
        <div id="box">
            <form method="post">
                <div style="font-size: 20px; margin: 10px;">Register</div>
                Name:<input id="text" type="text" name="username"><br><br>
                Email:<input id="text" type="text" name="email"><br><br>
                IC Number:<input id="text" type="text" name="ic_number"><br><br>
                Password:<input id="text" type="password" name="password"><br><br>
                Gender:<select name="gender">
                    <option value="">--Select--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br><br>
                <?php $date = date("Y-m-d");?>
                Date Of Birth:<input id="text" type="date" name="age" max="<?=$date;?>" value="<?=$date;?>"><br><br>
                Phone number:<input id="text" type="text" name="phone_num"><br><br>
                Address:<input id="text" type="text" name="address"><br><br>

                <input id="button" type="submit" value="Register"><br><br>
                
                <a href="LoginPatient.php">I have an account</a><br><br>

            </form>
        </div>
    </body>
</html>

