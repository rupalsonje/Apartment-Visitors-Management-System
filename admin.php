<?php 
    session_start();
    include('db_connect.php');

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

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <?php include('navbar.php'); ?>
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