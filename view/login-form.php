<?php
    require_once(__DIR__ . "/../model/config.php");

 ?>

 <h1 id="login-text">Login</h1>

 <form method="post" action="<?php echo $path . "controller/login-user.php"; ?>" id="loginForm"> 	
      <div id="username-div">
		<label for="username" id='username-text'>Username: </label>
		<input type="text" name="username" id="username-box" />
	</div>

	<div id="password-div">
		<label for="password" id="password-text">Password: </label>
		<input type="password" name="password" id="password-box" />
	</div>

	<div>
		<button type="submit" id="login-button">Submit:</button>
	</div>
 </form>

