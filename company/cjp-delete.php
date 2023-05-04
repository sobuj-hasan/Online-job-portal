<?php
 include ('header.php');

 	$cmp_jp_token = $_GET['token'];

	$delete_query = "DELETE FROM company_jp WHERE cjp_token = '$cmp_jp_token'";
	$cmp_jp_token = mysqli_query($np2con, $delete_query);
	header('location: cjp-manage.php', 0);
?>