<?php 
	require "php/config.php";
	session_start();
	// echo $_SESSION['email'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Find Home</title>
	<link rel="stylesheet" type="text/css" href="style/index.css">
</head>
<body>
	<div id="main">
		<nav>
			<a href="index.php"><img src="assets/logo1.png"></a>
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php if(isset($_SESSION['email'])) {
					echo "<li><a href='php/dashboard.php'>".$_SESSION['fullname']."</a></li>";
					echo "<li><a href='php/signout.php'>Sign Out</a></li>";
				}else {
					echo "<li><a href='php/login.php'>Login</a></li>";
					echo "<li><a href='php/register.php'>Register</a></li>";
				} ?>
			</ul>
		</nav>
		<div class="text">
			<h1>Welcome to Find Homes.</h1>
			<h2>Find your home right now!</h2>
		</div>
		<div class="btn">
			<a href="php/gethome.php"><input type="submit" value="Find your Home"></a>
			<?php 
				if(isset($_SESSION['email'])) {
					echo "<a href='php/houseregister.php'><input type='submit' value='Register House'></a>";
				} else {
					echo "<a href='php/login.php'><input type='submit' value='Register House'></a>";
				}
			 ?>
		</div>
		<div class="footer">
			
		</div>
	</div>
	</body>
</html>