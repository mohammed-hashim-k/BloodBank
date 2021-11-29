
<!-- signup.php -->
<?php
    session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $localhost = "localhost";
    $root = "callisto";
    $password = "Callisto@123";
    
    $con = mysqli_connect($localhost,$root,$password) or die('Could not connect to database');
    mysqli_select_db($con,"blood_bank");
    $unit=$_POST['unit'];
    $diseases=$_POST['diseases'];
    $request_date=date("Y/m/d");
    $donor_id=$_SESSION['userid'];
    $donation_id=uniqid();
    $admin_id="1";
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