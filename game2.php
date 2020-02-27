<?php
session_start();
if ($_SESSION['username'] == "") {
    header("Location: index.php?error=You must login first.");
    exit;
}
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
 <?php include("navigation.php"); ?> 
   <!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">


                <title>2 Player - G6 Games Inc.</title>
<style>
table {
	align: center;
    width: 100%;
 margin: 0px auto;

}

tr, td {
	align: center;
	}

</style>


  </head>
  <body>
<br><br><br>
	<table align="center">
	<tr align="center">
		<td>
<img src="images/2Pcontrols.jpg"
	style="border-radius:0; width:100%"/>
		</td>
		<td>
<img src="images/demo2.JPG"
        style="border-radius:0; width:100%"/>
		</td>
	</tr>
	<tr align="center">
		<td colspan="2">
 <a href="http://139.62.210.151/~group6/cop4813/2Player/" style=" font-size: 30px" align="center" class="w3-bar-item w3-button">Play Now!</a>
		</td>
	</tr>

	</table>
</html>

