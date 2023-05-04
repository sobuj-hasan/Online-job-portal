<?php
include ('header.php');

  $ac_id = $_GET['ac_id'];

  $delete_query = "DELETE FROM all_company WHERE ac_id = '$ac_id'";
  $profile_update = mysqli_query($np2con, $delete_query);
  $_SESSION['company_delete'] = "This Company has been Deleted!";
  header('location: company-management.php', 0);
?>