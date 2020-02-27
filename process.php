<?php
	include("config.php");
	
	

	session_start();

	

	$username = $_POST['username'];
	$password = $_POST['password'];
	$flag = false;

	$file_name = "login.txt";
	$fp = fopen($file_name, "r");
    while($line = fgets($fp))
	{
		$name = strtok($line, "|");
		$pass = strtok("|");
		if(strtolower($username) == trim($name) && $password == trim($pass))
			$flag = true;
	}
	fclose($fp);

	// if($username == 'rajan' && $password =='mypass'){
	// 	$flag = true;
	// }

	if($flag)
	{
		$_SESSION['username'] = $username;
		header('Location: dashboard.php');
		exit;
	}
    else
    {
		header("Location: index.php?error=Please enter valid username and password.");
		exit;
	}
?>
