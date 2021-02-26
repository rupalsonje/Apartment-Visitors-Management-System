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
                    <h1 id="title" class="text-center">Add a New Visitor</h1>
                </header>
                <form id="survey-form">
                    <div class="form-group">
                        <label id="name-label" for="name">Visitor's Name</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="name" placeholder="Enter your name" readonly required>
                    </div>
                    <div class="form-group">
                       <label id="number-label" for="number">Mobile Number</label>
                        <input type="number" name="number" id="number" maxlength="10" class="form-control" placeholder="Mobile Number" readonly>
                    </div>
                    <div class="form-group">
                       <label id="address-label" for="number">Address</label>
                        <textarea type="text" rows="4" cols="100" name="address" id="address" class="form-control" autocomplete="address" readonly placeholder="Address"></textarea>
                    </div>
                    <div class="form-group">
                       <label id="apart_number-label" for="number">Apartment Number</label>
                        <input type="number" name="apart_number" id="apart_number" class="form-control" placeholder="Apartment Number" readonly>
                    </div>
                    <div class="form-group">
                       <label id="floor_number-label" for="number">Floor/Wing</label>
                        <input type="number" name="floor_number" id="floor_number" class="form-control" placeholder="Floor/Wing" readonly>
                    </div>
                    <div class="form-group">
                        <label id="meet-label" for="name">Whom to meet</label>
                        <input type="text" name="meet" id="meet" class="form-control" placeholder="Whom to meet" required  readonly>
                    </div>
                    <div class="form-group">
                        <label id="reason-label" for="name">Reason to meet</label>
                        <input type="text" name="reason" id="reason" class="form-control" placeholder="Reason to meet" required  readonly>
                    </div>
                    <div class="form-group">
                        <label id="time-label" for="number">Visitor Entring Time</label>
                         <input type="text" name="entry_time" id="entry_time" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label id="remark-label" for="remark">Outing remark</label>
                         <textarea type="text" rows="4" cols="100" name="remark" id="remark" class="form-control" placeholder="Outing Remark"></textarea>
                    </div>
 
                    <div class="form-group">
                    <button type="submit" id="submit" class="submit-button">
                        Submit
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>