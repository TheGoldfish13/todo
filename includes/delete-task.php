<?php 
	$task_is = strip_tags($_POST['id']);
	require('connect.php'); /*connect to database*/
	$mysqli = new mysqli('localhost', 'root', 'root', 'todo');  /*store all this info in $mysqli*/

	if($result = $mysqli->query("DELETE FROM tasks WHERE id='task_id'")) { /*if result = mysqli querey then..*/

	}
 ?>