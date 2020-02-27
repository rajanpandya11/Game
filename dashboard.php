<?php
    include('config.php');
    session_start();
    if ($_SESSION['username'] == "" ) {
        header("Location: index.php?error=You must login first.");
        exit;
    }
    $query = "SELECT user, comment, star FROM Comments order by star desc";
    $result = mysql_query($query, $con) or die(mysql_error());
    $output = '';
    $some = 'some';
    $blank = '';
    $none = 'none';
    $i=1;
    if($result != null){
    	while($row = mysql_fetch_row($result)){
        	$output = $output . "<li class='comment " . (($i>10)? $some : $blank)  . "' style='display: " . (($i>10)? $none : $blank) . ";'>
<div class='comment-body'> <div class='comment-author'>";
	        $output = $output . "<cite class='fn'>" . $row[0] . "</cite> <span>says:</span></div>";
	        $output = $output . "<div class='comment-meta'>" . ($row[2] ?: $none) . " stars</div>";
	        $output = $output . "<p>" . $row[1] . "</p>";
	        $output = $output . "</div></li>";
		$i++;
	}
//	$output = $output . "</tbody></table>";
    }
?>

<html>
<head>

<title>Welcome to G6 Games Inc!</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      div.stars {
        width: 270px;
        display: inline-block;
      }

      input.star { display: none; }

      label.star {
        float: right;
        padding: 10px;
        font-size: 36px;
        color: #444;
        transition: all .2s;
      }

      input.star:checked ~ label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
      }

      input.star-5:checked ~ label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952;
      }

      input.star-1:checked ~ label.star:before { color: #F62; }

      label.star:hover { transform: rotate(-15deg) scale(1.3); }

      label.star:before {
        content:'\f006';
	font-family: FontAwesome;
      }
    .comment{
        line-height: 18px;
	background-color: aliceblue;
    }
    li {
        display: list-item;
        text-align: -webkit-match-parent;
    }
    .comment-body {
        position: relative;
        padding-left: 25px;
        padding-top: 25px;
        padding-right: 25px;
        padding-bottom: 25px;
        border: 1px solid #d0d0d0;
        -moz-box-shadow: 0 2px 0 #e6e6e6;
        box-shadow: 0 2px 0 #e6e6e6;
        margin-bottom: 40px;
    }
    .comment-author {
        font-size: 18px;
        margin-bottom: 12px;
        color: #1a1a1a;
    }
    cite.fn {
        color: #000;
        font-style: normal;
    }
    .comment-meta {
        color: #808080;
        text-decoration: none !important;
        font-size: 14px;
        font-family: 'proxima_nova_rgregular';
    }
    img.authors{
      border-radius:30%;
        width: 300px;
	height: 330px;
    }
   </style>
  </head>
<body>

<?php include("navigation.php"); ?>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <div class="w3-display-middle w3-margin-top w3-center">
        <h1 class="w3-xxlarge w3-text-white">
            <span class="w3-padding w3-black w3-opacity-min"><b>G6</b></span>
            <span class="w3-hide-small w3-text-light-grey">Gaming</span>
        </h1>
    </div>
    <style>

    video#bgvid{
    	min-width:100%;
    	min-height:100%;
    	width:auto;
    	height:auto;
    	background: url(the_desert-wide2.png) no-repeat top center;
    	background-size:cover;
    	 -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
    }

    </style>


    ``
    </head>
    <body>
    	<div class="w3-display-middle w3-margin-top w3-center">
    		<h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>G6</b></span> <span class="w3-hide-small w3-text-light-grey">Gaming</span></h1>
    	</div>

      <video id="bgvid" autoplay poster="**image link**">

    <source src="Blue.mp4" type="video/mp4" />

    </video>
</header>

<!-- Page content -->
<div id="top" class="w3-content w3-padding" style="max-width:1564px">

    <!-- Project Section -->
    <div class="w3-container w3-padding-32" id="projects">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Features</h3>
    </div>

    <div class="w3-row-padding">
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Challenging 1-Player Mode!</div>

                <img src="images/1pmode.jpg" alt="Screen1" style="width:70%; height=70%;">

            </div>
        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Survive against a raging onslaught of bubbles!</div>

                <img src="images/survival.jpg" alt="Screen2" style="width:100%">

            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Get your name on the Leaderboard!</div>

                <img src="images/highscores.jpg" alt="Screen 3" style="width:100%">

            </div>
        </div>
    </div>
