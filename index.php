<!DOCTYPE html>
<html>
<head>
	<title>Dom's To-Do List</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"> <!-- link to class -->
</head>
<body>
	<div class="wrap">
		<div class="task-list">
			<ul> <!-- unordered list -->
				<?php 		
					require("includes/connect.php"); /*include code from connect.php*/
				?>
			</ul>	
		</div>
		<form class="add-new-task" autocomplete="off"> <!-- make a form with class add-neew-task with no autocomplete -->
			<input type="text" name="new-task" placeholder="Add new item..."/> <!-- make a text input  -->
		</form>
	</div>
</body>
</html>