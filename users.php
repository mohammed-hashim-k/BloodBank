<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <link rel="stylesheet" href = "css/home.css">

    <style>


        .label {
            color: white;
            padding: 8px;
        }

        .success {background-color: #4CAF50;} /* Green */
        .info {background-color: #2196F3;} /* Blue */
        .warning {background-color: #ff9800;} /* Orange */
        .danger {background-color: #f44336;} /* Red */
        .other {background-color: #e7e7e7; color: black;} /* Gray */

    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-danger">
        <a style="color:white;" class="navbar-brand" href="/"><i class="fab fa-gratipay"></i>&nbsp;<font face = "Comic sans MS" size ="4">Blood Bank Management System</font></a>


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="/logout">Logout &nbsp; <i class="fas fa-sign-out-alt"></i></a>
                </li>

            </ul>
        </div>
      </nav>
    <br><br>
    <div class="wrapper">
    <div class="sidebar">

        <ul>
            <li><a style="text-decoration:none;" href="admin.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a style="text-decoration:none;" href="admin_donation_request.php"><i class="fas fa-hand-holding-medical"></i>Donation Request</a></li>
            <li><a style="text-decoration:none;" href="admin_blood_request.php"><i class="fas fa-history"></i>Blood Request</a></li>
            <li><a style="text-decoration:none;" href="users.php"> <i class="fas fa-user"></i>Users</a></li>

        </ul>

    </div>

    <div class = "main_content">
        <br><br>
        <div class="container">
            <H4 class="text-center">Users</H4><br>
        <?php

            include 'database.php';

            $admin= $_SESSION['adminid'];
            $sql = "SELECT * FROM user";
            $result = mysqli_query($con,$sql);
            $num_rows = mysqli_num_rows($result);

            if (!$num_rows){
                $num_rows = 0;
            }
         ?>


        <h5 class="text-center" style="color: red;"><?php echo $num_rows; ?> Records</h5><br>

            <table class="table table-light table-hover table-bordered table-striped">
                <thead class="bg-info">
                    <tr>

                        <th scope="col">User Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">View</th>

                    </tr>
                </thead>

                <tbody>

                <?php

                    while ($row = mysqli_fetch_assoc($result)){

                        echo "<tr>";
                            echo "<td>" . $row['userid'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['age'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td><form method = 'post' action = 'userdetails.php'>
                            <input type = 'submit' name = 'view' value = 'View User' class='btn btn-primary badge-pill' >
                            <input type = 'hidden' name = 'userid' value = '" . $row['userid'] ."'>
                            </form></td>";
                        echo "</tr>";
                    }

                ?>


                </tbody>

            </table>

        </div>

    </div>
</div>

</body>
</html>
