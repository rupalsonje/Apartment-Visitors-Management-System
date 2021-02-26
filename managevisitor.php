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
        <section>
            <form action="" class="search-bar">
                <input type="search" name="search" required>
                <button class="search-btn" type="submit">
                    <span>Search</span>
                </button>
            </form>
            <h1>Manage Visitors</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                    <th>S.NO</th>
                    <th>Visitor Name</th>
                    <th>Contact Number</th>
                    <th>Whom To Visit</th>
                    <th>Action</th>
                    </tr>
                </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>RUPAL SONJE</td>
                    <td>0123456789</td>
                    <td>NIKHIL</td>
                    <td><a href="managevisitorform.html"><i class="fa fa-edit fa-2x"></i></a></td>
                    </tr>
                </tbody>
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