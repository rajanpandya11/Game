<?php
   include("config.php");
   session_start();   

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $name = mysql_real_escape_string($_POST['username']);
      $pass = mysql_real_escape_string($_POST['password']); 
      
      $query = "SELECT idUsers FROM Users WHERE name = '$name' and pass = '$pass'";
      $result = mysql_query($query, $con);
      $row = mysql_fetch_array($result);
      $active = $row['active'];
      
      $count = mysql_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['username'] = $name;
         
         header("location: dashboard.php");

      }else {
	header("Location: index.php?error=1");
	exit();
      }
   }
?>
