<?php 
include('header.php');

  $jp_id = $_GET['jp_id'];

  // Total Job Post infomation 
  $select_query = "SELECT * FROM company_jp INNER JOIN all_company on all_company.ac_id = company_jp.cjp_cmp_id INNER JOIN job_category on company_jp.pi_job_category = job_category.jb_id WHERE id = $jp_id";
  $jobpost_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

?>
</head>
<body>
<!-- Job view page and apply -->
<div class="row bg-danger">
    <div class="col-md-12 col-sm-12 grid-margin stretch-card">
    <!--Inner Content start-->
        <div class="container bg-info" id="main">
            <div class="main-wrapper style-1" style="border-radius: 0px 0px 4px 4px; border-top: none;" role="main">
                <div class="alert-warning bg-transparent text-right pt-10 mb-10" role="alert" style="" id="HideDivForBang">
                </div>
                
                <h3 style="margin-top: 50px;" class="text-blue mb-40" id="pHead"><?=$jobpost_info['pi_job_title']?></h3>
                
                <div id="job-preview" class="job-preview">
                   <!-- Main Content Start-->
                   <div class="row">
                      <div class="col-md-12 col-sm-12">
                         <div class="pull-right ">
                            <p class="category"><strong>Category: </strong><?=$jobpost_info['jb_cat_name']?></p>
                         </div>
                      </div>
                      <!------------------****---------------------->
                      <!------------------****1---------------------->
                      <div class="col-md-8 col-sm-8">
                         <div class="left">
                            <div class="row">
                               <div class="col-sm-3 col-sm-push-9">
                               </div>
                               <div class="col-sm-9 col-sm-pull-3">
                                  <h5>
                                     Company Name:
                                  </h5>
                                  <h6>
                                    <?=$jobpost_info['ac_cmp_name']?>
                                     <span> </span>
                                  </h6>
                               </div>
                            </div>
                            <div class="vac">
                               <h6>
                                  Vacancy:
                               </h6>
                               <p>
                                  <?=$jobpost_info['pi_vacancie']?>
                               </p>
                            </div>
                            <div class="job_des">
                               <h6>
                                  Job Context:
                               </h6>
                               <ul>
                                  <?=$jobpost_info['mi_job_context']?>
                               </ul>
                            </div>
                            <div class="job_des">
                               <h6>
                                  Job Responsibilities:
                               </h6>
                               <ul>
                                  <?=$jobpost_info['mi_job_response']?>
                               </ul>
                            </div>
                            <div class="job_nat">
                               <h6>
                                  Employment Status:
                               </h6>
                               <p>
                                  <?=$jobpost_info['pi_employe_status']?></li>
                               </p>
                            </div>
                            <!--Educational Requirements Details:-->
                            <div class="edu_req">
                               <h6>
                                  Educational Requirements:
                               </h6>
                               <ul>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_degree']?></li>
                               </ul>
                            </div>
                            <div class="edu_req">
                               <h6>
                                  Education Training or Trade Course:
                               </h6>
                               <ul>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_trade_course']?></li>
                               </ul>
                            </div>

                            <div class="edu_req">
                               <h6>
                                  Professional Certificate:
                               </h6>
                               <ul>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_profess_certificate']?></li>
                               </ul>
                            </div>

                            <div class="edu_req">
                               <h6>
                                  Area of Experience:
                               </h6>
                               <ul>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_area_exp_one']?></li>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_area_exp_two']?></li>
                               </ul>
                            </div>

                            <div class="edu_req">
                               <h6>
                                  Year of Experience:
                               </h6>
                               <ul>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_min_experience']?> - <?=$jobpost_info['ci_min_experience']?> Years</li>
                               </ul>
                            </div>

                            <div class="edu_req">
                               <h6>
                                  Area of Business Experience:
                               </h6>
                               <ul>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_area_busines_one']?></li>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_area_busines_two']?></li>
                               </ul>
                            </div>

                            <div class="edu_req">
                               <h6>
                                  Needed Special Skill:
                               </h6>
                               <ul>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_skill_one']?></li>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_skill_two']?></li>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_skill_three']?></li>
                               </ul>
                            </div>

                            <div class="job_req">
                               <h6>
                                  Additional Requirements:
                               </h6>
                               <ul>
                                  <li><?=$jobpost_info['ci_additional_require']?> </li>
                               </ul>
                            </div>

                            <div class="job_req">
                               <h6>
                                  Allowed Gender:
                               </h6>
                               <ul>
                                  <li><?=$jobpost_info['ci_gender']?>  </li>
                               </ul>
                            </div>

                            <div class="job_req">
                               <h6>
                                  Age Range:
                               </h6>
                               <ul>
                                  <li><?=$jobpost_info['ci_min_age']?> - <?=$jobpost_info['ci_max_age']?> Years  </li>
                               </ul>
                            </div>

                            <div class="job_loc" style="line-height: 24px;">
                               <h6>
                                  Workplace:
                               </h6>
                               <ul>
                                  <li>
                                    <?=$jobpost_info['mi_workplace']?>
                                  </li>
                               </ul>
                            </div>
                            <div class="job_loc" style="line-height: 24px;">
                               <h6>
                                  Job Location:
                               </h6>
                                  <?=$jobpost_info['mi_job_location']?>
                            </div>
                            <div class="salary_range">
                               <h6>
                                  Salary
                               </h6>
                               <!--<p></p>-->
                               <ul>
                                  <li> <?=$jobpost_info['mi_min_salary']?> - <?=$jobpost_info['mi_max_salary']?> (Monthly)</li>
                               </ul>
                            </div>
                            <div class="job_source">
                               <h6>
                                  Job Source :-
                               </h6>
                               <a href="http://www.ejobs.com.bd"><strong>ejobs.com</strong></a>
                            </div>
                         </div>
                      </div>
                      <!------------------****1---------------------->
                      <!---------------------->
                      <!-- Job Summary part -->
                      <!---------------------->
                      <div class="col-md-4 col-sm-4">
                         <!------------------****4---------------------->
                         <div style="border-radius: 5px;" class="right bg-light p-3">
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                   <h6>Job Summary :</h6>
                               </div>
                               <div class="panel-body">
                                  <p>
                                     <strong>Posted on:</strong> <?php $date = DateTime::createFromFormat('Y-m-d', $jobpost_info['cjp_created_at']); echo $date->format('d M Y');?>
                                  </p>
                                  <p>
                                     <strong>Vacancy:</strong>
                                     <?=$jobpost_info['pi_vacancie']?>
                                  </p>
                                  <p>
                                     <strong>Job Nature:</strong>
                                     <?=$jobpost_info['pi_employe_status']?>
                                  </p>
                                  <p>
                                     <strong>Age:</strong> <?=$jobpost_info['ci_min_age']?> - <?=$jobpost_info['ci_max_age']?> Years
                                  </p>
                                  <p style="line-height: 24px;">
                                     <strong>Job Location:</strong>
                                     <?=$jobpost_info['mi_job_location']?>
                                  </p>
                                  <p>
                                     <strong>Salary:</strong> Tk. <?=$jobpost_info['mi_min_salary']?> - <?=$jobpost_info['mi_max_salary']?> (Monthly)
                                  </p>
                                  <p>
                                     <strong>Application Deadline:</strong>
                                     <?php $date = DateTime::createFromFormat('Y-m-d', $jobpost_info['pi_apply_deadline']); echo $date->format('d M Y');?>
                                  </p>
                               </div>
                            </div>
                         </div>
                         <a id="btnPrint" href="javascript:printPreview()" class="btn btn-default" style="width: 100%;">
                           <span class="icon-print"></span>
                           Print this Preview
                         </a>                                            
                      </div>
                      <!--Edited Print Preview-->
                      <!------------------****4---------------------->
                   </div>
                   <!---------------------------->   
                   <!-- Apply Instruction Part -->
                   <!------------------****2---------------------->
                   <div class="row">
                      <!------------------****3---------------------->           
                      <div class="co-md-12 col-sm-12">
                         <div class="guide text-center ">
                            <!--strCVREceivingOptions:1-->
                            <div class="rba">
                               <h4>
                                  Read Before Apply
                               </h4>
                               <div class="rba-title-divider-l"></div>
                               <div class="s-sug-txt">
                                  <input name="mi_workplace" value="Work from home" type="checkbox"> ejobs সবসময় কোম্পানীর তথ্য যাচাই করে জব সার্কুলার গ্রহণ করে, তারপরও আপনি যদি কোন প্রতারণার শিকার হন <br>ejobs দায়ী থাকবে না । কোন সার্কুলার ভুল মনে হলে জবটিতে রিপোর্ট করুন, ধন্যবাদ ।
                               </div>
                            </div>
                            <!--strHardCopyCV:0-->
                            <div class="apto">
                               <h3>
                                  Apply Here
                                  <span style="display:none;">Only for test</span>
                               </h3>
                            </div>
                            <div class="apply text-center">
                               <a class="btn btn-success" href="apply-job.php?jp_id=<?=$jp_id;?>">Apply Online</a>
                            </div>
                            <br>
                            <div>
                               <span class="date">
                               CV Receving Email: <strong><?=$jobpost_info['pi_cv_receve_email']?></strong>
                               </span>
                            </div>
                            <!-- Apply Online For Company URL-->                      
                            <br>

                            <div>
                               <span class="date">
                               Application Deadline: <strong><?=$jobpost_info['pi_apply_deadline']?></strong>
                               </span>
                            </div>
                            <!--</div>-->     
                         </div>
                         <!------------------****3---------------------->
                         <!--Company Details-->
                         <div class="company-info">
                            <h3 style="font-size: 14px;color:black;">
                               Company Information
                            </h3>
                            <span>
                              <?=$jobpost_info['ac_cmp_name']?>
                              <br>
                              Website: <a target="blank" href="<?=$jobpost_info['ac_cmp_website_url']?>"><?=$jobpost_info['ac_cmp_website_url']?></a>
                            </span>   
                         </div>

                          <div style="margin-top: 30px; margin-bottom: 30px;" class="apply text-center">
                             <a class="btn btn-info" href="index.php">&nbsp;&nbsp; <i class="fa fa-angle-double-left"></i>&nbsp; Back &nbsp;&nbsp;&nbsp;&nbsp;</a>
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