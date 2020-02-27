<?php
	session_start();
    $username = $_SESSION['username'];
    if($username != "")
    {
        session_destroy();
        header("Location: index.php"); 
    }
    else{
        header("Location: index.php?error=You must login first.");
    }
?>
