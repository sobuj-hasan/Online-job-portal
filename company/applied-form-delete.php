<?php
 include ('header.php');

 	$apply_id = $_GET['apply_id'];

	$delete_query = "DELETE FROM `guest_apply` WHERE id = '$apply_id'";
	$apply_id = mysqli_query($np2con, $delete_query);
	$_SESSION['delete_applied_form'] = "This applied info Deleted Successfully!";
	header('location: applied-form.php');
?>