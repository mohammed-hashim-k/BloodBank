<!-- login page of the user -->
<!DOCTYPE html>
<?php  session_start(); ?>
<html lang="en" dir="ltr">
  <head>
        <meta charset="utf-8">
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
                          <a class="nav-link" style="color: white;" href="admin_login.php"  ><i class="fas fa-user-shield"></i>&nbsp; Admin</i></a>
                      </li>

                  </ul>
              </div>
            </div>
          </nav>
        </div>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <br><br><br>
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">User Login</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action = 'login.php'>
                        <div class="form-row">
                            <div class="name">Username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input
                                      type="text"
                                      class="form-control"
                                      name="userid"
                                      placeholder="UserID"
                                      required
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input
                                      type="password"
                                      class="form-control"
                                      name="password"
                                      placeholder="Password"
                                      required
                                    />
                                </div>
                            </div>
                        </div>




                        <div align = 'center'>
                            <button class="btn btn--radius-2 btn-danger" type="submit">Login</button>
                        </div>
                        <br>
                        <div align = 'center'>
                        <a href="signup.html" class="btn btn--radius-2 btn-danger">Sign Up</a>
                        </div>
                    </form>
                    <!-- signup link-->
                    
                    

                    <div class="form-group" align = "center">
                        <br>
                         No Account? <a href="signup.php" >Sign Up</a><br>
                    </div>

                <?php

                    if(isset($_SESSION['error'])) {
                        echo "<div align='center'> Invalid Credentials</div><br>";
                        unset($_SESSION['error']);
                    }
                    else{
                        echo "<br><br>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
