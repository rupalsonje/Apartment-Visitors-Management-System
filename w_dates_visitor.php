<?php 
    session_start();
    include('db_connect.php');

    $count=1;

    $visitors=$_SESSION['data'];

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/managevisitor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="area"> 
        <section>
            <h1>Visitors Between Date</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                    <th>S.NO</th>
                    <th>Visitor Name</th>
                    <th>Contact Number</th>
                    <th>Whom To Visit</th>
                    <th>View Form</th>
                    </tr>
                </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0">
                    <?php if (count($visitors)==0){ ?>
                        <p class="data"><?php echo"no data found"; ?></p>
                    <?php }else{?>
                    <?php foreach($visitors as $visitor){ 
                        if ($visitor['outing remark']!=NULL){?>
                    <tbody>
                        <tr>
                        <td><?php echo $count?></td>
                        <td><?php echo htmlspecialchars($visitor['visitors name']); ?></td>
                        <td><?php echo htmlspecialchars($visitor['mobile number']); ?></td>
                        <td><?php echo htmlspecialchars($visitor['whom to meet']); ?></td>
                        <td><a href="visitor_view.php?id=<?php echo $visitor['id']; ?>"><i class="fa fa-angle-double-right fa-2x"></i></a></td>
                        </tr>
                    </tbody>
                    <?php $count++; }}}?>
                </table>
            </div>
        </section>          
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(window).on("load resize ", function() {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({'padding-right':scrollWidth});
          }).resize();
    </script>
 
</body>
</html>