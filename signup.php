<!-- singup page for usere -->
<!DOCTYPE html>
<?php  session_start(); ?>
<html lang="en" dir="ltr">
  <head>
        <meta charset="utf-8">
        <title>Blood Bank Management</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link rel = "stylesheet" href = "css/index.css">
    <style>


    </style>
  </head>

  <body>



        <div class="bs-example">
          <nav style="background-color: #FF0018;" class="navbar navbar-expand-md navbar-dark fixed-top">
              <a style="color:white;" class="navbar-brand"><i class="fab fa-gratipay"></i>&nbsp;<font face = "Comic sans MS" size ="4">Blood Bank Management System</font></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">


              <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" style="color: white;" href="index.php"  ><i class="fas fa-sign-in-alt"></i>&nbsp; Login</i></a>
                      </li>

                  </ul>
              </div>
            </div>
          </nav>
        </div>

</header>
    <!-- user login form -->

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <br><br><br>
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">User SingUp</h2>
                </div>
                <div class="card-body">
                    <form  action="signup.php" method="post" style="align-content: center; width: 100%; ">
                        <div class="form-row">
                            <div class="name">Userid</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="userid" placeholder="UserID" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                        <input type="password"   class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">First Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="first name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Last Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="last name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Phone Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" size="12" class="form-control" name="phone_number" placeholder="phone number" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Gender</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="gender" class="form-control">
                                        <option value="m">M</option>
                                        <option value="f">F</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Blood Type</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="blood_type" class="form-control">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Age</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="number" min="16" max="80"class="form-control" name="age" placeholder="age" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value="Signup">
                        </div>

                    </form>

                    <div align = 'center'>

                    <?php
                       if($_SERVER["REQUEST_METHOD"] == "POST") {

                        include 'database.php';

                        $userid=$_POST['userid'];
                        $password=$_POST['password'];
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $firstname=$_POST['first_name'];
                        $lastname=$_POST['last_name'];
                        $phone_number=$_POST['phone_number'];
                        $gender=$_POST['gender'];
                        $blood_type=$_POST['blood_type'];
                        $age=$_POST['age'];

                        $sql="INSERT INTO user VALUES ('$userid','$firstname','$lastname','$phone_number','$gender','$blood_type','$hashed_password','$age')";

                        if($con->query($sql)==TRUE){
                            echo "user registered";
                        }
                        else{
                            echo "Error: " . $sql . "<br>" . $con->error;
                        }



                       }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</body>
</html>