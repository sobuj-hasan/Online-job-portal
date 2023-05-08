<?php
    $auth_user_id = $_SESSION['snm_ejob_user_id'];
    $select_query = "SELECT * FROM user_cv WHERE ucv_user_id = '$auth_user_id'";
    $cv_id_uniq = mysqli_fetch_assoc(mysqli_query($np2con, $select_query))['ucv_id'];
?>
<ul class="card pb-5 pt-4 pl-3">

    <h5 class="mb-0 text-gray"><i class="fa fa-bars"></i><span class="menu-title text-dark"> Menu</span></h5>
    <li class="pt-2 pb-2"><a class="text-gray pl-1 h6" href="index.php"><i class="fa fa-home fa-lg text-success pr-1"></i> Home </a></li>
    <li class="pt-2 pb-2"><a class="text-gray pl-1 h6" href="profile.php"><i class="fa fa-user-md fa-lg text-success pr-1"></i> profile</a></li>
    <li class="pt-2 pb-2"><a class="text-gray pl-1 h6" href="search-job.php"><i class="fa fa-search-plus fa-lg text-success pr-1"></i> Search Job</a></li>
    <li class="pt-2 pb-2"><a class="text-gray pl-1 h6" href="add-cv.php"><i class="fa fa-plus-square fa-lg text-success pr-1"></i> Add Resume</a></li>
    <li class="pt-2 pb-2"><a class="text-gray pl-1 h6" href="add-cv.php"><i class="fa fa-pencil-square fa-lg text-success pr-1"></i> Edit Resume</a></li>
    <li class="pt-2 pb-2"><a class="text-gray pl-1 h6" href="my-cv-view.php?personal_cv_id=<?=$cv_id_uniq;?>"><i class="fa fa-eye fa-lg text-success pr-1"></i> View Resume</a></li>
    <li class="pt-2 pb-2"><a class="text-gray pl-1 h6" href="applied-job.php"><i class="fa fa-hdd-o fa-lg text-success pr-1"></i> Applied Jobs</a></li>
    <li class="pt-2 pb-2"><a class="text-gray pl-1 h6" href="face-interview.php"><i class="fa fa-meetup fa-lg text-success pr-1"></i> Call Interview</a></li>
</ul>