<?php require "config.php"; ?>
<?php 
	session_start();
	$house_id = $_SESSION["house_id"];
	echo $house_id;
	$query = "SELECT * FROM register_houses WHERE id = $house_id";
	$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
	$data = mysqli_fetch_assoc($result);
	echo $data["id"];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../style/houseregister.css">
</head>
<body>
		<nav class="header">
			<a href="#"><img src="../assets/logo1.png"></a>
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
		<form method="POST" onsubmit="return validation()"  action="../bgphp/update.php" enctype="multipart/form-data">
			<div class="col">
				<p><label>Owner Name: </label><br>
				<input type="text" name="fullname" id="fullname" placeholder="Full Name" autocomplete="off" value="<?php echo $data['fullname']; ?>"></p>
				<p><label>Email: </label><br>
				<input type="email" name="email" id="email" placeholder="example@gmail.com" autocomplete="off" value="<?php echo $data['email']; ?>"></p>
				<p><label>Mobile No: </label><br>
				<input type="text" name="mobile" id="mobile" placeholder="10 Digit Mobile No" autocomplete="off" value="<?php echo $data['mobile']; ?>"></p>
				<p><label>Alternate Mobile No: </label><br>
				<input type="text" name="altmobile" id="altmobile" placeholder="10 Digit Mobile No" autocomplete="off" value="<?php echo $data['altmobile']; ?>"></p>
				<p><label>Rooms: </label><br>
				<input type="text" name="rooms" id="rooms" placeholder="1BHK,2BHK..." autocomplete="off" required value="<?php echo $data['rooms']; ?>"></p>
				<p><label>Plot/House 
				Number: </label><br>
				<input type="text" name="plot" id="plot" autocomplete="off" value="<?php echo $data['plot']; ?>"></p>
			</div>
			<div class="col">
				<p><label>Facilities: </label><br>
				<textarea name="facilities" id="facilities" placeholder="Write about your house(250 Words)."><?php echo $data['facilities']; ?></textarea></p>
				<p><label>Address: </label><br>
				<textarea name="address" id="address" placeholder="Write full Address(250 Words)."> <?php echo $data['address'];?> </textarea></p>
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
				<input type="text" name="rent" id="rent" placeholder="Per Month" autocomplete="off" required value="<?php echo $data['rent']; ?>"></p>
				<p><label>Deposit: </label><br>
				<input type="text" name="deposit" id="deposit" autocomplete="off" required value="<?php echo $data['deposit']; ?>"></p>
				<p><label>Town Name: </label><br>
				<input type="text" name="town" id="town" autocomplete="off" required value="<?php echo $data['town']; ?>"></p>
				<p><label>Pin Code: </label><br>
				<input type="text" name="pincode" id="pincode" autocomplete="off" required value="<?php echo $data['pincode']; ?>"></p>
				<p><label>District: </label><br>
				<input type="text" name="district" id="district" autocomplete="off" required value="<?php echo $data['district']; ?>"></p>
				<p><label>State: </label><br>
				<input type="text" name="state" id="state" autocomplete="off" required value="<?php echo $data['state']; ?>"></p>
			</div>
			<button type="submit" value="submit" name="submit">Update</button>
		</form>
	</div>
	</div>
	<script type="text/javascript" src="../js/registration.js"></script>
</body>
</html>
