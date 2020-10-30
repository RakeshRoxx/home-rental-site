<?php require "../php/config.php" ?>
<?php 
	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
		$result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
		$data = mysqli_fetch_assoc($result);
		if($data == false) {
			$errmsg = "**Invalid Login Id.";
			header("Location:../php/login.php?errmsg=".$errmsg);
		} else {
			session_start();
			$_SESSION['id'] = $data['id'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['fullname'] = $data['fullname'];
			$_SESSION['role'] = $data['role'];
			$_SESSION['username'] = $data['username'];
			header('Location: ../index.php');
			exit();
		}
	}
 ?>