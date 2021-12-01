
<!-- signup.php -->
<?php
    session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'database.php';

    $unit=$_POST['unit'];
    $diseases=$_POST['diseases'];
    $request_date=date("Y/m/d");
    $donor_id=$_SESSION['userid'];
    $donation_id=uniqid();
    $admin_id_int=rand(1,5);
    $admin_id=(string)$admin_id_int;
    $status="pending";
    $action="none";
    $sql="INSERT INTO blood_donation VALUES('$donation_id','$donor_id','$unit','$request_date','$diseases','$status','$action','$admin_id')";







    if($con->query($sql)==TRUE){
        echo "Requested";
    }
    else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }



   }
    ?>
