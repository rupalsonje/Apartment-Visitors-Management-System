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
                <header class="header">
                    <h1 id="title" class="text-center">Change Password</h1>
                </header>
                <form id="survey-form">
                    <div class="form-group">
                        <label id="name-label" for="name">Old Password</label>
                        <input type="text" name="pass" id="pass" class="form-control" placeholder="Old Password" required>
                    </div>

                    <div class="form-group">
                        <label id="name-label" for="name">New Password</label>
                        <input type="text" name="new_pass" id="new_pass" class="form-control" placeholder="New Password" required>
                    </div>

                    <div class="form-group">
                        <label id="name-label" for="name">Confirm Password</label>
                        <input type="text" name="con_pass" id="con_pass" class="form-control" placeholder="Confirm Password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="submit" class="submit-button">
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</body>
</html>