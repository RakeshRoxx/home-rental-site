<?php require "../php/config.php"; ?>
<?php 
	session_start();
	$userid = $_GET['users'];
	$houseid = $_GET['house'];
	// echo "$userid";
	// echo "$houseid";
	$query = "INSERT booked_houses (`house_id`, `fullname`, `email`, `mobile`, `altmobile`, `rooms`, `plot`, `facilities`, `address`, `status`, `image`, `rent`, `deposit`, `town`, `pincode`, `district`, `state`) SELECT `id`,`fullname`, `email`, `mobile`, `altmobile`, `rooms`, `plot`, `facilities`, `address`, `status`, `image`, `rent`, `deposit`, `town`, `pincode`, `district`, `state` FROM verified_houses WHERE id = $houseid";
	mysqli_query($con, $query) or die (" ".mysqli_error($con));
	$query = "UPDATE booked_houses SET user_id = $userid WHERE house_id = $houseid";
	mysqli_query($con, $query) or die (" ".mysqli_error($con));
	$query = "DELETE FROM `verified_houses` WHERE id = $houseid";
	mysqli_query($con, $query) or die (" ".mysqli_error($con));
	header("Location:../php/userdetail.php?msg=done");
	exit();
	// $data = mysqli_fetch_assoc($result);
	// echo $data['id'];
 ?>