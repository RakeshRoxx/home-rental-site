<?php 
 require "../php/config.php";
 if (isset($_POST['submit'])) {
	 session_start();
	 $house_id = $_SESSION["house_id"];
	 $fullname = ucwords(mysqli_real_escape_string($con, trim($_POST['fullname'])));
	 $email = mysqli_real_escape_string($con, trim($_POST['email']));
	 $mobile = mysqli_real_escape_string($con, trim($_POST['mobile']));
	 $altmobile = mysqli_real_escape_string($con, trim($_POST['altmobile']));
	 $rooms = mysqli_real_escape_string($con, trim($_POST['rooms']));
	 $plot = mysqli_real_escape_string($con, trim($_POST['plot']));
	 $facilities = mysqli_real_escape_string($con, trim($_POST['facilities']));
	 $address = mysqli_real_escape_string($con, trim($_POST['address']));
	 $status = $_POST['status'];
	 $rent = mysqli_real_escape_string($con, trim($_POST['rent']));
	 $deposit = mysqli_real_escape_string($con, trim($_POST['deposit']));
	 $town = mysqli_real_escape_string($con, trim($_POST['town']));
	 $pincode = mysqli_real_escape_string($con, trim($_POST['pincode']));
	 $district = mysqli_real_escape_string($con, trim($_POST['district']));
	 $state = mysqli_real_escape_string($con, trim($_POST['status']));
	 $image = $_FILES['image'];
	 $filename = $image['name'];
	 $fileerror = $image['error'];
	 $filetmp = $image['tmp_name'];
	 $filesize = $image['size'];
	if($filesize >= 2097152) {
		header("Location:../php/houseregister.php?msg=Image is too big.");
		exit();      	
	}
	if($fileerror != 0){
		header("Location:../php/houseregister.php?msg=Error in the Image.");
		exit();
	}             
	 $destination = '../houseimg/'.$filename;                    
	 move_uploaded_file($filetmp, $destination);
	 $query = "UPDATE register_houses SET fullname = '$fullname', email = '$email', mobile = '$mobile', altmobile = '$altmobile', rooms = '$rooms', plot = '$rooms', facilities = '$facilities', address = '$address', status = '$status', image = '$destination', rent = '$rent', deposit = '$deposit', town = '$town', pincode = '$pincode', district = '$district', state = '$state' WHERE id = $house_id";
	 $result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
	 header("Location:../php/houseregister.php?msg=Data Updated Successfully");
	 exit();
}
?>




