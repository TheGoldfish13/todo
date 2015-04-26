<!DOCTYPE html>
<html>
<head>
	<title> Dom's To-Do List </title>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="wrap"> 
		<div class="task-list" id="task-box">
			<ul>
				<?php require("includes/connect.php"); /*include code from connect.php*/
				$mysqli = new mysqli('localhost', 'root', 'root', 'todo'); /*make mysqli variable with this info into thetable todo*/
				$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC"; /*$query selects from the table todo and order by date in asdending order */
				if ($result = $mysqli->query($query)) { /*if the result is equal to the queried info (from php)*/
					$numrows = $result->num_rows; /*$numrows is the result of num_rows (from php)*/
					if ($numrows>0) { /*if $numrows is greater than 0*/
						while($row = $result->fetch_assoc()){ /*while this is true*/
							$task_id = $row['id'];
							$task_name = $row['task'];
							echo '<li> 
							<span>'. $task_name . '</span>
							<img id="'. $task_id . '" class="delete-button" width="10px" src="images/close.svg"/>
							</li>';
						}
					}
				}
				?>
			</ul>
		</div>
		<form class="add-new-task" autocomplete="off"> <!-- make a form with class add-neew-task with no autocomplete -->
			<input type="text" name="new-task" id="item-box" placeholder="Add new item..."/> <!-- make a text input  -->
		</form>
	</div>
</body>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
	add_task(); //calling the add task function
	function add_task(){
		$('.add-new-task').submit(function() {
			var new_task = $('.add-new-task input[name=new-task]').val(); /*make the variable new_task*/
	
			if(new_task != '') {
				$.post('Includes/add-task.php', {task: new_task}, function(data) { /*get the form submitted from post and send it to add-task.php*/
					$('add-new-task input[name=new-task]').val(); 
						$(data).appendTo('.task-list ul').hide().fadeIn();
				});
			}
			return false;
		});
	}
	$('.delete-button').click(function(){ /*when you click on something with class delete-button*/
		var current_element = $(this); /*make these variables*/
		var task_id = $(this).attr('id');
		
		$.post('includes/delete-task.php', {id: task_id}, function(){
			current_element.parent().fadeOut("fast", function(){
			$(this).remove();
			});
		});
	});		
</script>

</html>