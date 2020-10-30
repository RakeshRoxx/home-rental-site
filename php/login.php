<?php 
	require "config.php";
	if (!empty($_SESSION['email'])) {
		header("Location:dashboard.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../style/login.css">
</head>
<body>
	<nav>
		<a href="../index.php"><img src="../assets/logo1.png"></a>
		<ul>
			<li><a href="../index.php">Home</a></li>
		</ul>
	</nav>
	<div class="loginbox">
		<img src="../assets/avatar.png" class="avatar">
		<h1>Login</h1>
		<div class="error">
			<?php 
				if(isset($_GET['errmsg'])) {
					echo $_GET['errmsg'];
				}
			 ?>
		</div>
		<form method="POST" action="../bgphp/login.php">
			<p>Email</p>
			<input type="email" name="email" placeholder="Enter Email">
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password">
			<input type="submit" name="login" value="Login">
		</form>
			<a href="register.php"><input type="submit" name="register" value="Register"></a>
	</div>
</body>
</html>