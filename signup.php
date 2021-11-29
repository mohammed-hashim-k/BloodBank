<!-- signup.php -->
<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'database.php';

    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $firstname=$_POST['first_name'];
    $lastname=$_POST['last_name'];
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
