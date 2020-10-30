<?php require "config.php"; ?>
<?php
	session_start();
	if(!isset($_SESSION['email'])) {
		header("Location:login.php");
		exit();
	}
	$id = $_GET["active"];
	$user_id = $_SESSION["id"];
	// $query = "SELECT reqhomeno FROM users WHERE id = '$user_id'";
	// $result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
	// $data = mysqli_fetch_assoc($result);
	// $newno = $data["reqhomeno"];
	// echo "$newno";
	// $newno = $newno."  ".$id;
	// echo "$newno";
	$query = "UPDATE users SET reqhomeno = '$id' WHERE id = '$user_id'";
	$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Done!</title>
	<link rel="stylesheet" type="text/css" href="../style/done.css">
</head>
<body>
	<nav>
		<a href="../index.php"><img src="../assets/logo1.png"></a>
		<ul>
			<li><a href="../index.php">Home</a></li>
			<?php if(isset($_SESSION['email'])) {
				echo "<li><a href='dashboard.php'>".$_SESSION['fullname']."</a></li>";
				echo "<li><a href='signout.php'>Sign Out</a></li>";
			}else {
				echo "<li><a href='login.php'>Login</a></li>";
				echo "<li><a href='register.php'>Register</a></li>";
			} ?>
		</ul>
	</nav>
	<div class="container">
		<p class="text">
			Your Request is Accepted. <br>
			We will contact with you very soon.
		</p>
	</div>
</body>
</html>