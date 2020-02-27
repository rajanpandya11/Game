<?php
        session_start();


    include("config.php");


   //get user's ID for the JOIN in leaderboard
         $user = $_SESSION['username'];



    if ($_SESSION['username'] == "") {
        header("Location: index.php?error=You must login first.");
        exit;
    }



        $getid = "SELECT idUsers
                FROM Users
                WHERE name in ('" . $user . "')";
	
	echo $getid;
	
	
	$id = mysql_query($getid,$con);

	echo ("id: " . $id. ".");

	$row = mysql_fetch_row($id);
	echo $row;	

   //get last points and level  
        $score = $_POST['points'];
        $level = $_POST['level'];

   //insert all to 1p table
        $query = "INSERT INTO 1p (1pScore, 1pLevel, idUsers) VALUES 
                ($score, $level, $row[0])";

	echo $query;

        $result = mysql_query($query, $con);

        mysql_close($con);

 
?>
<html>
<body>




</body>
<script>';
</html>
