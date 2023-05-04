<?php
include ('header.php');
  $cmp_author_id = $_SESSION['snm_ejob_cmp_id'];
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

        <div class="container tab" style="font-size: 14px;">
           <div class="row" style="font-size: 14px;">
              <div class="col-md-12" style="font-size: 14px;">
                  <div class="">
                    <h4>All Job List :</h4>
                  </div>
                 <div style="font-size: 14px;">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist" id="myTab" style="font-size: 14px;">
                       <li role="presentation" class="active" style="font-size: 14px;">
                          <a href="#latest" onclick="setReloadJobBoard(1, 'j')" role="tab" data-toggle="tab" aria-expanded="true" style="font-size: 15px;">Posted  (<span id="LJA" style="font-size: 15px;">1</span>)</a>
                       </li>
                       <li role="presentation" class="hidden-xs" style="font-size: 14px;">
                          <a href="#drafted" onclick="setReloadJobBoard(1, 'd')" role="tab" data-toggle="tab" aria-expanded="false" style="font-size: 15px;">Drafted  (<span id="DJA" style="font-size: 15px;">1</span>)</a>
                       </li>
                       <li role="presentation" class="hidden-xs" style="font-size: 14px;">
                          <a href="#archived" onclick="setReloadJobBoard(1, 'a')" role="tab" data-toggle="tab" style="font-size: 15px;" aria-expanded="false">Archived  (<span id="AJA" style="font-size: 15px;">0</span>)</a>
                       </li>
                       <li class="dropdown hidden-sm hidden-md hidden-lg" role="presentation" style="font-size: 14px;">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#others" aria-expanded="false" style="font-size: 15px;">
                          <span class="caret" style="font-size: 15px;"></span>Others
                          </a>
                          <ul class="dropdown-menu" style="font-size: 14px;">
                             <li role="presentation" class="" style="font-size: 14px;"><a data-toggle="tab" href="#drafted" onclick="setReloadJobBoard(1, 'd')" aria-controls="exampleTabsThree" role="tab" aria-expanded="false" style="font-size: 12px;">Drafted (<span id="DJA" style="font-size: 12px;">2</span>)</a></li>
                             <li role="presentation" class="" style="font-size: 14px;"><a data-toggle="tab" href="#archived" onclick="setReloadJobBoard(1, 'a')" aria-controls="exampleTabsFour" role="tab" aria-expanded="true" style="font-size: 12px;">Archived (<span id="AJA" style="font-size: 12px;">0</span>)</a></li>
                          </ul>
                       </li>
                    </ul>
                    <!-- Tab panes --> 
                    <div id="Joblist" style="font-size: 14px;">
                       <div class="tab-content" id="main" tabindex="-1" style="font-size: 14px;">
                          <!-- Latest section  -->
                          <div role="tabpanel" class="tab-pane active" id="latest" style="font-size: 14px;">
                             <div class="panel panel-default" style="font-size: 14px;">
                                <!-- Default panel contents -->

                                <?php
                                  $select_query = "SELECT * FROM company_jp INNER JOIN job_category  on job_category.jb_id = company_jp.pi_job_category INNER JOIN all_company on company_jp.cjp_cmp_id = all_company.ac_id WHERE cmp_author_id = '$cmp_author_id'";
                                  $cjp_info = mysqli_query($np2con, $select_query);
                                  foreach ($cjp_info as $cjp_single_info) {
                                  ?>
                                  <div class="">
                                    <ul>
                                      <li>
                                        <div class="listWrpService featured-wrap">
                                          <div class="row">
                                            <div class="col-md-2 col-sm-3 col-xs-3">
                                              <div class="listImg"><img src="<?php echo http://localhost/online-job-portal;?>/company/images/company-img/<?=$cjp_single_info['ac_cmp_logo']?>" alt="company logo"></div>
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
                                                  <form action="" method="POST">
                                                    <div class="click-btn apply">
                                                      <a class="bg-info mb-2" href="cjp-primary-info.php?token=<?=$cjp_single_info['cjp_token']?>"><i style="font-size: 16px;" class="fa fa-pencil"></i></a><br>
                                                      <a href="cjp-delete.php?token=<?=$cjp_single_info['cjp_token']?>" class="bg-danger mb-2"><i style="font-size: 18px;" class="fa fa-trash-o"></i></a>
                                                    </div>
                                                  </form>
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
                                        <div class="col-md-12">
                                            <h5 class="ml-5 mt-5">Nothig to show job post yet!</h5>
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

        <!--Inner Content End--> 

      </div>

      <div class="row">
      </div>
    </div>
  </div>
</div>

<?php include ('footer.php');?>