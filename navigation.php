<?php
//This just sets up the navigation bar at the top of every page.
echo '
<div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
            <a href="dashboard.php" class="w3-bar-item w3-button"><b>G6</b> Gaming</a>
            <!-- Float links to the right. Hide them on small screens -->
            <div class="w3-right w3-hide-small">
                <a href="game1.php" class="w3-bar-item w3-button">Play 1-Player!</a>
		<a href="game2.php" class="w3-bar-item w3-button">Play 2-Player!</a>
                <a href="leaderboard.php" class="w3-bar-item w3-button">Leaderboard</a>
                <a href="dashboard.php#about" class="w3-bar-item w3-button">About</a>
                <a href="dashboard.php#comments" class="w3-bar-item w3-button">Comments</a>
                <div class="w3-dropdown-hover">
                        <button class="w3-button w3-light-grey">
Welcome, '; 
 echo $_SESSION['username'];
echo'                        </button>
                        <div class="w3-dropdown-content w3-bar-block w3-border">
                                <a class="w3-bar-item w3-button" href="logout.php">Logout</a>
                        </div>
                </div>
           </div>
       </div>
    </div>';


