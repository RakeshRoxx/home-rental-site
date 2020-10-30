<?php require "config.php"; ?>
<?php
	session_start();
	if($_SESSION["role"] == "user"){
		$id = $_SESSION["id"];
		$query = "SELECT COUNT(*) AS total FROM register_houses WHERE user_id = $id";
		$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
		$data1 = mysqli_fetch_assoc($result);
	}
	if($_SESSION["role"] == "admin"){
		$query = "SELECT COUNT(*) AS total FROM register_houses";
		$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
		$data1 = mysqli_fetch_assoc($result);
		$query = "SELECT COUNT(*) AS total FROM verified_houses";
		$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
		$data2 = mysqli_fetch_assoc($result);
		$query = "SELECT COUNT(*) AS total FROM booked_houses";
		$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
		$data3 = mysqli_fetch_assoc($result);
	}
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../style/dashboard.css">
</head>
<body>
		<nav class="header">
			<a href="../index.php"><img src="../assets/logo1.png"></a>
			<ul>
				<li><a href="../index.php">Home</a></li>

				<?php if($_SESSION['role'] == "admin"){
					echo "<li><a href='signout.php'>Admin (Sign Out)</a></li>"; 
				} elseif ($_SESSION['role'] == "user") {
					echo "<li><a href='signout.php'>".$_SESSION['fullname']." (Sign Out)</a></li>"; 
				} else{ echo "<li><a href='register.php'>Register</a></li>";} ?>				
			</ul>
		</nav>
		<div class="side-nav">
		<nav>
			<ul>
				<li>
					<a href="../index.php">
						<span>Home</span>
					</a>
				</li>
				<li>
					<a href="houseregister.php">
						<span>Register House</span>
					</a>
				</li>
				<li>
					<a href="detail.php">
						<span>Details/Update</span>
					</a>
				</li>
				<?php if($_SESSION['role'] == "admin"){
					echo "<li><a href='userdetail.php'><span>User Details</span></a></li>";
					echo "<li><a href='bookedhouse.php'><span>Booked Houses</span></a></li>";
				} ?>
			</ul>
		</nav>
	</div>
	<div class="main-content">		
		
		<?php 
		if($_SESSION["role"] == "admin"){
			echo "<div class='box'><a href='detail.php'>Registered Houses: ".$data1['total']."</a></div>";
			echo "<div class='box'>Verified Houses: ".$data2['total']."</div>";
			echo "<div class='box'>Booked Houses: ".$data3['total']."</div>";
		}
		if($_SESSION["role"] == "user"){
			echo "<div class='box'><a href='detail.php'>Registered Houses: ".$data1['total']."</a></div>";
		}
		?>
	</div>
</body>
</html>