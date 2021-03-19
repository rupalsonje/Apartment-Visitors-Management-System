<?php 
    session_start();
    include('db_connect.php');

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
    <?php include('navbar.php'); ?>
    <div class="area">
        <div class="container">
            <div class="row">
                <header class="header">
                    <h1 id="title" class="text-center">Add a New Visitor</h1>
                </header>
                <form id="survey-form">
                    <div class="form-group">
                        <label id="date-label" for="date">From Date</label>
                        <input type="date" name="from_date" id="from_date" class="form-control" placeholder="from date" required>
                    </div>
                    <div class="form-group">
                        <label id="name-label" for="name">To Date</label>
                        <input type="date" name="to_date" id="to_date" class="form-control" placeholder="to date" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" class="submit-button">
                            VIEW
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>