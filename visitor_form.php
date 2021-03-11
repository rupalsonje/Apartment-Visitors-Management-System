<?php 
    session_start();
    
$conn = mysqli_connect('localhost','rupal','1234567890','apartment visitor management system');

$name = '';
$number = '';
$address ='';
$apartment_number='';
$floor_number ='';
$meet = '';
$reason = '';
if(!$conn){
    echo 'econnection error: '. mysqli_connect_error();
}
$error = array('number'=>'','name'=>'','apart_number'=>'','floor_number'=>'','meet'=>'','reason'=>'','address'=>'');

if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $error['name']= "name is required";
    }
    else{
        $name = htmlspecialchars($_POST['name']);
    }
    
    if(empty($_POST['number'])){
        $error['number']= "Mobile Number is required";
    }
    else{
        $number = htmlspecialchars($_POST['number']);
        if(strlen($number)!=10){
            $error['number']= "Mobile Number should be of 10 digits";
        }
    }

    if(empty($_POST['address'])){
        $error['address']= "address is required";
    }
    else{
        $address = htmlspecialchars($_POST['address']);        
    }
    if(empty($_POST['apart_number'])){
        $error['apart_number']= "apartment number is required";
    }
    else{
        $apartment_number = htmlspecialchars($_POST['apart_number']);        
    }
    if(empty($_POST['floor_number'])){
        $error['floor_number']= "floor/wing is required";
    }    
    else{
        $floor_number = htmlspecialchars($_POST['floor_number']);        
    }
    if(empty($_POST['meet'])){
        $error['floor_number']= "Mention whom you want to meet";
    }    
    else{
        $meet = htmlspecialchars($_POST['meet']);        
    }    
    if(empty($_POST['reason'])){
        $error['reason']= "reason to meet is required";
    }    
    else{
        $reason = htmlspecialchars($_POST['reason']);        
    }
    
    if(array_filter($error)){
        // echo 'errors in form';
    }
    else{

        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $number = mysqli_real_escape_string($conn,$_POST['number']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        $apartment_number = mysqli_real_escape_string($conn,$_POST['apart_number']);
        $floor_number = mysqli_real_escape_string($conn,$_POST['floor_number']);
        $meet = mysqli_real_escape_string($conn,$_POST['meet']);
        $reason = mysqli_real_escape_string($conn,$_POST['reason']);

        // date_default_timezone_set('Asia/Kolkata');
        // $date=date('d-m-Y H:i');
        
        $sql = "INSERT INTO `visitor_data`(`visitors name`,`mobile number`,`address`,`apartment number`,`floor`,`whom to meet`,`reason to meet`,`entry time`) VALUES ('$name','$number','$address','$apartment_number','$floor_number','$meet','$reason',now());";
        if(mysqli_query($conn,$sql)){
            header('Location:managevisitor.php');
        }
        // else{

        // }
    }
}

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
                <form id="survey-form" method="POST">
                    <div class="form-group">
                        <label id="name-label" for="name">Visitor's Name</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="name" placeholder="Enter your name" value="<?php echo $name ?>">
                        <p class="error"><?php echo $error['name']; ?></p>
                    </div>
                    <div class="form-group">
                        <label id="number-label" for="number">Mobile Number</label>
                        <input type="number" name="number" id="number" maxlength="10" class="form-control" placeholder="Mobile Number" value="<?php echo $number ?>">
                        <p class="error"><?php echo $error['number']; ?></p>
                    </div>
                    <div class="form-group">
                        <label id="address-label" for="number">Address</label>
                        <textarea type="text" rows="4" cols="100" name="address" id="address" class="form-control" autocomplete="address" placeholder="Address"><?php echo $address ?></textarea>
                        <p class="error"><?php echo $error['address']; ?></p>
                    </div>
                    <div class="form-group">
                        <label id="apart_number-label" for="number">Apartment Number</label>
                        <input type="number" name="apart_number" id="apart_number" class="form-control" placeholder="Apartment Number" value="<?php echo $apartment_number ?>">
                        <p class="error"><?php echo $error['apart_number']; ?></p>
                    </div>
                    <div class="form-group">
                        <label id="floor_number-label" for="number">Floor/Wing</label>
                        <input type="number" name="floor_number" id="floor_number" class="form-control" placeholder="Floor/Wing" value="<?php echo $floor_number ?>">
                        <p class="error"><?php echo $error['floor_number']; ?></p>
                    </div>
                    <div class="form-group">
                        <label id="meet-label" for="name">Whom to meet</label>
                        <input type="text" name="meet" id="meet" class="form-control" placeholder="Whom to meet" value="<?php echo $meet ?>">
                        <p class="error"><?php echo $error['meet']; ?></p>
                    </div>
                    <div class="form-group">
                        <label id="reason-label" for="name">Reason to meet</label>
                        <input type="text" name="reason" id="reason" class="form-control" placeholder="Reason to meet" value="<?php echo $reason ?>">
                        <p class="error"><?php echo $error['reason']; ?></p>
                    </div>

                    <div class="form-group">
                    <button type="submit" id="submit" name="submit" class="submit-button">
                        Submit
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>