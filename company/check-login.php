<?php 

if(isset($_SESSION['ejob_comp_signed_in']) AND $_SESSION['ejob_comp_signed_in'] == true)
{
}else {
echo reloader('company-login.php',100);
die();	
}

?>
