<?php require "config.php"; ?>
<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../style/houseregister.css">
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
	</div>
	<!-- registration form -->
	<div class="main-content">
		<h1>Register Your House</h1>
		<?php 
			if (isset($_GET['msg'])) {
				$msg = $_GET['msg'];
				echo '<h4 id="error" style="text-align: center; color: red;">'.$msg.'</h4>';
			}else{
				echo '<h4 id="error" style="text-align: center; color: red;"></h4>';
			}
		 ?>



		<!-- <h4 id="error" style="text-align: center; color: red;"></h4> -->
		<form method="POST" onsubmit="return validation()"  action="../bgphp/houseregister.php" enctype="multipart/form-data">
			<div class="col">
				<p><label>Owner Name: </label><br>
				<input type="text" name="fullname" id="fullname" placeholder="Full Name" autocomplete="off"></p>
				<p><label>Email: </label><br>
				<input type="email" name="email" id="email" placeholder="example@gmail.com" autocomplete="off"></p>
				<p><label>Mobile No: </label><br>
				<input type="text" name="mobile" id="mobile" placeholder="10 Digit Mobile No" autocomplete="off"></p>
				<p><label>Alternate Mobile No: </label><br>
				<input type="text" name="altmobile" id="altmobile" placeholder="10 Digit Mobile No" autocomplete="off"></p>
				<p><label>Rooms: </label><br>
				<input type="text" name="rooms" id="rooms" placeholder="1BHK,2BHK..." autocomplete="off" required></p>
				<p><label>Plot/House 
				Number: </label><br>
				<input type="text" name="plot" id="plot" autocomplete="off"></p>
			</div>
			<div class="col">
				<p><label>Facilities: </label><br>
				<textarea name="facilities" id="facilities" placeholder="Write about your house(250 Words)."></textarea></p>
				<p><label>Address: </label><br>
				<textarea name="address" id="address" placeholder="Write full Address(250 Words)."></textarea></p>
				<p><label>Vacant/Occupied: </label><br>
				<select class="select" name="status" id="status">
					<option value="Vacant">Vacant</option>
					<option value="Occupied">Occupied</option>
				</select></p>
				<p><label>Image: (less then 2MB) </label><br>
				<input type="file" name="image" id="image"></p>
			</div>
			<div class="col">
				<p><label>Rent: </label><br>
				<input type="text" name="rent" id="rent" placeholder="Per Month" autocomplete="off" required></p>
				<p><label>Deposit: </label><br>
				<input type="text" name="deposit" id="deposit" autocomplete="off" required></p>
				<p><label>Town Name: </label><br>
				<input type="text" name="town" id="town" autocomplete="off" required></p>
				<p><label>Pin Code: </label><br>
				<input type="text" name="pincode" id="pincode" autocomplete="off" required></p>
				<p><label>District: </label><br>
				<input type="text" name="district" id="district" autocomplete="off" required></p>
				<p><label>State: </label><br>
				<input type="text" name="state" id="state" autocomplete="off" required></p>
			</div>
			<button type="submit" value="submit" name="submit">Register</button>
		</form>
	</div>
	</div>
	<script type="text/javascript" src="../js/registration.js"></script>
</body>
</html>
