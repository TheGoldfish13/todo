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
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
	add_task(); /*calling the add_task function*/

	function add_task() {
		$('.add-new-task').submit(function() {
			var new_task =  $('add-new-task input[name=new-task]').val(); /*make the variable new_task*/

			if(new_task != '') {
				$.post('includes/add-task.php', {task: new_task}, function(data){ /*get the form submitted from post and send it to add-task.php*/
					$('add-new-task input[name=new-task]').val();
						$(data.appendTo('task-list ul').hide().fadeIn();
				});
			};
			return false;
		});
	}

	$('.delete-button').click(function(){ /*when you click on something with class delete-button*/
		var current_element = $(this); /*make these variables*/
		var task_id = $(this).attr('id')

		$.post('includes/delete-task.php', {id: task_id}, function(){ 
		current_element.parent().fadeOut("fast", function(){
			$(this).remove();
		});
	});
});	
</script>
</html>