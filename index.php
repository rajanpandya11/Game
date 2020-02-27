<?php
    $error = $_GET['error'];

    session_start();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset= "UTF-8">
<?php
	//connect to db
	include("config.php");

        $query = "SELECT * FROM Users";

        $result = mysql_query($query, $con);

	include("authenticate.php");

?>

<style>

video#bgvid {
    position: fixed;
    top: 45.2%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    -ms-transform: translateX(-50%) translateY(-50%);
    -moz-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    background: url(polina.jpg) no-repeat;
    background-size: cover;
}


</style>




    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script>
    $(document).ready(function () {
        $('.message a').click(function () {
            $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
        });
    });

</script>



</head>

<body>


    <div class="login">
        <div class="form">
            <form class="register-form" action="addUser.php" method="post">
                <input type="text" placeholder="name" name="name"/>
                <input type="password" placeholder="password" name="pass"/>
                <input type="password" placeholder="confirm password" name="confirm"/>
		<button type="submit">Create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>

            <form action="authenticate.php" class="login-form" method="post">
                <input type="text" placeholder="username" name="username" required/>
                <input type="password" placeholder="password" name="password" required/>
		<button type="submit">Login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
                <p style="color: red; font-family: monospace; font-weight: bold;">

                    <?php



			//get error from authenticate if invalid login
			$error = $_GET["error"];
                        if ($error == "1") {
                            echo ("Invalid username or password.");
                        }
			elseif ($error == "2") {
			echo ("Username already exists, please login.");
			}
                    ?>
                </p>

            </form>
        </div>
        <video id="bgvid" autoplay>

      <source src="bandicam5.mp4" type="video/mp4" />

      </video>

    </div>

</body>


</html>
