<?php
    session_start();
    include('config.php');
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $comment = mysql_real_escape_string($_GET['comment']);
        $star =  $_GET['star'];
        if($star == 'undefined')
            $star = '';
        $user = $_SESSION['username'];
        $query = "INSERT INTO Comments (comment, star, user)"; 
        $query = $query . "VALUES ('$comment', '$star', '$user')";
        $result = mysql_query($query);         
    }
    header("Location: dashboard.php");
?>
