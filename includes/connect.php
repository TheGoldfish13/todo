<?php
	$mysqli = new mysqli('localhost', 'root', 'root', 'todo'); /*localhost is what you're connecting to, root is the username and password and todo is the database*/
	if($mysqli->connect_error) { /*if theres a connection error than it will die and have this message*/
		die('Connect Error (' . $mysqli->connect_errno . ')'
			. $mysqli->connect_error);
	}
	else{ /*other wise echo that the connection was made*/
		//echo "Connection made";
	}
	$mysqli->close();
?>