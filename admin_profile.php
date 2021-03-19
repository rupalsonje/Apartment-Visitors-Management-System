<?php 
    session_start();
    include('db_connect.php');

    $sql="SELECT `id`,`admin name`,`username`,`email`,`number` FROM `login`";
    
    $result = mysqli_query($conn,$sql);

    $login = mysqli_fetch_all($result,MYSQLI_ASSOC);

    mysqli_free_result($result);

    
    $error = array('name'=>'','email'=>'','number'=>'','user'=>'');

    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $error['name']= "Admin Name is required";
        }
        else{
            $name = htmlspecialchars($_POST['name']);
        }
        if(empty($_POST['email'])){
            $error['email']= "Email is required";
        }
        else{
            $email = htmlspecialchars($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Invalid email format";
            }
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

        if(array_filter($error)){
        }
        else{
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $number = mysqli_real_escape_string($conn,$_POST['number']);
            $chk=$login[0]['id'];
            
            $sql = "UPDATE `login` SET `admin name`='".$name."',`email`='".$email."',`number`='".$number."',`last updated`=now() WHERE id='".$chk."'";
            
            if(mysqli_query($conn,$sql)){
                header('Location:admin.php');
                mysqli_close($conn);
            }
            else{
                $error['user']='Error while updating profile';
            }
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
    <?php include('navbar.php'); ?>
    <div class="area">
        <div class="container">
            <div class="row">
                <a href="change_pass.php" title="Button push lightblue" class="button btnPush btnLightBlue">Change Password</a>
                <header class="header">
                    <h1 id="title" class="text-center">Admin Profile</h1>
                </header>
                <form id="survey-form" method="POST">
                    <div class="form-group">
                        <label id="name-label" for="name">Admin Name</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="name" value="<?php echo htmlspecialchars($login[0]['admin name']) ?>" placeholder="Enter your name" required>
                        <p class="error"><?php echo $error['name']; ?></p>
                    </div>
                    <div class="form-group">
                        <label id="email-label" for="name">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" autocomplete="email" value="<?php echo htmlspecialchars($login[0]['email']) ?>" placeholder="Enter your email address" required>
                        <p class="error"><?php echo $error['email']; ?></p>
                    </div>
                    <div class="form-group">
                       <label id="number-label" for="number">Mobile Number</label>
                        <input type="number" name="number" id="number" maxlength="10" value="<?php echo htmlspecialchars($login[0]['number'])?>" class="form-control" placeholder="Mobile Number">
                        <p class="error"><?php echo $error['number']; ?></p>
                    </div>
                    <div class="form-group">
                        <label id="user-label" for="username">User Name</label>
                        <input type="text" name="user" id="user" class="form-control" value="<?php echo htmlspecialchars($login[0]['username']) ?>" placeholder="username" readonly>
                        <p class="error"><?php echo $error['user']; ?></p>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="submit" name="submit" class="submit-button">
                            UPDATE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>