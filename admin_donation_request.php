<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Requests</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <link rel = "stylesheet" href = "css/home.css">

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
        </ul>

    </div>
    <div class="main_content">

    <?php

        include 'database.php';

        $admin= $_SESSION['adminid'];
        $sql = "SELECT * FROM blood_donation WHERE ( admin_id = '1' AND status = 'pending' ) OR admin_id = '" . $admin . "'";
        $result = mysqli_query($con,$sql);
        $num_rows = mysqli_num_rows($result);

        if (!$num_rows){
            $num_rows = 0;
        }
    ?>

        <br><br>
        <div class="container">
            <H4 class="text-center">Blood Donation Requests</H4><br>

        <h5 class="text-center" style="color: red;"><?php echo $num_rows; ?> Records</h5><br>

            <table class="table table-light table-hover table-bordered table-striped">
                <thead class="bg-info">
                    <tr>

                        <th scope="col">Request Id</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Diseases</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>

                <tbody>

                <?php

                    if(isset($_POST['approve'])) {

                        #echo $_POST['donor_id'];

                        $bloodtype = mysqli_fetch_array(mysqli_query($con, "SELECT blood_type FROM user WHERE userid = '" . $_POST['donor_id'] . "'"));
                        $currentunit = mysqli_fetch_array(mysqli_query($con, "SELECT  unit FROM blood_stock WHERE blood_type = '" . $bloodtype['blood_type'] . "'"));


                        $updatedonation = "UPDATE blood_donation SET status = 'approved', action = 'added " . $_POST['unit'] . " units', admin_id = '" . $admin . "' WHERE donation_id = '" . $_POST['donation_id'] . "'";
                        echo $_POST['unit'];
                        $update = $currentunit['unit'] + $_POST['unit'];
                        $updatestock = "UPDATE blood_stock SET unit = '" . $update . "', admin_id='" . $admin . "' WHERE blood_type = '" . $bloodtype['blood_type'] . "'";



                        if ($con->query($updatedonation) == TRUE && $con->query($updatestock) == TRUE) {

                            header("location: admin_donation_request.php");

                        }
                        else {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert' style = 'text-align: center;'>
                            <strong> Error updating record: " . $con->error . "</strong> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        }

                    }

                    else if(isset($_POST['reject'])) {

                        $updatedonation = "UPDATE blood_donation SET status = 'rejected', action = 'rejected', admin_id = '" . $admin . "' WHERE donation_id = '" . $_POST['donation_id'] . "'";

                        if($con->query($updatedonation)) {

                            header("location: admin_donation_request.php");
                        }
                        else{
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert' style = 'text-align: center;'>
                            <strong> Error updating record: " . $con->error . "</strong> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        }

                    }


                    while ($row = mysqli_fetch_assoc($result)){

                        echo "<tr>";
                            echo "<td>" . $row['donation_id'] . "</td>";
                            echo "<td>" . $row['request_date'] . "</td>";
                            echo "<td>" . $row['donor_id'] . "</td>";
                            echo "<td>" . $row['unit'] . "</td>";
                            echo "<td>" . $row['diseases'] . "</td>";

                            if ($row['status'] == 'pending')
                            {
                                echo "<td align='center'><form method = 'POST'><input type = 'submit' name = 'approve' value = 'Approve' class='btn btn-primary badge-pill'> ";
                                echo "<input type = 'submit' name = 'reject' value = 'Reject' class='btn btn-danger badge-pill' >";
                                echo "<input type = 'hidden' name = 'donation_id' value = " . $row['donation_id'] ." >";
                                echo "<input type = 'hidden' name = 'donor_id' value = " . $row['donor_id'] ." >";
                                echo "<input type = 'hidden'  name = 'unit' value = " . $row['unit'] ."></form></td>";

                            }

                            else{
                                echo "<td>" . $row['status'] . "</td>";
                            }

                            echo "<td>" . $row['action'] . "</td>";



                        echo "</tr>";
                    }
                ?>


                </tbody>

            </table>

        </div>




    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
