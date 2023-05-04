<?php
include ('header.php');

  $user_id = $_GET['user_id'];

  $delete_query = "DELETE FROM users WHERE user_id = '$user_id'";
  $profile_update = mysqli_query($np2con, $delete_query);
  $_SESSION['user_delete'] = "This user has been Deleted!";
  header('location: total-users.php', 0);
?>