<?php
    $conn = mysqli_connect('localhost','rupal','1234567890','apartment visitor management system');
    if(!$conn){
        echo 'Connection error: '. mysqli_connect_error();
    }
?>