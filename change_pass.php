<?php 
    session_start();
    include('db_connect.php');

   $error = array('pass'=>'','new_pass'=>'','con_pass'=>'');

    if(isset($_POST['submit'])){
        if(empty($_POST['pass'])){
            $error['pass']= "Old Password is required";
        }
        else{
            $oldpass = htmlspecialchars($_POST['pass']);
        }
        if(empty($_POST['new_pass'])){
            $error['new_pass']= "Enter New Password";
        }
        else{
            $newpass = htmlspecialchars($_POST['new_pass']);
        }
        if(empty($_POST['con_pass'])){
            $error['con_pass']= "Confirm Password";
        }
        else{
            $con_pass = htmlspecialchars($_POST['con_pass']);
        }

        if(array_filter($error)){
            echo print_r($error);
        }
        else{
            $oldpass = mysqli_real_escape_string($conn,$_POST['pass']);
            $newpass = mysqli_real_escape_string($conn,$_POST['new_pass']);
            $conpass = mysqli_real_escape_string($conn,$_POST['con_pass']);

            $sql="SELECT `id`,`passw` FROM `login`";
    
            $result = mysqli_query($conn,$sql);
        
            $pass = mysqli_fetch_all($result,MYSQLI_ASSOC);
            echo print_r($pass);
            mysqli_free_result($result);
        
            if(md5($oldpass)==$pass[0]['passw']){
                if($newpass==$con_pass){
                    $newpass=md5($newpass);
                    $chk=$pass[0]['id'];
                    $sql1 = "UPDATE `login` SET `passw`='".$newpass."' WHERE `id`='".$chk."';";
            
                    if(mysqli_query($conn,$sql1)){
                        header('Location:admin_profile.php');
                        mysqli_close($conn);
                    }   
                    else{
                        $error['con_pass']='Error while updating password';
                    }
                } 
                else{
                    $error['con_pass']='Confirm Password does not match';
                }
            }
            else{
                $error['old_pass']='Old Password is incorrect';
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
    <title>Apartment</title>
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
                    <h1 id="title" class="text-center">Change Password</h1>
                </header>
                <form id="survey-form" method="POST">
                    <div class="form-group">
                        <label id="pass-label" for="name">Old Password</label>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Old Password" required>
                        <p class="error"><?php echo $error['pass']; ?></p>
                    </div>

                    <div class="form-group">
                        <label id="name-label" for="name">New Password</label>
                        <input type="password" name="new_pass" id="new_pass" class="form-control" placeholder="New Password" required>
                        <p class="error"><?php echo $error['new_pass']; ?></p>
                    </div>

                    <div class="form-group">
                        <label id="name-label" for="name">Confirm Password</label>
                        <input type="password" name="con_pass" id="con_pass" class="form-control" placeholder="Confirm Password" required>
                        <p class="error"><?php echo $error['con_pass']; ?></p>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" id="submit" class="submit-button">
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</body>
</html>