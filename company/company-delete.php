<?php
 include ('header.php');

 	$ac_id = $_GET['ac_id'];

	$delete_query = "DELETE FROM all_company WHERE ac_id = '$ac_id'";
	$ac_id = mysqli_query($np2con, $delete_query);
	$_SESSION['delete_company'] = "A Company Deleted Successfully!";
	header('location: manage-company.php');

?>