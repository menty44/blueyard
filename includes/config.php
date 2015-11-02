<?php
	// Establishing connection with server..
 	$connect = mysql_connect("localhost", "root", "root");

 	if (!$connect) {
 		die("could not connect").mysql_error();
 	}

 	// Selecting Database 
 	$db = mysql_select_db("jobfinds", $connect);
 	if (!$db) {
 		die("could not connect to db").mysql_error();
 	}

?>