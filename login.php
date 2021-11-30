<!-- login -->
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        include 'database.php';

        $userid = $_POST['userid'];
        $password = $_POST['password'];

        $query = "SELECT * FROM user WHERE userid = '$userid'";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);

        if($row['userid'] == $userid && password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['userid'] = $userid;
            $_SESSION['password'] = $password;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['phone_number'] = $row['phone_number'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['age']=$row['age'];
            $_SESSION['blood_type'] = $row['blood_type'];


            header("location: home.php");
        } else {
            echo "<script>alert('Invalid userid or password')</script>";
        }

    }

    ?>
