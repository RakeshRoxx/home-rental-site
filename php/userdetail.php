<?php require "config.php"; session_start();?>

<?php	
	$query = "SELECT * FROM users";
	$fire = mysqli_query($con,$query) or die("can not fetch data".mysqli_error($con));
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Registered Students</title>
	<link rel="stylesheet" type="text/css" href="../style/userdetail.css">
</head>
<body>
	<nav class="header">
		<a href="../index.php"><img src="../assets/logo1.png"></a>
		<ul>
			<li><a href="../index.php">Home</a></li>

			<?php if(!empty($_SESSION['email'])){
				echo "<li><a href='signout.php'>".$_SESSION['fullname']." (Sign Out)</a></li>"; 
			} else{ echo "<li><a href='register.php'>Register</a></li>";} ?>				
		</ul>
	</nav>
	<div class="side-nav">
		<nav>
			<ul>
				<li>
					<a href="dashboard.php">
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
	<div class="table">
	<h1>User Details</h1>
		<table>
			<tr>
				<th>ID</th>
				<th>User Name</th>
				<th>Mobile Number</th>
				<th>Email</th>
				<th>Requested Home</th>
				<th>Booking Button</th>
			</tr>
	<?php 
		if (mysqli_num_rows($fire)>0) {
			while($users = mysqli_fetch_assoc($fire)) { ?>
			<tr>
				<td><?php echo $users["id"]; ?></td>
				<td><?php echo $users["fullname"]; ?></td>
				<td><?php echo $users["mobile"]; ?></td>
				<td><?php echo $users["email"]; ?></td>
				<td><?php echo $users["reqhomeno"]; ?></td>
				<td><a href="../bgphp/booking.php?users=<?php echo $users['id'] ?>&house=<?php echo $users['reqhomeno'] ?>"><button>Book</button></a></td>
			</tr>
		<?php 
			} 
		}
		?>
			
		</table>
		</div>
</body>
</html>