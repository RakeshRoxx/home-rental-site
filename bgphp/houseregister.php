<?php 
 require "../php/config.php";
 if (isset($_POST['submit'])) {
	 session_start();
	 $id = $_SESSION["id"];
	 $fullname = ucwords(mysqli_real_escape_string($con, trim($_POST['fullname'])));
	 $email = mysqli_real_escape_string($con, trim($_POST['email']));
	 $mobile = $_POST['mobile'];
	 $altmobile = $_POST['altmobile'];
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
	 $state = mysqli_real_escape_string($con, trim($_POST['state']));
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

	// echo $mobile."<br>";      
	// echo $altmobile;
	 $destination = '../houseimg/'.$filename;                    
	 move_uploaded_file($filetmp, $destination);
	 $query = "INSERT INTO register_houses (user_id, fullname, email, mobile, altmobile, rooms, plot, facilities, address, status, image, rent, deposit, town, pincode, district, state, verified) VALUES ('$id', '$fullname', '$email', '$mobile', '$altmobile', '$rooms', '$plot', '$facilities', '$address', '$status', '$destination', '$rent', '$deposit', '$town', '$pincode', '$district', '$state', '0')";
	 $result = mysqli_query($con, $query) or die(" ".mysqli_error($con));
	 header("Location:../php/houseregister.php?msg=Data Submitted Successfully");
	 exit();
}

 ?>