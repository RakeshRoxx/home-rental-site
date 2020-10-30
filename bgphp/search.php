<?php require "../php/config.php"; ?>
<?php 
	if (isset($_POST['submit'])) {
		session_start();
		$value = $_POST['searchvalue'];
		// echo "$value";
		$query = "SELECT * FROM verified_houses WHERE false ";
		$range = explode("-", $value);
		$from = $range[0];
		$to = $range[1];
		$query .= " OR rent BETWEEN $from AND $to";
		// echo "$query";
		$_SESSION['query'] = $query;
		header("Location:../php/gethome.php");
		exit();
	}

 ?>