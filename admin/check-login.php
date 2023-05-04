<?php 


if(isset($_SESSION['ejob_signed_in']) AND $_SESSION['ejob_signed_in'] == true)
{
	// admin checking start
	$auth_user_id = $_SESSION['snm_ejob_user_id'];
	$select_query = "SELECT user_level FROM users WHERE user_id = '$auth_user_id'";
	$admin_check = mysqli_fetch_assoc(mysqli_query($np2con,$select_query));
	$author_type = $admin_check['user_level'];
	if($author_type == '1'){
	
	}else{
	echo reloader('login.php',100);
	die();
	}
	// admin checking End
	
}else {
echo reloader('login.php',100);
die();
}

?>