<br>
    <div class="w3-row-padding">
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Fast-paced 2-Player Mode!</div>
                <img src="images/2pmode.jpg" alt="Screen 4" style="width:99%">
            </div>
        </div>

 <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding"></div>
		 <div class="w3-display-topleft w3-black w3-padding">Upgrade your weapons!</div>
                <img src="images/upgrade.jpg" alt="Screen 5" style="width:100%">

            </div>
        </div>

 <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding"></div>
			 <div class="w3-display-topleft w3-black w3-padding">Fight to the death!</div>

                <img src="images/gameover.jpg" alt="Screen 6" style="width:100%">

            </div>
        </div>
    </div>


    <!-- Group Section -->
    <div class="w3-container w3-padding-32" id="about">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
        <p>G6 (Group 6) Gaming wanted to make a simple, fun shooter game with side-scrolling action
and a 1-player leaderboard for users to compete.  The initial design inspired us to create a 2-player
browser game for players to play together on the same screen.</p>
    </div>

    <div class="w3-row-padding w3-grayscale">
        <div class="w3-col l3 m6 w3-margin-bottom">
            <img class="authors"  src="images/paul.jpg" alt="Paul">
            <h3>Paul Edwards</h3>
            <p class="w3-opacity">Web Design, Database, Game Design</p>
            <p></p>

        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <img class="authors"  src="images/sotir.jpg" alt="Sotir">
            <h3>Sotiri Kolvani</h3>
            <p class="w3-opacity">Web Design, PHP, Database</p>
        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <img class="authors" src="images/rajan.jpg" alt="Rajan">
            <h3>Rajan Pandya</h3>
            <p class="w3-opacity">Game Design, Database</p>

        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <img class="authors" src="images/zach.jpg" alt="Zach">
            <h3>Zach Talbert</h3>
            <p class="w3-opacity">Game Design, Database</p>

        </div>
    </div>


    <!-- Contact Section -->
    <div class="w3-container w3-padding-32 w3-center" id="comments" >
        <button class="w3-button w3-black w3-section" type="button" data-toggle="modal" data-target="#feedbackModal">
        <i class="fa fa-comment-o" style="padding: 0.5em;" ></i>  WRITE COMMENT
        </button>
    </div>

    <div class="modal fade" id="feedbackModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Feedback to G6 Games</h4>
                </div>

                <div class="modal-body">
                    <form action="" id="feedbackForm">
                        <label for="desc">Comments</label>
                        <input autofocus id="thecomment" type="text" name="desc" value="" placeholder="how did you like it?" class="w3-input w3-section"
                            required>
                        <div class="stars">
                            <input value="5" class="star star-5" id="star-5" type="radio" name="star" />
                            <label class="star star-5" for="star-5"></label>
                            <input value="4" class="star star-4" id="star-4" type="radio" name="star" />
                            <label class="star star-4" for="star-4"></label>
                            <input value="3" class="star star-3" id="star-3" type="radio" name="star" />
                            <label class="star star-3" for="star-3"></label>
                            <input value="2" class="star star-2" id="star-2" type="radio" name="star" />
                            <label class="star star-2" for="star-2"></label>
                            <input value="1" class="star star-1" id="star-1" type="radio" name="star" />
                            <label class="star star-1" for="star-1"></label>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button onclick="sendForm();" type="submit" class="w3-button w3-black w3-section" data-dismiss="modal">Send</button>
                    <button type="button" class="w3-button w3-white w3-section" data-dismiss="modal">Cancel</button>
                </div>
                <script>
                    function sendForm() {
                        var allinputs = document.getElementsByTagName('input');
                        var theone = getThestar(allinputs).value;
                        var comment = document.getElementById('thecomment').value;
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                location.reload();
                            }
                        };
                        xhttp.open("GET", "saveComments.php?comment=" + comment + "&star=" + theone, true);
                        xhttp.send();
                    }

                    function getThestar(allinputs) {
                        var thestar = [];
                        for (var i = 0; i < allinputs.length; i++) {
                            if (allinputs[i].type == 'radio' && allinputs[i].checked == true) {
                                return allinputs[i];
                            }
                        }
                        return '0';
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="w3-container w3-padding-32 w3-center">
	<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16"> <?php echo $i-1;?> Comments</h3>
	<div id="comment_list" style="width:70%; clear: both; overflow: hidden; list-style: none; margin: 0; padding: 0;" >
	<ol class='commentlist'>
	<?php echo $output; ?>
	</ol>
	</div>
	<button class="w3-button w3-left w3-black toggleButton" onclick="showAll();" >Show All</button>
	<button class="w3-button w3-left w3-black toggleButton" onclick="showAll();" style="display:none">Show Less</button>
    </div>
	<script>
		function showAll(){
			$("li.some").toggle();
			$(".toggleButton").toggle();
		}
	</script>
    <!-- End page content -->

</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
    <p>Group 6, COP4813: Internet Programming.</p>
</footer>

</body>

</html>
