
<?php

    $error = isset($_GET["error"]) ? $_GET["error"] : "";
    $isStaff = isset($_GET["isStaff"]) ? $_GET["isStaff"] : false;
    $isPatient = isset($_GET["isPatient"]) ? $_GET["isPatient"] : false;
    $isDoctor = isset($_GET["isDoctor"]) ? $_GET["isDoctor"] : false;
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <title></title>
    </head>
    <body>
        <div class="mx-auto col-10 col-md-8 col-lg-6 mt-5 p-5 border border-secondary">
            <form class="form" method="post" action="processSendEmail.php">
                <input hidden value="<?php if ($isStaff == true) echo $isStaff?>" name="isStaff">
                <input hidden value="<?php if ($isPatient == true) echo $isPatient?>" name="isPatient">
                <input hidden value="<?php if ($isDoctor == true) echo $isDoctor?>" name="isDoctor">
                <h3>Enter email linked to the account</h3>
                <h3 class="text-danger"><?php echo $error?></h3>
                <br>
                <div class="form-group"><!-- comment -->
                    <label>Email</label>
                    <input class="form-group" name="email">
                </div>
                <button type="submit" class="btn btn-primary">Request Email for Password Reset</button>
            </form>
        </div>
    </body>
</html>
