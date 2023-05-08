<?php 
ob_start();
session_start();

$np2con = new mysqli('localhost', 'root', '', 'online_job_portal_db');

if($np2con->connect_errno > 0){
die('Unable to connect to database ['. $np2con->connect_error .']');
exit();
}
$np2con->set_charset('utf8');

$site_name = 'Online job portal';
////////////////////////////
$ctime = date("Y-m-d H:i:s");
$day = date('d');
$year = date('Y');
$month =  date('m');
include('functions.php');

function getRandomWord($len = 10) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}


?>