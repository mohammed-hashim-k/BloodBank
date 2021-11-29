<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request History</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <style>





    .row{
        padding: 5px;
    }
    .fa-tint{
        color: red;
    }
    .blood{
        float: right;
    }
    .fa-users{
        color: blue;
        font-size: 3ex;
    }
    .fa-spinner{
        color: blue;
        font-size: 3ex;
    }
    .fa-check-circle{
        color: blue;
        font-size: 3ex;
    }
    .xyz{
        color: blue;
        font-size: 3ex;
    }

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: 'Josefin Sans', sans-serif;
}

body{
   background-color: #f3f5f9;
}
.bg-danger {
    background-color: #ff0018!important;
}

.wrapper{
  display: flex;
  position: relative;
}

.wrapper .sidebar{
  width: 200px;
  height: 100%;
  background: 	#343a40;
  padding: 30px 0px;
  position: fixed;
}

.wrapper .sidebar h2{
  color: #fff;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
}

.wrapper .sidebar ul li{
  padding: 15px;
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
}

.wrapper .sidebar ul li a{
  color: #bdb8d7;
  display: block;
}

.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  background-color: #594f8d;
}

.wrapper .sidebar ul li:hover a{
  color: #fff;
}

.wrapper .sidebar .social_media{
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
}

.wrapper .sidebar .social_media a{
  display: block;
  width: 40px;
  background: #594f8d;
  height: 40px;
  line-height: 45px;
  text-align: center;
  margin: 0 5px;
  color: #bdb8d7;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.wrapper .main_content{
  width: 100%;
  margin-left: 200px;
}

.wrapper .main_content .header{
  padding: 20px;
  background: #fff;
  color: #717171;
  border-bottom: 1px solid #e0e4e8;
}

.wrapper .main_content .info{
  margin: 20px;
  color: #717171;
  line-height: 25px;
}

.wrapper .main_content .info div{
  margin-bottom: 20px;
}

@media (max-height: 500px){
  .social_media{
    display: none !important;
  }
}
.fa-sign-out-alt{
    color: white;
    font-size: 2ex;
}

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
            <li><a style="text-decoration:none;" href="donate_blood.html"><i class="fas fa-hand-holding-medical"></i>Donate Blood</a></li>
            <li><a style="text-decoration:none;" href="donation_history"><i class="fas fa-history"></i>Donation History</a></li>
            <li><a style="text-decoration:none;" href="request_blood.html"><i class="fas fa-sync-alt"></i>Blood Request</a></li>
            <li><a style="text-decoration:none;" href="request_history.php"><i class="fas fa-history"></i>Request History</a></li>

        </ul>

    </div>
    <div class="main_content">

    <?php

        include 'database.php';

        $requestor_id = $_SESSION['userid'];
        $sql = "SELECT unit, request_date, reasons, status, action FROM blood_request WHERE requester_id = '$requestor_id'";
        $result = mysqli_query($con,$sql);
        $num_rows = mysqli_num_rows($result);
        echo $num_rows;

        if (!$num_rows){
            $num_rows = 0;
        }
    ?>

        <br><br>
        <div class="container">
            <H4 class="text-center">Blood Request History</H4><br>

        <h5 class="text-center" style="color: red;"><?php echo $num_rows; ?> Row(s)</h5><br>

            <table class="table table-light table-hover table-bordered table-striped">
                <thead class="bg-info">
                    <tr>

                        <th scope="col">Request Date</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Reasons</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>

                <tbody>

                <?php

                    while ($row = mysqli_fetch_assoc($result)){

                        echo "<tr>";
                            echo "<td>" . $row['reqeust_date'] . "</td>";
                            echo "<td>" . $row['unit'] . "</td>";
                            echo "<td>" . $row['reasons'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";

                        echo "</tr>";
                    }
                ?>


                </tbody>

            </table>

        </div>




    </div>
</div>
<!--
developed By : sumit kumar
facebook : fb.com/sumit.luv
youtube : youtube.com/lazycoders
-->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
