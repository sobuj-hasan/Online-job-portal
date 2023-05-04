<?php
 if(isset($_SESSION['ejb_signed_in']) AND $_SESSION['ejb_signed_in'] == true)
{		}
else{
//header();
echo reloader('admin/login.php',10);
die();
}
?>
