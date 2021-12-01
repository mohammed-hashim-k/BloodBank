

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
    $admin_id_int=rand(1,5);
    $admin_id=(string)$admin_id_int;
    $status="pending";
    $action="none";
    $sql="INSERT INTO blood_request VALUES('$request_id','$requestor_id','$unit','$request_date','$reason','$status','$action','$admin_id')";







    if($con->query($sql)==TRUE){
        echo "Requested";
    }
    else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }



   }
    ?>
