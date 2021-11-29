<!-- signup.php -->
<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $localhost = "localhost";
    $root = "callisto";
    $password = "Callisto@123";
    
    $con = mysqli_connect($localhost,$root,$password) or die('Could not connect to database');
    mysqli_select_db($con,"blood_bank");
    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $phone_number=$_POST['phone_number'];
    $gender=$_POST['gender'];
    $blood_type=$_POST['blood_type'];
    $age=$_POST['age'];

    $sql="INSERT INTO user VALUES ('$userid','$firstname','$lastname','$phone_number','$gender','$blood_type','$password','$age')";

    if($con->query($sql)==TRUE){
        echo "user registered";
    }
    else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }



   }
    ?>