<?php
session_start();
if ($_SESSION['username'] == "") {
    header("Location: index.php?error=You must login first.");
    exit;
}
?>
<html>

<head>
    <style>canvas {cursor: none;}</style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="libraries/p5.js"></script>
    <script language="javascript" type="text/javascript" src="libraries/p5.dom.js"></script>
    <script language="javascript" type="text/javascript" src="libraries/p5.sound.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
    <script language="javascript" type="text/javascript" src="bubble.js"></script>
    <script language="javascript" type="text/javascript" src="obstacle.js"></script>
    <script language="javascript" type="text/javascript" src="bullet.js"></script>
    <script language="javascript" type="text/javascript" src="enemy.js"></script>
    <script language="javascript" type="text/javascript" src="character.js"></script>    
    <script language="javascript" type="text/javascript" src="health.js"></script>    
    <script language="javascript" type="text/javascript" src="obstacle.js"></script>
    <script language="javascript" type="text/javascript" src="sketch.js"></script>

    <!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        canvas {
            margin-left: auto;
            margin-right: auto;
            display: block;
            margin-top: 5em;
        }
    </style>
    <title>Shooting Game - G6 Games Inc.</title>

</head>

<body>

<?php include("navigation.php"); ?>

</body>

</html>
