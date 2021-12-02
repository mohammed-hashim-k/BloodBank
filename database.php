<!-- use include 'database.php' for accessing all the database variables.-->

<?php

    $localhost = "localhost";
<<<<<<< HEAD
<<<<<<< HEAD
    $root = "root";
    $password = "password";
    $con = mysqli_connect($localhost,$root,$password) or die('Could not connect to database');  #connection variable.
=======
=======
>>>>>>> akashw-22-master
    $root = "callisto";
    $password = "Callisto@123";
    $con = mysqli_connect($localhost,$root,$password) or die('Could not connect to database');
>>>>>>> 2e218ac (added comments)
    mysqli_select_db($con,"blood_bank");
?>
