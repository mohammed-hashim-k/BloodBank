

<!-- request_blood.php -->
<?php
    session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'database.php';

    $unit=$_POST['unit'];
    $reason=$_POST['Reason'];
    $request_date=date("Y/m/d");
    $requestor_id=$_SESSION['userid'];
    $request_id=uniqid();
    $admin_id='1';
    $status="pending";
    $action="none";

    $row = mysqli_fetch_array(mysqli_query($con, "SELECT unit FROM blood_stock WHERE blood_type IN (SELECT blood_type FROM user WHERE userid = '$requestor_id') "));

    if($row['unit'] > $unit) {
        $sql="INSERT INTO blood_request VALUES('$request_id','$requestor_id','$unit','$request_date','$reason','$status','$action','$admin_id')";

        if($con->query($sql)==TRUE){
            echo "Requested";
        }
        else{
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }

    else{
        $sql = "INSERT INTO blood_request VALUE('$request_id','$requestor_id','$unit','$request_date','$reason','rejected','Stock Low','$admin_id')";

        if($con->query($sql) == TRUE){
            echo "REJECTED : Low blood Stock";
        }
        else{
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
    ?>
