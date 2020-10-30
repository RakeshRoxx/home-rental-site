<?php 
 require "../php/config.php";
 session_start();
 $house_id = $_SESSION["house_id"];
 $query = "UPDATE register_houses SET verified = '1' WHERE id = $house_id";
 $fire = mysqli_query($con, $query) or die(" ".mysqli_error($con));
 // echo "Verified";
 $send = "INSERT verified_houses SELECT * FROM register_houses WHERE id = $house_id";
 $fire = mysqli_query($con, $send) or die(" ".mysqli_error($con));
 // echo "Data Send";
 header('Location:../php/detail.php');
 exit();
 ?>