<?php 
    session_start();

    $conn = mysqli_connect('localhost','rupal','1234567890','apartment visitor management system');
    if(!$conn){
        echo 'econnection error: '. mysqli_connect_error();
    }
    $sql = "SELECT `visitors name`,`entry time` FROM visitor_data WHERE DATE(`entry time`) = CURDATE();";
    $result = mysqli_query($conn,$sql);
    $visitor_today = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);

    $sql="SELECT `visitors name`,`entry time` FROM visitor_data WHERE `entry time` BETWEEN DATE_SUB(CURDATE(),INTERVAL 1 DAY ) AND CURDATE();";    
    $result = mysqli_query($conn,$sql);
    $visitor_yes = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
   
    $sql="SELECT `visitors name`,`entry time` FROM visitor_data WHERE `entry time`>now() - interval 1 month;";
    $result = mysqli_query($conn,$sql);
    $visitor_month = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);

    $sql="SELECT `visitors name`,`entry time` FROM visitor_data WHERE `entry time`>now() - interval 6 month;";
    $result = mysqli_query($conn,$sql);
    $visitor_6month = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="#">
                    <i class="fa fa-laptop fa-2x"></i>
                    <span class="nav-text">
                    Dashboard
                    </span>
                </a>                
            </li>
            <li class="has-subnav">
                <a href="visitor_form.php">
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
                <div class="cards">
                    <div class="d_card">
                        <div class="card-data">
                            <i class="fa fa-user"></i>             
                            <h4><?php echo htmlspecialchars(count($visitor_today)) ;?></h4>
                        </div>
                        <h2>Todays Visitors</h2>
                    </div>
                    <div class="d_card">
                        <div class="card-data">
                            <i class="fa fa-user"></i>             
                            <h4><?php echo htmlspecialchars(count($visitor_yes)) ;?></h4>
                        </div>
                        <h2>Yesterdays Visitors</h2>
                    </div>
                    <div class="d_card">
                        <div class="card-data">
                            <i class="fa fa-user"></i>             
                            <h4><?php echo htmlspecialchars(count($visitor_month)) ;?></h4>
                        </div>
                        <h2>Last Month Visitors</h2>
                    </div>
                    <div class="d_card">
                        <div class="card-data">
                            <i class="fa fa-user"></i>             
                            <h4><?php echo htmlspecialchars(count($visitor_6month)) ;?></h4>
                        </div>
                        <h2>Past 6 Months Visitors</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>