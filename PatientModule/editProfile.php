<?php include_once '../headerCustomer.php'; ?>
<?php
    
    
    $patient_id = $user_data['patient_id'];
    $q = "Select * from patients WHERE patient_id = '$patient_id'";
    $error = isset($_GET["error"]) ? $_GET["error"] : "";
    $qw = $con->query($q);
    
    if(isset($_POST['submit'])){
        $error = "";
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password= isset($_POST['password']) ? $_POST['password']  : "";
        $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : "";
        $ic_number= isset($_POST['ic_number'])?  $_POST['ic_number'] : "";
        $gender= isset($_POST['gender']) ? $_POST['gender'] : "";
        $email= isset($_POST['email']) ? $_POST['email'] : "";
        $phone_num= isset($_POST['phone_num'])?  $_POST['phone_num'] : "";
        $address= isset($_POST['address']) ? $_POST['address'] : "";
        $age= isset($_POST['age']) ? $_POST['age'] : "";
        
        if (empty($password)) {
            $error = "Password is empty!";
        }
        
        if ($password != $confirmPassword) {
            $error = "Password doesnt match!";
        }
        
        if ($username == "") {
            $error = "Username is empty!";
        }
    
        if ($ic_number == "") {
            $error = "IC is empty!";
        }
        if ($gender == "") {
            $error = "Gender is empty!";
        }
        if ($email == "") {
            $error = "Email is empty!";
        }
        if ($phone_num == "") {
            $error = "Phone number is empty!";
        }
        if ($address == "") {
            $error = "Address is empty!";
        }
        if ($age == "") {
            echo $age;
            $error = "Age is empty!";
        }
        $password = $password;
        if ($qw->num_rows > 0) {
            while ($row = $qw->fetch_assoc()) {
                if (!($password == $row["password"])) {
                    $error = "Password does not match with database, please enter again!";
                }
            }
        }
        
        
        if ($error != "") {
            
            echo "<script>window.location =  'editProfile.php?error=$error'</script>";
           die;
            //header("Location: editProfile.php?error=$error");
        } else {
            try {
            $query = "update patients set username='$username',password='$password',ic_number='$ic_number',gender='$gender',email='$email',phone_num='$phone_num',address='$address',age='$age' where patient_id='$patient_id'   ";
            $con->query($query);
//            //$_SESSION['successMsg']="Profile has been updated!";
            echo "<script>window.location = 'viewProfilePage.php'</script>";
            die;
        } catch (Exception $ex) {
            echo $ex;
            echo "<script>window.location = 'editProfile.php?error=$ex'</script>";
            }
        }
        
        
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to L&M Medical Design</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <script>

</script>
    <body>
       <br>
       <?php if ($qw->num_rows > 0) { 
            while ($row = $qw->fetch_assoc()) {?>
       
               <hr style="z-index:-1; position:relative;"/>
<!--                <form method="POST" class="d-flex mx-auto col-10 col-md-5 col-lg-4 mt-5 px-5 mb-3" style="background-color: whitesmoke;">-->
                <form method="POST" class="d-flex flex-column col-10 col-md-5 col-lg-4 mt-5 px-5 mx-auto mb-3 border border-secondary" style="background-color: whitesmoke;">
                    <br>
                     <h1>Profile</h1>
                     <h3 class="text-danger"><?php echo $error?></h3>
                        <hr />
                    <input type="hidden" name="patient_id" value="<?php echo $patient_id ?>">
                    <br>
                <div class="form-group">
                 <label for="username">Username:</label>
                 <input type="text" value="<?php echo $row['username']?>" class="form-control" id="username" placeholder="Enter Username" name="username">
                </div>
                    <br>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password:</label>
                    <input type="password" class="form-control" name="confirmPassword">
                </div>
                        <br>
                <div class="form-group">
                    <label for="ic_number">IC Number:</label>
                    <input type="text" value="<?php echo $row['ic_number']?>" class="form-control" id="ic-number" placeholder="Enter IC Number" name="ic_number">
                </div>
                        <br>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select name="gender">
                        <option value="<?=$user_data['gender']?>"><?php echo $row['gender']?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                        <br>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <?php $date = date("Y-m-d");?>
                    <input value="<?php echo $row['age']?>" class="form-control" id="age" placeholder="Enter Birth Date" name="age" max="<?=$date;?>">
                </div>
                        <br>    
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" value="<?php echo $row['email']?>" class="form-control" id="email" placeholder="Enter Email" name="email">
                </div>
                        <br>
                <div class="form-group">
                    <label for="phone_num">Phone Number:</label>
                    <input type="text" value="<?php echo $row['phone_num']?>" class="form-control" id="phone_num" placeholder="Enter Phone number" name="phone_num">
                </div>
                            <br>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" value="<?php echo $row['address']?>" class="form-control" id="address" placeholder="Enter Address" name="address">
                </div>
                            <br>
                <button type="submit" name="submit" class="btn btn-primary mb-3" style="text-align: center">Update</button>
                
        </form>
        <?php }}?>
    </body>
</html>
<?php include '../footer.php'; ?>