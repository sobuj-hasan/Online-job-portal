<?php 
include('header.php');
$page = "joblisting";

  // Total CV count query
  $select_query = "SELECT * FROM user_cv ";
  $cv_info = mysqli_query($np2con, $select_query);
  // Rendom number for Total CV, Job sekker
  $now = time();
  $your_date = strtotime("2021-01-15");
  $datediff = $now - $your_date;
  $dd =  round($datediff / (60 * 60 * 24));
  $renge_cv = $dd*50+date('H');

  // pagination code start
   if(isset($_GET['page'])){
    $page = $_GET['page'];
   }
   else{
    $page = 1;
   }

   $num_per_page = 10;
   $start_from = ($page - 1)*10;

   $select_query = "SELECT * FROM user_cv ORDER BY ucv_id DESC LIMIT $start_from,$num_per_page";
   $pagi_info = mysqli_query($np2con, $select_query);
   // pagination code End
?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>Latest Resumes</h3>
  </div>
</div>
<!--inner heading end--> 

<!--Inner Content start-->
<div class="inner-content loginWrp resumeWrp">
  <div class="container"> 
    
    <!--Latest Resumes Start-->
    <div class="row">
      <div class="col-md-9 col-sm-8">
        <div class="heading-title">All Resumes <span class="h3"> (<?php echo $cv_info->num_rows + $renge_cv; ?>)</span></div>
        <ul>

          <?php
            foreach ($pagi_info as $cjp_single_info) {
              ?>
              <li>
                <div class="listWrpService featured-wrap candidate">
                  <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-12">
                      <div class="listImg">
                        <img src="dashboard/images/profile_image/<?=$cjp_single_info['ucv_picture']?>" alt="">
                      </div>
                    </div>
                    <div class="col-md-10 col-sm-9 col-xs-12">
                      <div class="row">
                        <div class="col-md-8">
                          <h3><a href="cv-view.php?ucv_id=<?=$cjp_single_info['ucv_id']?>"><?=$cjp_single_info['ucv_user_name']?></a></h3>
                          <ul class="featureInfo">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$cjp_single_info['ucv_present_address']?></li>
                            <?php 
                              if ($cjp_single_info['ucv_portfolio_link']) {
                                ?>
                                <li><strong>Portfolio:</strong> <a href="<?=$cjp_single_info['ucv_portfolio_link']?>" target="blank"><?=$cjp_single_info['ucv_portfolio_link']?></a></li>  
                                <?php
                              }
                            ?>
                          </ul>
                          <div class="">
                            <h6><strong><?=$cjp_single_info['ucv_title']?></strong></h6>
                          </div>
                          <?php
                            if ($cjp_single_info['ucv_skill_one']) {
                              ?>
                              <ul class="cantTags">
                                <li><a href=""><?=$cjp_single_info['ucv_skill_one']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_two']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_three']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_four']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_five']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_six']?></a></li>
                              </ul>
                              <?php
                            }elseif ($cjp_single_info['ucv_skill_two']) {
                              ?>
                              <ul class="cantTags">
                                <li><a href=""><?=$cjp_single_info['ucv_skill_one']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_two']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_three']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_four']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_five']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_six']?></a></li>
                              </ul>
                              <?php
                            }elseif ($cjp_single_info['ucv_skill_three']) {
                              ?>
                              <ul class="cantTags">
                                <li><a href=""><?=$cjp_single_info['ucv_skill_one']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_two']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_three']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_four']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_five']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_six']?></a></li>
                              </ul>
                              <?php
                            }elseif ($cjp_single_info['ucv_skill_four']) {
                              ?>
                              <ul class="cantTags">
                                <li><a href=""><?=$cjp_single_info['ucv_skill_one']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_two']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_three']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_four']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_five']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_six']?></a></li>
                              </ul>
                              <?php
                            }elseif ($cjp_single_info['ucv_skill_five']) {
                              ?>
                              <ul class="cantTags">
                                <li><a href=""><?=$cjp_single_info['ucv_skill_one']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_two']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_three']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_four']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_five']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_six']?></a></li>
                              </ul>
                              <?php
                            }elseif ($cjp_single_info['ucv_skill_six']) {
                              ?>
                              <ul class="cantTags">
                                <li><a href=""><?=$cjp_single_info['ucv_skill_one']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_two']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_three']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_four']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_five']?></a></li>
                                <li><a href=""><?=$cjp_single_info['ucv_skill_six']?></a></li>
                              </ul>
                              <?php
                            }
                          ?>
                        </div>
                        <div class="col-md-4">
                          <ul>
                            <li class="click-btn apply"><a href="/cv-view.php?ucv_id=<?=$cjp_single_info['ucv_id']?>"><i class="fa fa-file-text-o" aria-hidden="true"></i> Public View</a></li>
                            <li class="click-btn apply cont"><a style="cursor: not-allowed;"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a></li>
                            <li class="click-btn apply"><a href="company/bookmark-resume.php">Bookmark Resume</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <?php
            }
          ?>

        </ul>
        <div class="pagiWrap">
          <div class="row">
            <div class="col-md-2 col-sm-6">
                
            </div>
            <div class="col-md-10 col-sm-6">
              <!-- Pagination Code 2nd part start -->
                 <ul class="pagination mt-4">
                    <?php
                      $per_query = "SELECT * FROM user_cv";
                      $per_result = mysqli_query($np2con,$per_query);
                      $total_record = mysqli_num_rows($per_result);

                      $total_page = ceil($total_record/$num_per_page);

                      if ($page>1) {
                        ?>
                          <li class="">
                            <a class="page-link" href="jobseeker-listing.php?page=<?=$page-1;?>"><i class="fa fa-chevron-left"></i></a>
                          </li>
                        <?php
                      }

                      for ($i=1; $i < $total_page ; $i++) { 

                        ?>
                          <li class="<?php echo ($i == $page ? "active" : "") ?>">
                            <a class="page-link" href="jobseeker-listing.php?page=<?=$i;?>"><?=$i;?></a>
                          </li>
                        <?php
                      }

                      if ($i>$page) {
                        ?>
                          <li class="">
                            <a class="page-link" href="jobseeker-listing.php?page=<?=$page+1;?>"><i class="fa fa-chevron-right"></i></a>
                          </li>
                        <?php
                      }

                    ?>
                </ul>
                <!-- Pagination Code 2nd part End -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-4">
        <div class="heading-title">Related <span>Resumes</span></div>
        <ul class="related-resumes">
          <?php
            $select_query = "SELECT * FROM user_cv ORDER BY rand() LIMIT 5";
            $related_cv = mysqli_query($np2con, $select_query);
            foreach ($related_cv as $cjp_single_info) {
              ?>
                <li>
                  <div class="listWrpService featured-wrap candidate">
                    <div class="row resumes">
                      <div class="col-md-3 col-sm-3 col-xs-2">
                        <div class="listImg">
                          <img src="/dashboard/images/profile_image/<?=$cjp_single_info['ucv_picture']?>" alt="">
                        </div>
                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="resumeName"><a href="/cv-view.php?ucv_id=<?=$cjp_single_info['ucv_id']?>"><?=$cjp_single_info['ucv_user_name']?></a></div>
                        <div class="desig"><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$cjp_single_info['ucv_present_address']?></div>
                      </div>
                    </div>
                  </div>
                </li>
              <?php
            }
          ?>

        </ul>
      </div>
      <div class="col-md-3 col-sm-12 ml-3">
        <ul class="text-center">
          <li>
            <div style="margin-left: 15px;" class="text-center">
              <div class="row resumes">
                <img width="250px" height="670px" src="images/ad-5.png" alt="img not found">
              </div>
            </div>
          </li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-12 ml-3">
        <ul class="text-center">
          <li>
            <div style="margin-left: 15px;" class="text-center">
              <div class="row resumes">
                <img width="250px" height="670px" src="images/ad-6.png" alt="img not found">
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!--Latest Resumes End--> 
  </div>
</div>
<!--Inner Content End--> 
<?php include('footer.php') ?>
