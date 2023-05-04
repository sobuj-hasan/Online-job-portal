<?php

    include ('header.php');
    $auth_user_id = $_SESSION['snm_ejob_user_id'];

    $select_query = "SELECT * FROM user_cv WHERE ucv_user_id = '$auth_user_id'";
    $ucv_picture = mysqli_fetch_assoc(mysqli_query($np2con, $select_query))['ucv_picture'];

    if($ucv_picture != "default.png"){
        unlink("images/profile_image/" . $ucv_picture);
        header('location: ucv-photography.php');
    }else{
        header('location: ucv-photography.php');
    }
    $update_query = "UPDATE user_cv SET ucv_picture = 'default.png' WHERE ucv_user_id = '$auth_user_id'";
    mysqli_query($np2con, $update_query);

?>