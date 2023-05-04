<?php 
if(isset($_SESSION['ejob_signed_in']) AND $_SESSION['ejob_signed_in'] == true)
{
	
}else {
echo reloader('login.php',100);
die();	
}

?>
