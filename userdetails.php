<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <link rel="stylesheet" href = "css/home.css">

    <style>



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

            $row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE userid = '" . $_POST['userid'] . "'"));
         ?>


         <div class="info">
             <div class="row">
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">User ID</h5>
                             <!-- print userid -->
                             <p class="card-text"><?php

                             echo $row['userid'];

                             ?></p>


                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">User Name</h5>
                             <p class="card-text">
                             <?php

                            echo $row['first_name'] . " " . $row['last_name'];

                             ?>
                             </p>


                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">Mobile Number</h5>
                             <p class="card-text">
                             <?php

                            echo $row['phone_number'];

                            ?>
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">Blood Type</h5>
                             <p class="card-text">
                             <?php

                            echo $row['blood_type'];

                            ?>
                             </p>
                         </div>
                     </div>
                 </div>
                 <?php

                     if(isset($_POST['remove'])) {

                         $sql = "DELETE FROM user WHERE userid = '" . $_POST['id'] . "'";

                         if ($con->query($sql) == TRUE) {

                             header("location: users.php");

                             }
                         else {
                             echo "error";
                             echo "<div class='alert alert-warning alert-dismissible fade show' role='alert' style = 'text-align: center;'>
                             <strong> Error updating record: " . $con->error . "</strong> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                             </div>";
}
                     }
                 ?>

                 <div align = 'center' class="col-md-4">
                    <form method = 'post'>
                        <br><br>
                        <input type = 'submit' name = 'remove' value = 'Remove User' class='btn btn-danger badge-pill' >
                        <?php echo "<input type = 'hidden' name = 'id' value = " . $row['userid'] ." >"; ?>
                    </form>
                </div>
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">Age</h5>
                             <p class="card-text"><?php

                            echo $row['age'];

                            ?></p>
                         </div>
                     </div>
                 </div>
     </div>
 </div>
</div>


</body>
</html
