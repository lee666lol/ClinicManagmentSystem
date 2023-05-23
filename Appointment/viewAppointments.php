<?php include_once '../headerCustomer.php'; ?>
<?php
    include("../Database/db.php");
    $search = isset($_GET["search"]) ? $_GET["search"] : "";
    
    $patient_id=$user_data['patient_id'];
    $total_pages = $con->query("SELECT * FROM appointment WHERE patient_id='$patient_id'")->num_rows;
    $num_results_on_page = 6;
    $page = isset($_GET["page"]) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
       
    $selectQuery = "SELECT * FROM Appointment WHERE patient_id='$patient_id' ORDER BY appt_id LIMIT ?,?";
    
    $stmt = $con->prepare($selectQuery);
    $calc_page = ($page - 1) * $num_results_on_page;
    $stmt->bind_param("ii",$calc_page,$num_results_on_page);
    
    $stmt->execute();
    $result = $stmt->get_result();
    
//    if ($result->num_rows > 0) {
//    while ($row = $result->fetch_assoc()) {
//        echo $row["username"];
//    }
//}
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php include_once '../headerCustomer.php'; ?>
<html>
    <head>
        
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../Css&js/AppointmentDesign.css">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
      ></script>           
        <script src="../Css&js/searchAppointment.js"></script>   
         
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
  <div id="myDiv"></div>

    
        
        <div class="container mt-5">
            <a class="p-3 bg-primary text-white" href="addAppointmentPage.php">Add new appointment</a>
            <br>
            <br>
            <br>
           <h3>Search</h3>
           <?php if ($search == "") { ?>
            <input id="search">
          <?php } else { ?>
            <input id="search" value="<?php echo $search ?>">
          <?php } ?>
            <br>
           
           <br>
           <div id="display">
               
           </div>
            <table class="table table-bordered pt-4" id="allRecord">
                <thead>
                    <th>Id</th>

                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Reason</th>
                <th>Visit Type</th>
                <th>Doctor Name</th>
                <th>Status</th>
                <th>IsChecked</th>
                
            </thead>
                <tbody>
                    <?php if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {?>
                        <?php $appt_id = $row["appt_id"]; ?>
                        <tr>
                            <td name='appt_id' value="<?php echo $appt_id?>"><?php echo $appt_id?></td>
                            <td name='Appointment Date'><?php echo $row["date"]?></td>
                            <td name='Appointment Time'><?php echo $row["time"]?></td>
                            <td name='reason'><?php echo $row["reason"]?></td>
                            <td name='pattern'><?php echo $row["pattern"]?></td>
                            <td name='doc_name'><?php echo $row["doc_name"]?></td>
                            <td name='status'><?php echo $row["status"]?></td>
                            <td name='position'><?php echo $row["possition"]?></td>
                            <td><a href="editAppointmentPage.php?appt_id=<?php echo $appt_id ?>">Edit</a></td>
                            <td><a href="deleteAppointmentPage.php?appt_id=<?php echo $appt_id ?>">Delete</a></td>
                        </tr>
                    <?php }}?>
                        
                </tbody>
            </table>
            <?php if(ceil($total_pages / $num_results_on_page) > 0) {?>
        
            <ul class="pagination" id="pagination">
				<?php if ($page > 1): ?>
				<li class="prev"><a href="viewAppointments.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="viewAppointments.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="viewAppointments.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="viewAppointments.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="viewAppointments.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="viewAppointments.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="viewAppointments.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="viewAppointments.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<li class="next"><a href="viewAppointments.php?page=<?php echo $page+1 ?>">Next</a></li>
				<?php endif; ?>
			</ul>
           
        <?php }?>
        </div>
    </body>
</html>
