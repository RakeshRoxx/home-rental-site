<?php require "config.php"; ?>

<?php 
	$fullname = strtoupper(mysqli_real_escape_string($con, trim($_POST['fullname'])));
	$mobileno = mysqli_real_escape_string($con, trim($_POST['mobileno']));
	$email = mysqli_real_escape_string($con, trim($_POST['email']));
	$password = mysqli_real_escape_string($con, trim($_POST['password']));
	$cpassword = mysqli_real_escape_string($con, trim($_POST['cpassword']));

	if (empty($fullname) || empty($mobileno) || empty($email) || empty($password) || empty($cpassword)) {
		header("Location:register.php?signup=empty");
        exit();
	} elseif(!preg_match('/^[a-zA-Z\s]/', $fullname)){
		header("Location:register.php?signup=fullname");
        exit();
	} elseif (!is_numeric($mobileno)) {
		header("Location:register.php?signup=mobile");
        exit();
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location:register.php?signup=email");
        exit();
	} else {
		$query = "SELECT * FROM users";
		$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
		while($user = mysqli_fetch_assoc($result)){

			if ($user['mobile'] == $mobileno) {
				header("Location:register.php?signup=mobileno");
				exit();
			}
		}
		$query = "INSERT INTO users (fullname, mobile, email, password, role) VALUES ('$fullname', '$mobileno', '$email', '$password', 'user')";
		$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
		if($result){
			header("Location:register.php?signup=done");
			exit();
		}
	}
 ?>