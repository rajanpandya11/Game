<?php
	include("config.php");
        
        $name = mysql_real_escape_string($_POST["name"]);
        $pass = mysql_real_escape_string($_POST["pass"]);


	//first, check if name already taken
	$check="SELECT * FROM Users WHERE name = '$_POST[name]'";
	$rs = mysql_query($check,$con);
	$data[0] = mysql_fetch_array($rs);
	if($data[0] > 1) {
    		header ("Location: index.php?error=2");

		exit();
	}
	else
	{
	//Name not taken, add it
        	$query = "INSERT INTO Users (name, pass) VALUES ";
        	$query = $query . "('$name','$pass')";
       		$result = mysql_query($query, $con);
        
	
		mysql_close($con);


        	header("Location: index.php");
	}
?>
       
