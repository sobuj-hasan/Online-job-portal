<?php 
include ('header.php');

$cmp_author_id = $_SESSION['snm_ejob_cmp_id'];

  $select_query = "SELECT * FROM company_jp INNER JOIN job_category  on job_category.jb_id = company_jp.pi_job_category WHERE cmp_author_id = '$cmp_author_id'";
  $cjp_info = mysqli_query($np2con, $select_query);

?>
</head>
<body>
<div class="container-scroller">
<?php include ('nav.php');?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
    <?php
        // include ('part1.php');
    ?>
</div>
<!-- eBazar Left Side profile and menu -->
<div class="row">
    <div class="col-md-12 col-sm-12 grid-margin stretch-card">
    <!--Inner Content start-->
        <div class="container" id="main">
            <div class="language-selection text-center">
                <h3 class="inline-block" id="lanHeader">Manage Your Job:</h3>
            </div>
            <div class="main-wrapper style-1" style="border-radius: 0px 0px 4px 4px; border-top: none;" role="main">
                
                <div class="container tab" style="font-size: 14px;">
                   <div class="row" style="font-size: 14px;">
                      <div class="col-md-12" style="font-size: 14px;">
                          <div class="row">
                              <div class="col-sm-12 col-md-8">
                                  <div class="">
                                    <h4>All Job List :</h4>
                                  </div>
                              </div>
                              <div class="col-sm-12 col-md-4">
                                <div class="text-right">
                                    <a class="btn btn-info" href="cjp-primary-info.php"><i class="fa fa-plus text-white ml-0 mr-2 mt-1 mb-1" aria-hidden="true"></i>Post New Job</a>
                                </div>
                              </div>
                          </div>

                         <div style="font-size: 14px;">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist" id="myTab" style="font-size: 14px;">
                               <li role="presentation" class="active" style="font-size: 14px;">
                                  <a href="" role="tab" data-toggle="tab" aria-expanded="true" style="font-size: 15px;">Posted  (<span id="LJA" style="font-size: 15px;">1120</span>)</a>
                               </li>
                            </ul>
                            <!-- Tab panes --> 
                            <div id="Joblist" style="font-size: 14px;">
                               <div class="tab-content" id="main" tabindex="-1" style="font-size: 14px;">
                                  <div role="tabpanel" class="tab-pane active" id="latest" style="font-size: 14px;">
                                     <div class="panel panel-default" style="font-size: 14px;">
                                        <!-- Default panel contents -->       
                                        <div id="panel-heading" class="panel-heading" style="font-size: 14px;">
                                           <div class="row" style="font-size: 14px;">

                                              <div class="col-md-3 npr hidden-xs hidden-sm" style="font-size: 14px;">
                                                 <h2 class="job-title" style="font-size: 12px;">
                                                    <span style="font-size: 12px;"></span> Job Title
                                                 </h2>
                                              </div>

                                              <div class="col-md-9 hidden-sm hidden-xs" style="font-size: 14px;">
                                                 <div class="row" style="font-size: 14px;">

                                                    <div class="col-md-2 br np text-center" style="font-size: 14px;">
                                                       <h2 style="font-size: 12px;">
                                                          <span class="icon-matching" style="font-size: 12px;"></span> Matched
                                                          <span class="icon-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Candidates matched with your requirement e.g. Age range,Gender, Job level,Total year of experience, work area and work organization." style="font-size: 12px;"></span>
                                                       </h2>
                                                    </div>

                                                    <div class="col-md-2 br np text-center" style="font-size: 14px;">
                                                       <h2 style="font-size: 12px;"><span class="icon-star-file" style="font-size: 12px;"></span> Short-listed</h2>
                                                    </div>

                                                    <div class="col-md-2 br np text-center" style="font-size: 14px;">
                                                       <h2 style="font-size: 12px;"><span class="icon-eye" style="font-size: 12px;"></span> View Status</h2>
                                                    </div>

                                                    <div class="col-md-2 br np text-center" style="font-size: 14px;">

                                                       <h2 class="inline-block" style="font-size: 12px;"><span class="icon-video-camera" style="font-size: 12px;"></span> Video Interview</h2>
                                                       <div class="assessment not-expended assessment2" style="font-size: 14px;">
                                                          <div class="info-popover" style="font-size: 12px;">
                                                             <i class="icon-question" amntss="0" style="font-size: 12px;"></i>
                                                          </div>
                                                          <div id="amntt0" class="mpover" style="left: 181px; display: none; font-size: 14px;">
                                                             <button aria-label="Close" data-dismiss="alert" amntsl="0" class="close" type="button" style="font-size: 21px;"><span aria-hidden="true" style="font-size: 22px;">×</span></button>                            
                                                             <div class="title" style="font-size: 14px;">
                                                                <h2 style="font-size: 12px;">Video Interview</h2>
                                                             </div>
                                                             <div class="mpbody" style="font-size: 14px;">
                                                                <p style="font-size: 14px;">
                                                                   Video interview lets the interviewer sets question(s) where interviewer doesn't have to be present while the candidate records and submits answer(s) through video. 
                                                                </p>
                                                             </div>
                                                             <span class="bottom-arrow" style="font-size: 14px;"></span>
                                                          </div>
                                                       </div>

                                                    </div>
                                                    <div class="col-md-2 npl text-center " style="font-size: 14px;">
                                                       <h2 style="font-size: 12px;">Actions</h2>
                                                    </div>

                                              </div>
                                            </div>

                                           </div>
                                        </div>

                                        <?php
                                          foreach ($cjp_info as $cjp_single_info) {
                                            ?>
                                              <div class="">
                                                <ul>
                                                  <li>
                                                    <div class="listWrpService featured-wrap">
                                                      <div class="row">
                                                        <div class="col-md-2 col-sm-3 col-xs-3">
                                                          <div class="listImg"><img src="images/company-img/company-logo-2.jpg" alt=""></div>
                                                        </div>
                                                        <div class="col-md-10 col-sm-9 col-xs-9">
                                                          <div class="row">
                                                              <div class="col-md-9">
                                                                <h3><a href="#"><?=$cjp_single_info['pi_job_title']?></a></h3>
                                                                <p><?=$cjp_single_info['jb_cat_name']?></p>
                                                                <ul class="featureInfo innerfeat">
                                                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$cjp_single_info['mi_job_location']?></li>
                                                                    <?php 
                                                                      $date = DateTime::createFromFormat('Y-m-d', $cjp_single_info['cjp_created_at']);
                                                                      $deadline = DateTime::createFromFormat('Y-m-d', $cjp_single_info['pi_apply_deadline']);
                                                                    ?>
                                                                    <li>
                                                                        <i class="fa fa-calendar" aria-hidden="true"></i> <?=$date->format('d M Y');?> - <?=$deadline->format('d M Y');?>
                                                                    </li>
                                                                    <li><?=$cjp_single_info['cmp_jp_status']?></li>
                                                                </ul>
                                                                <p class="para"><?=$cjp_single_info['pi_instraction_job_seeker']?></p>
                                                              </div>
                                                              <div class="col-md-3 text-center">
                                                              <div class="click-btn apply">
                                                                <a class="bg-info mb-2" href="cjp-primary-info.php?token=<?=$cjp_single_info['cjp_token']?>"><i style="font-size: 16px;" class="fa fa-pencil"></i></a><br>
                                                                <a class="bg-danger mb-2" href="cjp-delete.php?token=<?=$cjp_single_info['cjp_token']?>"><i style="font-size: 18px;" class="fa fa-trash-o"></i></a>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </li>
                                                </ul>
                                              </div>
                                            <?php
                                          }
                                          if($cjp_single_info == ""){
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h5 class="ml-5 mt-5">Nothig to show any Job Post !</h5>
                                                </div>
                                            </div>
                                            <?php 
                                          }
                                        ?>

                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>

            </div>
        </div>
    <!--Inner Content End--> 
    </div>
    <div class="row">
    </div>
</div>
</div>
</div>
<?php include ('footer.php');?>