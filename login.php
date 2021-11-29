<!-- login -->
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $localhost = "localhost";
		$root = "callisto";
		$password = "Callisto@123";
		
		$con = mysqli_connect($localhost,$root,$password) or die('Could not connect to database');
		mysqli_select_db($con,"blood_bank");
        
        $username = $_POST['userid'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM user WHERE userid = '$userid' AND password = '$password'";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
        
        if($row['userid'] == $useid && $row['password'] == $password) {
            $_SESSION['userid'] = $userid;
            $_SESSION['password'] = $password;
            header("location: index.php");
        } else {
            echo "<script>alert('Invalid userid or password')</script>";
        }

    }

    ?>