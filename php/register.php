<?php session_start(); ?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>Registration</title>
 	<link rel="stylesheet" type="text/css" href="../style/register.css">
 </head>
 <body>
 	<nav>
		<a href="../index.php"><img src="../assets/logo1.png"></a>
		<ul>
			<li><a href="../index.php">Home</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
	</nav>
	<div class="main-form">
		<h1>Register</h1>
		<div class="error" id="error">
		<?php 
			if(isset($_GET['signup'])){
				$error = $_GET['signup'];
				if($error == "empty"){echo "**You did not filled all the fields!";}
				if($error == "fullname"){echo "**Special characters not allowed in Name";}
				if($error == "email"){echo "**You enter a invalid email address!";}
				if($error == "mobileno"){echo "**Mobile number is already used!";}
				if($error == "usernamechar"){echo "**Special characters not allowed in Username!";}
				if($error == "mobile"){echo "**Special characters not allowed in Mobile!";}
				if($error == "done"){echo "**You are Registered!";}
			}
		 ?>
		 </div>
		<form method="POST" onsubmit="return validate()" action="registration.php">
			<label for="fullname">Full Name</label>
			<input type="text" name="fullname" id="fullname" placeholder="Enter Full Name Special Char Not Allowed!">
			<label for="mobileno">Mobile Number</label>
			<input type="text" name="mobileno" id="mobile" placeholder="Enter 10 Digit Mobile Number">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" placeholder="Enter Email">
			<label for="password">Password</label><span id="message"></span>
			<input type="password" name="password" id="password" oninput="return checkPass()" placeholder="Enter Password">
			<label for="cpassword">Confirm Password</label><span id="confirmmsg"></span>
			<input type="password" name="cpassword" id="confirmpassword" oninput="testPassword()" placeholder="Confirm Password">
			<div class="btn">
				<button type="submit" value="submit" name="submit">Register</button>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="../js/registration.js"></script>
 </body>
 </html>