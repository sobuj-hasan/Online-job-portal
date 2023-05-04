<?php
include ('header.php');

  $jp_id = $_GET['jp_id'];

  $delete_query = "DELETE FROM company_jp WHERE id = '$jp_id'";
  $profile_update = mysqli_query($np2con, $delete_query);
  $_SESSION['job_post_delete'] = "This Job has been Successfully Deleted!";
  header('location: job-management.php', 0);
?>