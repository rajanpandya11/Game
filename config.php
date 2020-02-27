<?php
	//Connect to db

$con = mysql_connect(localhost, "group6", "easypass1");

        //Verify cnxn
        if(!$con)
        {
                echo "Failed to connect to MySQL: " . mysql_connect_error();
        }

        mysql_select_db("group6");
?>
