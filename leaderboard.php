<?php
if(session_status()!=PHP_SESSION_ACTIVE)
	session_start();
if ($_SESSION['username'] == "") {
    header("Location: index.php?error=You must login first.");
    exit;
}
?>

<?php
	//Connect to db
	include("config.php");
	//JOIN users and 1p scores
	



	$query = "SELECT Users.name, 1p.1pScore, 1p.1pLevel
        FROM Users
        INNER JOIN 1p
        ON Users.idUsers = 1p.idUsers
        order by 1pScore desc;";	


	$result =  $result = mysql_query($query, $con) or die(mysql_error());


	$query2 = "SELECT Users.name, 1p.1pScore, 1p.1pLevel
        FROM Users
        INNER JOIN 1p
        ON Users.idUsers = 1p.idUsers
        order by 1pLevel desc;";	


	$result2 =  $result2 = mysql_query($query2, $con) or die(mysql_error());

?>

<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">    
    <!--<link rel="stylesheet" type="text/css" href="css/leaderboard.css">-->

    <style>
        body {
            padding: 0;
            margin: 0;
        }
    </style>
    <title>Leaderboard - G6 Games Inc</title>

</head>

<body>

    <?php
	//get nav bar
	include("navigation.php");
	?>
    <div class="row">
        
        <div class='leaderboard w3-left col-lg-4' style="width:50%;">
            <h1><span>Leader Board By Points</span></h1>
            <button class="w3-button w3-left w3-black toggleButton bypoints" onclick="showAllPoints();" >Show All</button>
            <button class="w3-button w3-left w3-black toggleButton bypoints" onclick="showAllPoints();" style="display:none">Show Less</button>        
            <div class="content">            
                <ul>
                        <?php 
                        $i =0;
                        $blank = '';
                        $none = 'none';
                        $some = 'somepoints';                    
                        while($row = mysql_fetch_row($result))
                        {
                            $i++;
                            $name = $row[0];
                            $score = $row[1];
                            $level = $row[2];

                            echo "<li class='" . (($i>10)? $some : $blank) . "' style='display: " . (($i>10)? $none : $blank) . ";'>";
                            echo "<span class='name'>" . $name . "</span>";
                            echo "<span class='points'>" . $score . "</span>";
                            echo "<span class='levels'>" . $level . "</span>";                            
                            echo "</li>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
            <button class="w3-button w3-left w3-black toggleButton bypoints" onclick="showAllPoints();" >Show All</button>
            <button class="w3-button w3-left w3-black toggleButton bypoints" onclick="showAllPoints();" style="display:none">Show Less</button>
        </div>        

        <div class='leaderboard w3-right col-lg-4' style="width:50%;">
            <h1><span>Leader Board By Level</span></h1>
            <button class="w3-button w3-right w3-black toggleButton bylevels" onclick="showAllLevels();" >Show All</button>
            <button class="w3-button w3-right w3-black toggleButton bylevels" onclick="showAllLevels();" style="display:none">Show Less</button>        
            <div class="content">            
                <ul>
                        <?php 
                        $i =0;
                        $blank = '';
                        $none = 'none';
                        $some = 'somelevels';                    
                        while($row = mysql_fetch_row($result2))
                        {
                            $i++;
                            $name = $row[0];
                            $score = $row[1];
                            $level = $row[2];

                            echo "<li class='" . (($i>10)? $some : $blank) . "' style='display: " . (($i>10)? $none : $blank) . ";'>";
                            echo "<span class='name'>" . $name . "</span>";
                            echo "<span class='points'>" . $score . "</span>";
                            echo "<span class='levels'>" . $level . "</span>";                            
                            echo "</li>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
            <button class="w3-button w3-right w3-black toggleButton bylevels" onclick="showAllLevels();" >Show All</button>
            <button class="w3-button w3-right w3-black toggleButton bylevels" onclick="showAllLevels();" style="display:none">Show Less</button>
        </div>        
    </div>
        

</body>
	<script>
		function showAllPoints(){	
			$("li.somepoints").toggle();
			$(".toggleButton.bypoints").toggle();
		}
		function showAllLevels(){	
			$("li.somelevels").toggle();
			$(".toggleButton.bylevels").toggle();
		}
    </script>    
</html>
