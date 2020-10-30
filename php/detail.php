<?php require "config.php"; ?>
<?php 
	session_start();
	$user_id = $_SESSION["id"];
	$limit = 0;
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
		if ($page == "" || $page == "1") {
			$limit = 0;
		}else{
			$limit = $page - 1;
		}
	}
	if($_SESSION["role"] == "user"){
		$query = "SELECT * FROM register_houses WHERE user_id = $user_id LIMIT $limit,1";
		$sql = "SELECT * FROM register_houses WHERE user_id = $user_id";
		$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
		$count = mysqli_query($con, $sql) or die(" ".mysqli_error($con));
		$data = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($count);
		$_SESSION["house_id"] = $data["id"];
	}
	if($_SESSION["role"] == "admin"){
		$query = "SELECT * FROM register_houses LIMIT $limit,1";
		$sql = "SELECT * FROM register_houses";
		$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
		$count = mysqli_query($con, $sql) or die(" ".mysqli_error($con));
		$data = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($count);
		$_SESSION["house_id"] = $data["id"];
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../style/detail.css">
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
	<div class="main-content">
		<h1>Details of Your House</h1>
		<div class="col">
			<p><label>Owner Name: </label><?php echo $data["fullname"]; ?></p>
			<p><label>Email: </label><?php echo $data["email"]; ?></p>
			<p><label>Mobile No: </label><?php echo $data["mobile"]; ?></p>
			<p><label>Alternet Mobile No: </label><?php echo $data["altmobile"]; ?></p>
			<p><label>Rooms: </label><?php echo $data["rooms"]; ?></p>
			<p><label>Plot/House No: </label><?php echo $data["plot"]; ?></p>
			<p><label>Status: </label><?php echo $data["status"]; ?></p>
			<p><label>Town Name: </label><?php echo $data["town"]; ?></p>
			<p><label>Pin Code: </label><?php echo $data["pincode"]; ?></p>
			<p><label>District: </label><?php echo $data["district"]; ?></p>
			<p><label>State: </label><?php echo $data["state"]; ?></p>
		</div>
		<div class="col">
			<p><label>Address: </label><br>
				<textarea readonly><?php echo $data["address"]; ?></textarea>
			</p>
			<p><label>Facilities: </label><br>
				<textarea readonly><?php echo $data["facilities"]; ?></textarea>
			</p>
		</div>
		<div class="col">
			<p><label>Rent: </label><?php echo $data["rent"]; ?></p>
			<p><label>Deposit: </label><?php echo $data["deposit"]; ?></p>
			<p><label>House Image: </label><br><img src="<?php echo $data["image"]; ?>"></p>
		</div>
		<div class="btn">
			<?php for ($i=1; $i <=$rows; $i++) { ?>
			<a href="detail.php?page=<?php echo $i; ?>"><button type="button"><?php echo $i; ?></button></a>
			<?php } ?>
		</div>
	</div>
	<div class="side-btn">
		<a href="update.php"><button>Update</button></a><br>
		<?php 
		if ($_SESSION['role'] == "admin") {
			echo "<a href='../bgphp/verify.php'><button>Verify</button></a>";
		}
		?>		
	</div>
</body>
</html>
