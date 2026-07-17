<?php
if ($locker=1) {
    # code...
    $db_server='localhost';
    $db_user='root';
    $db_pass='';
    $db_name='lostandfound_db';
    $conn=new mysqli($db_server,$db_user,$db_pass,$db_name);
    // if ($conn) {
    //     echo'you are connected';
    //     # code...
    // }
    $login_page="login.php";
    $register="register.php";
    $homepage="index.php";
    $dashboard="pages/dashboard.php";
    $logout="logout.php";
}


?>