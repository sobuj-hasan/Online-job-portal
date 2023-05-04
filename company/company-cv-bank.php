<?php
include ('header.php');

  $cmp_author_id = $_SESSION['snm_ejob_cmp_id'];

  // all job post show query 
  $select_query = "SELECT * FROM applied_job INNER JOIN user_cv on user_cv.ucv_id = applied_job.id";
  $droped_cv_info = mysqli_query($np2con, $select_query);

?>
</head>
<body>
  <div class="container-scroller">
    <?php include ('nav.php');?>
    <!-- partial -->

    

    <div class="container-fluid page-body-wrapper">
      <div style="border: 2px solid white; margin-bottom: 20px;" class="main-panel bg-light">

        <!--inner heading start-->
        <div class="inner-heading">
          <div class="container">
            <h3 class="padding-left: 20px;">Your <span>Submitted Resume</h3>
          </div>
        </div>
        <!--inner heading end-->

        <!--Latest Resumes Start-->
        <div class="row">
          <div class="col-md-9 col-sm-8">
            <ul>

              <?php
                foreach ($droped_cv_info as $single_droped_cv) {
                  ?>
                  <li>
                    <div class="listWrpService featured-wrap candidate">
                      <div class="row">
                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <div class="listImg">
                            <img src="<?php echo http://localhost/online-job-portal ?>/dashboard/images/profile_image/<?=$single_droped_cv['ucv_picture']?>" alt="img not found">
                          </div>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-12">
                          <div class="row">
                            <div class="col-md-8">
                              <h3><a href="<?=http://localhost/online-job-portal?>/cv-view.php?ucv_id=<?=$single_droped_cv['ucv_id']?>"><?=$single_droped_cv['ucv_user_name']?></a></h3>
                              <div class="designation"><?=$single_droped_cv['ucv_edu_achieve_one']?></div>
                              <ul class="featureInfo">
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$single_droped_cv['ucv_present_address']?></li>
                                <li>portfolio: <a href="<?=$single_droped_cv['ucv_portfolio_link']?>" target="blank"><?=$single_droped_cv['ucv_portfolio_link']?></a></li>
                              </ul>
                              <div class="cantPrice"> Job Title</div>
                              <ul class="cantTags">
                                <li><a href="#"><?=$single_droped_cv['ucv_skill_one']?>,</a></li>
                                <li><a href="#"><?=$single_droped_cv['ucv_skill_two']?>,</a></li>
                                <li><a href="#"><?=$single_droped_cv['ucv_skill_three']?>,</a></li>
                                <li><a href="#"><?=$single_droped_cv['ucv_skill_four']?>,</a></li>
                                <li><a href="#"><?=$single_droped_cv['ucv_skill_five']?>,</a></li>
                                <li><a href="#"><?=$single_droped_cv['ucv_skill_six']?>,</a></li>
                              </ul>
                            </div>
                            <div class="col-md-4">
                              <ul>
                                <li class="click-btn apply"><a href="<?=http://localhost/online-job-portal?>/cv-view.php?ucv_id=<?=$single_droped_cv['ucv_id']?>"><i class="fa fa-file-text-o" aria-hidden="true"></i> Resume</a></li>
                                <li class="click-btn apply cont"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a></li>
                                <li class="click-btn apply"><a href="#">Bookmark Resume</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <?php
                }
                if($single_droped_cv == ""){
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="ml-5 mt-5">Nothig to show Submitted CV !</h5>
                        </div>
                    </div>
                <?php
                }
              ?>

            </ul>
            <div class="pagiWrap">
              <div class="row">
                <!--<div class="col-md-4 col-sm-6">-->
                <!--  <div class="showreslt">Showing 1-10</div>-->
                <!--</div>-->
                <!--<div class="col-md-8 col-sm-6">-->
                <!--  <ul class="pagination">-->
                <!--    <li class="active"><a href="#">1</a></li>-->
                <!--    <li><a href="#">2</a></li>-->
                <!--    <li><a href="#">3</a></li>-->
                <!--    <li><a href="#">4</a></li>-->
                <!--    <li><a href="#">5</a></li>-->
                <!--    <li><a href="#">6</a></li>-->
                <!--    <li><a href="#">7</a></li>-->
                <!--    <li><a href="#">8</a></li>-->
                <!--  </ul>-->
                <!--</div>-->
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-4">
            <h3 class="mt-3">Related Resume</h3>
            <ul class="related-resumes">
              <?php
                foreach ($droped_cv_info as $single_droped_cv) {
                  ?>
                    <li>
                      <div class="listWrpService featured-wrap candidate">
                        <div class="row resumes">
                          <div class="col-md-3 col-sm-3 col-xs-2">
                            <div class="listImg">
                              <img src="<?php echo http://localhost/online-job-portal ?>/dashboard/images/profile_image/<?=$single_droped_cv['ucv_picture']?>" alt="img not found">
                            </div>
                          </div>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <div class="resumeName"><a href="<?=http://localhost/online-job-portal?>/cv-view.php?ucv_id=<?=$single_droped_cv['ucv_id']?>"><?=$single_droped_cv['ucv_user_name']?></a></div>
                            <div class="desig"><i class="fa fa-tags" aria-hidden="true"></i> <?=$single_droped_cv['ucv_edu_achieve_one']?></div>
                            <div class="desig"><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$single_droped_cv['ucv_present_address']?></div>
                          </div>
                        </div>
                      </div>
                    </li>
                  <?php
                }
                if($single_droped_cv == ""){
                ?>
                    <p class="ml-2 mt-2 bg-light">Nothig to show Submitted CV !</p>
                <?php
                }
              ?>

            </ul>
          </div>
        </div>
        <!--Latest Resumes End--> 
       
        <div class="row">

        </div>
      </div>
    </div>
  </div>
</body>
<?php include ('footer.php');?>