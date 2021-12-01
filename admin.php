<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>


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

    <?php

        include 'database.php';

        $id = $_SESSION['adminid'];

        $sql = "SELECT * FROM blood_stock ";
        $result = mysqli_query($con,$sql);

        

       

    ?>

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

<br><br>
<div class="container">
<?php 
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<td>" . $row['blood_type'] . "    </td>";
        echo "<td>" . $row['unit'] . "    </td>";
        echo "<br>";
    }
    ?>
    
        
<hr>

    <?php

        $users = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM user"));
        $pendingsql = "SELECT COUNT(*) as pending FROM ( SELECT * FROM blood_request UNION SELECT * FROM blood_donation ) AS t WHERE status = 'pending'";
        $pending = mysqli_fetch_array(mysqli_query($con,$pendingsql));
        $approvedsql = "SELECT COUNT(*) as approved FROM ( SELECT * FROM blood_request UNION SELECT * FROM blood_donation ) AS t WHERE status = 'approved'";
        $approved = mysqli_fetch_array(mysqli_query($con, $approvedsql));



    ?>
    <div class="row">
      <div class="col-sm-3">
        <div class="card bg-light">
          <div class="card-body">
              <div class="blood">
                  <i class="fas fa-users"></i>
              </div><br>
              <div>
                  Total Users <br>
                  <?php echo $users['total']; ?>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
          <div class="card bg-light">
              <div class="card-body">
                  <div class="blood">
                      <i class="fas fa-spinner"></i>
                  </div><br>
                  <div>
                      Pending Requests <br>
                      <?php echo $pending['pending']; ?>
                  </div>
              </div>
            </div>
      </div>
      <div class="col-sm-3">
          <div class="card bg-light">
              <div class="card-body">
                  <div class="blood">
                      <i class="far fa-check-circle"></i>
                  </div><br>
                  <div>
                      Approved Requests <br>
                       <?php echo $approved['approved']; ?>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-sm-3">
          <div class="card bg-light">
              <div class="card-body">
                  <div class="blood">
                      <i class="fas fa-tint xyz"></i>
                  </div><br>
                  <div>
                      Total Blood Unit (in ml) <br>
                      <?php echo $total ?>
                  </div>
              </div>
            </div>
        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
