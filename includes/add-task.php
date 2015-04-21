<?php
	$task = strip_tags($_POST['task']); /*adding variables, task*/
	$date = date('Y-m-d'); /*date*/
	$time = date('H:i:s'); /*and time*/

	include('connect.php'); /*connect to database*/
	
	$mysqli = new mysqli('localhost', 'root', 'root', 'tasks'); /*store all this info in $mysqli*/
	$mysqli->query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time')"); /*query this info and insert it into the tasks table*/

	$query = "SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'" /*actually query all the tasks*/
?>