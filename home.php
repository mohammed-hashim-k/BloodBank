<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>


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
            <li><a style="text-decoration:none;" href="/"><i class="fas fa-home"></i>Home</a></li>
            <li><a style="text-decoration:none;" href="/donor/donate-blood"><i class="fas fa-hand-holding-medical"></i>Donate Blood</a></li>
            <li><a style="text-decoration:none;" href="/donor/donation-history"><i class="fas fa-history"></i>Donation History</a></li>
            <li><a style="text-decoration:none;" href="/donor/make-request"><i class="fas fa-sync-alt"></i>Blood Request</a></li>
            <li><a style="text-decoration:none;" href="/donor/request-history"><i class="fas fa-history"></i>Request History</a></li>

        
        </ul> 

    </div>
    <div class="main_content">


        <div class="header">
            <h3 class="text-center">Donor Dashboard</h3>
        </div>

        <div class="info">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">USER ID</h5>
                            <!-- print userid -->
                            <p class="card-text"><?php
                           
                            echo $_SESSION['userid'];
                           
                            ?></p>

                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Donor Name</h5>
                            <p class="card-text">{{$donor->name}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Donor Email</h5>
                            <p class="card-text">{{$donor->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Donor Phone</h5>
                            <p class="card-text">{{$donor->phone}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Donor Address</h5>
                            <p class="card-text">{{$donor->address}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">


    </div>
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--
developed By : sumit kumar
facebook : fb.com/sumit.luv
youtube : youtube.com/lazycoders
-->
</body>
</html>