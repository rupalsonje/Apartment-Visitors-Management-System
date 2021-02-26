<?php 
    session_start();
    // echo $_SESSION['username']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="admin.php">
                    <i class="fa fa-laptop fa-2x"></i>
                    <span class="nav-text">
                    Dashboard
                    </span>
                </a>                
            </li>
            <li class="has-subnav">
                <a href="#">
                    <i class="fa fa-user fa-2x"></i>
                    <span class="nav-text">
                        New Visitor
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="#">
                    <i class="fa fa-users fa-2x"></i>
                    <span class="nav-text">
                        Manage Visitors
                    </span>
                </a>                
            </li>
            <li class="has-subnav">
                <a href="#">
                    <i class="fa fa-check fa-2x"></i>
                    <span class="nav-text">
                        Visitors B/W Dates
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-cog fa-2x"></i>
                    <span class="nav-text">
                        Profile
                    </span>
                </a>
            </li>
            <li>
        <ul class="logout">
            <li>
                <a href="#">
                        <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>  
        </ul>
    </nav>
    <div class="area">
        <div class="container">
            <div class="row">
                <a href="" title="Button push lightblue" class="button btnPush btnLightBlue">Change Password</a>
                <header class="header">
                    <h1 id="title" class="text-center">Admin Profile</h1>
                </header>
                <form id="survey-form">
                    <div class="form-group">
                        <label id="name-label" for="name">Admin Name</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label id="email-label" for="name">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" autocomplete="email" placeholder="Enter your email address" required>
                    </div>
                    <div class="form-group">
                       <label id="number-label" for="number">Mobile Number</label>
                        <input type="number" name="number" id="number" maxlength="10" class="form-control" placeholder="Mobile Number">
                    </div>
                    <div class="form-group">
                        <label id="user-label" for="username">User Name</label>
                        <input type="text" name="user" id="user" class="form-control" placeholder="Whom to meet" required  readonly>
                    </div>
                    <div class="form-group">
                        <label id="time-label" for="number">Admin Registration Date</label>
                         <input type="text" name="reg_time" id="reg_time" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="submit" class="submit-button">
                            UPDATE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>