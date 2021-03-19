<?php 
    session_start();
    include('db_connect.php');

    $remark='';
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn,$_GET['id']);
        $sql="SELECT * FROM visitor_data WHERE id = $id;";
        
        $result = mysqli_query($conn,$sql);

        $visitor = mysqli_fetch_all($result,MYSQLI_ASSOC);

        mysqli_free_result($result);

    }
    $error = array('remark'=>'');

    if(isset($_POST['submit'])){
        if(empty($_POST['remark'])){
            $error['remark']= "Outing Remark is required";
        }
        else{
            $remark = htmlspecialchars($_POST['remark']);
        }

        if(array_filter($error)){
        }
        else{
            $remark = mysqli_real_escape_string($conn,$_POST['remark']);
            $sql = "UPDATE `visitor_data` SET `outing remark`='".$remark."',`out time`=now() WHERE id='".$id."'";
            
            if(mysqli_query($conn,$sql)){
                header('Location:managevisitor.php');
                mysqli_close($conn);
            }
            else{
                $error['remark']="Error! Unable to get data";
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
                <header class="header">
                    <h1 id="title" class="text-center">Add a New Visitor</h1>
                </header>
                <form id="survey-form" method="POST" action="">
                    <div class="form-group">
                        <label id="name-label" for="name">Visitor's Name</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="name" placeholder="Enter your name" value="<?php echo htmlspecialchars($visitor[0]['visitors name']); ?>" readonly>
                    </div>
                    <div class="form-group">
                       <label id="number-label" for="number">Phone Number</label>
                        <input type="number" name="number" id="number" value="<?php echo htmlspecialchars($visitor[0]['mobile number']); ?>" class="form-control" placeholder="Mobile Number" readonly>
                    </div>
                    <div class="form-group">
                       <label id="address-label" for="number">Address</label>
                        <textarea type="text" rows="4" cols="100" name="address" id="address" class="form-control" autocomplete="address" readonly placeholder="Address"><?php echo htmlspecialchars($visitor[0]['address']); ?></textarea>
                    </div>
                    <div class="form-group">
                       <label id="apart_number-label" for="number">Apartment Number</label>
                        <input type="number" name="apart_number" value="<?php echo htmlspecialchars($visitor[0]['apartment number']); ?>" id="apart_number" class="form-control" placeholder="Apartment Number" readonly>
                    </div>
                    <div class="form-group">
                       <label id="floor_number-label" for="number">Floor/Wing</label>
                        <input type="number" name="floor_number" value="<?php echo htmlspecialchars($visitor[0]['floor']); ?>" id="floor_number" class="form-control" placeholder="Floor/Wing" readonly>
                    </div>
                    <div class="form-group">
                        <label id="meet-label" for="name">Whom to meet</label>
                        <input type="text" name="meet" id="meet" value="<?php echo htmlspecialchars($visitor[0]['whom to meet']); ?>" class="form-control" placeholder="Whom to meet" required  readonly>
                    </div>
                    <div class="form-group">
                        <label id="reason-label" for="name">Reason to meet</label>
                        <input type="text" name="reason" id="reason" value="<?php echo htmlspecialchars($visitor[0]['reason to meet']); ?>" class="form-control" placeholder="Reason to meet" required  readonly>
                    </div>
                    <div class="form-group">
                        <label id="time-label" for="number">Entry Time</label>
                         <input type="text" name="entry_time" id="entry_time" class="form-control" value="<?php echo date(htmlspecialchars($visitor[0]['entry time'])); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label id="remark-label" for="remark">Outing remark</label>
                         <textarea type="text" rows="4" cols="100" name="remark" id="remark" class="form-control" placeholder="Outing Remark"></textarea>
                         <p class="error"><?php echo $error['remark']; ?></p>
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