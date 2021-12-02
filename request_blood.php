<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Management</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

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
            <li><a style="text-decoration:none;" href="home.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a style="text-decoration:none;" href="donate_blood.php"><i class="fas fa-hand-holding-medical"></i>Donate Blood</a></li>
            <li><a style="text-decoration:none;" href="donation_history.php"><i class="fas fa-history"></i>Donation History</a></li>
            <li><a style="text-decoration:none;" href="request_blood.php"><i class="fas fa-sync-alt"></i>Blood Request</a></li>
            <li><a style="text-decoration:none;" href="request_history.php"><i class="fas fa-history"></i>Request History</a></li>
            <li><a style="text-decoration:none;" href="inventory.php"><i class="fas fa-warehouse"></i> View Inventory</a></li>

        </ul>

    </div>
    <div class="main_content">
        <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
            <div class="wrapper wrapper--w790">
                <div class="card card-5">
                    <div class="card-heading">
                        <h2 class="title">Request Blood</h2>
                    </div>
                    <div class="card-body">
                        <form
                          method="post"
                          style="align-content: center; width: 100%"
                        >
                        <div class="form-row">
                            <div class="name">Unit</div>
                            <input
                              type="text"
                              class="form-control"
                              name="unit"
                              placeholder="Amount of Blood"
                              required
                            />
                          </div>
                          <div class="form-row">
                              <div class="name">Reasons</div>
                            <input
                              type="text"
                              class="form-control"
                              name="Reason"
                              placeholder="Valid Reason"
                              required
                            />

                          </div>
                          <div align= "center">
                            <input
                              type="submit"
                              class="btn btn-primary"
                              name="submit"
                              value="SUBMIT BLOOD REQUEST"
                            />
                          </div>
                        </form>


              <?php
                  session_start();
                 if($_SERVER["REQUEST_METHOD"] == "POST") {

                  include 'database.php';

                  $unit=$_POST['unit'];
                  $reason=$_POST['Reason'];
                  $request_date=date("Y/m/d");
                  $requestor_id=$_SESSION['userid'];
                  $request_id=uniqid();
                  $admin_id='1';
                  $status="pending";
                  $action="none";

                  $row = mysqli_fetch_array(mysqli_query($con, "SELECT unit FROM blood_stock WHERE blood_type IN (SELECT blood_type FROM user WHERE userid = '$requestor_id') "));

                  if($row['unit'] > $unit) {
                      $sql="INSERT INTO blood_request VALUES('$request_id','$requestor_id','$unit','$request_date','$reason','$status','$action','$admin_id')";

                      if($con->query($sql)==TRUE){
                          echo "Requested";
                      }
                      else{
                          echo "Error: " . $sql . "<br>" . $con->error;
                      }
                  }

                  else{
                      $sql = "INSERT INTO blood_request VALUE('$request_id','$requestor_id','$unit','$request_date','$reason','rejected','Stock Low','$admin_id')";

                      if($con->query($sql) == TRUE){
                          echo "REJECTED : Low blood Stock";
                      }
                      else{
                          echo "Error: " . $sql . "<br>" . $con->error;
                      }
                  }
              }
                  ?>


          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group"  >

        <p class="lead text-center" ><i>“Opportunities knock the door sometimes, so don’t let it go and donate blood.</i>”
          </p>



      </div>
  </body>
</html>
