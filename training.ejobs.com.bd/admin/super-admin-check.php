<?php
 if(isset($_SESSION['ejb_signed_in']) AND $_SESSION['ejb_signed_in'] == true)
{		
if($di_stf_id == 'Ejob-Admin'){
include_once('admin-functions.php');	
}else {
echo ntf('you do not have permission to access this page',0);
echo reloader('admin/index.php',1);
DIE();
EXIT();
}
}
else{
//header();
echo reloader('admin/login.php',1);
die();
}
?>
<?php
$querybkp = mysqli_query($np2con,"SELECT sb_id FROM sql_bkp where sb_day = '".$day."' AND sb_month = '".$month."' AND sb_year = '".$year."'");	
$bkpcnt = mysqli_num_rows($querybkp);
if($bkpcnt < 1){
//Call the core function
$tables = '*';
backup_tables($dbhost ='auto', $dbuser ='auto', $dbpass ='auto', $dbname ='auto', $tables);
}else {
//echo ntf("Already Done!",1);	
}
?>