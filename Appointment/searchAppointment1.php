<?php
include("../Database/db.php");    

    $response = "";
    
    $searchItem = $_POST['name'];

    $searchQuery = "SELECT * FROM Appointment WHERE username like '%$searchItem%' || appt_id like '%$searchItem%' || phone_num like '%$searchItem%' || date like '%$searchItem%' || time like '%$searchItem%' || reason like '%$searchItem%' || pattern like '%$searchItem%' || doc_name like '%$searchItem%' || status like '%$searchItem%' || possition like '%$searchItem%'";
    $search = $con->query($searchQuery);
    
    $mysqli = mysqli_connect("localhost","root","","clinic");
    $total_pages = $mysqli->query("SELECT * FROM appointment")->num_rows;
    $num_results_on_page = 6;
    $page = isset($_GET["page"]) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

    $servername = "localhost";
    $user = "root";
    $password = "";
    $database = "clinic";
    
    $con = mysqli_connect("localhost","root","", $database);
    
    $selectQuery = "SELECT * FROM Appointment ORDER BY appt_id LIMIT ?,?";
    
    $stmt = $con->prepare($selectQuery);
    $calc_page = ($page - 1) * $num_results_on_page;
    $stmt->bind_param("ii",$calc_page,$num_results_on_page);
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    
    
    ?>
<?php if ($search->num_rows > 0) { ?>
<table class="table table-bordered pt-4">
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
                    <?php while ($row = $search->fetch_assoc()) {?>

                        <tr>
                            <td name='appt_id' value="<?php echo $row["appt_id"]?>"><?php echo $row["appt_id"]?></td>
                            <td name='Appointment Date'><?php echo $row["date"]?></td>
                            <td name='Appointment Time'><?php echo $row["time"]?></td>
                            <td name='reason'><?php echo $row["reason"]?></td>
                            <td name='pattern'><?php echo $row["pattern"]?></td>
                            <td name='doc_name'><?php echo $row["doc_name"]?></td>
                            <td name='status'><?php echo $row["status"]?></td>
                            <td name='position'><?php echo $row["possition"]?></td>
                            <td><a href="editAppointmentPage.php?appt_id=<?php echo $row["appt_id"] ?>">Edit</a></td>
                            <td><a href="deleteAppointmentPage.php?appt_id=<?php echo $row["appt_id"] ?>">Delete</a></td>
                        </tr>
                    <?php }?>
                        
                </tbody>
            </table>
            <?php } else $response = "No record found!"; ?>
<?php 
echo json_encode($response);
?>