<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <link rel="stylesheet" href = "css/home.css">

    <style>



    </style>
</head>
<body>
    <?php
    include ('login.php')
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
            <li><a style="text-decoration:none;" href="home.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a style="text-decoration:none;" href="donate_blood.html"><i class="fas fa-hand-holding-medical"></i>Donate Blood</a></li>
            <li><a style="text-decoration:none;" href="donation_history.php"><i class="fas fa-history"></i>Donation History</a></li>
            <li><a style="text-decoration:none;" href="request_blood.html"><i class="fas fa-sync-alt"></i>Blood Request</a></li>
            <li><a style="text-decoration:none;" href="request_history.php"><i class="fas fa-history"></i>Request History</a></li>
            <li><a style="text-decoration:none;" href="inventory.php"><i class="fas fa-warehouse"></i> View Inventory</a></li>

        </ul>

    </div>
    <div class="main_content">

        <?php

            include 'database.php';

            $id = $_SESSION['adminid'];

            $sql = "SELECT SUM(apos) AS apos, SUM(bpos) AS bpos, SUM(opos) AS opos, SUM(abpos) AS abpos, SUM(aneg) AS aneg, SUM(bneg) AS bneg, SUM(oneg) AS oneg, SUM(abneg) AS abneg FROM blood_stock";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);

            $apos = $row['apos'];
            $aneg = $row['aneg'];
            $bpos = $row['bpos'];
            $bneg = $row['bneg'];
            $opos = $row['opos'];
            $oneg = $row['oneg'];
            $abpos = $row['abpos'];
            $abneg = $row['abneg'];

            $total = $apos + $bpos + $opos + $abpos + $aneg + $bneg + $oneg + $abneg;

        ?>

        <br><br>
        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                  <div class="card bg-light">
                    <div class="card-body">
                        <div class="blood">
                            <h2>A+ <i class="fas fa-tint"></i></h2>
                        </div><br><br>
                        <div>
                            <?php echo $apos ?>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="blood">
                                <h2>B+ <i class="fas fa-tint"></i></h2>
                            </div><br><br>
                            <div>
                              <?php echo $bpos ?>
                            </div>
                        </div>
                      </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="blood">
                                <h2>O+ <i class="fas fa-tint"></i></h2>
                            </div><br><br>
                            <div>
                              <?php echo $opos ?>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="blood">
                                <h2>AB+ <i class="fas fa-tint"></i></h2>
                            </div><br><br>
                            <div>
                              <?php echo $abpos ?>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <div class="card bg-light">
                    <div class="card-body">
                        <div class="blood">
                            <h2>A- <i class="fas fa-tint"></i></h2>
                        </div><br><br>
                        <div>
                          <?php echo $aneg ?>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="blood">
                                <h2>B- <i class="fas fa-tint"></i></h2>
                            </div><br><br>
                            <div>
                              <?php echo $bneg ?>
                            </div>
                        </div>
                      </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="blood">
                                <h2>O- <i class="fas fa-tint"></i></h2>
                            </div><br><br>
                            <div>
                              <?php echo $oneg ?>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="blood">
                                <h2>AB- <i class="fas fa-tint"></i></h2>
                            </div><br><br>
                            <div>
                              <?php echo $abneg ?>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
        <hr>

    </div>

    </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
