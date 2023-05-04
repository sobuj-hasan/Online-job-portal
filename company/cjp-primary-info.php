<?php 
include ('header.php');

// New job post token generet function
if(isset($_GET['token'])){
 $cmp_jp_token = $_GET['token'];
}else {
$set_token = getRandomWord(8);
echo reloader('cjp-primary-info.php?token='.$set_token.'',0);
    $insert_query = "INSERT INTO `company_jp`(`cjp_token`) VALUES ('$set_token')";
    $cmp_jp_token = mysqli_query($np2con, $insert_query);
}
    // company author id  
    $cmp_author_id = $_SESSION['snm_ejob_cmp_id'];

    $select_query = "SELECT * FROM company_jp WHERE cjp_token = '$cmp_jp_token'";
    $cjp_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));
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
            
            <?php
                if(isset($_POST['submit'])){
                    $cjp_cmp_id = htmlspecialchars($_POST['cjp_cmp_id']);
                    $pi_service_type = htmlspecialchars($_POST['pi_service_type']);
                    $pi_job_title = htmlspecialchars($_POST['pi_job_title']);
                    $pi_vacancie = htmlspecialchars($_POST['pi_vacancie']); 
                    $pi_job_category = htmlspecialchars($_POST['pi_job_category']);
                    $pi_sub_category = htmlspecialchars($_POST['pi_sub_category']);
                    $pi_employe_status = htmlspecialchars($_POST['pi_employe_status']);
                    $pi_apply_deadline = htmlspecialchars($_POST['pi_apply_deadline']);
                    $pi_cv_receve_option = $_POST['pi_cv_receve_option'];
                    foreach ($pi_cv_receve_option as $pi_cv_receve) {
                        $pi_cv_receve_value .= $pi_cv_receve.",";
                    }
                    $pi_cv_receve_email = htmlspecialchars($_POST['pi_cv_receve_email']);
                    $pi_instraction_job_seeker = htmlspecialchars($_POST['pi_instraction_job_seeker']);
                    $pi_photo_enclose_cv = htmlspecialchars($_POST['pi_photo_enclose_cv']);
            
                    $update_cjp = "UPDATE `company_jp` SET `cmp_author_id`='$cmp_author_id', cjp_cmp_id='$cjp_cmp_id', `pi_service_type`= '$pi_service_type',`pi_job_title`='$pi_job_title',`pi_vacancie`='$pi_vacancie',`pi_job_category`='$pi_job_category',`pi_sub_category`='$pi_sub_category',`pi_employe_status`='$pi_employe_status',`pi_apply_deadline`='$pi_apply_deadline',`pi_cv_receve_option`='$pi_cv_receve_value',`pi_cv_receve_email`='$pi_cv_receve_email',`pi_instraction_job_seeker`= '$pi_instraction_job_seeker',`pi_photo_enclose_cv`='$pi_photo_enclose_cv' WHERE cjp_token = '$cmp_jp_token'";
                    if(mysqli_query($np2con, $update_cjp)){
                        echo gen_notification('Successfully Save This information Please fillup next form', 'success');
                        echo reloader('company/cjp-more-info.php?token='.$cmp_jp_token.'',2500);
                        
                    }
                    else {
                        echo gen_notification('This information save failed, Send currect information tray again','danger');
                    }
                }
            ?>
            
            <div class="language-selection text-center">
                <h3 class="inline-block" id="lanHeader">Select a language to post the job:</h3>
                <div class="toggle">
                <label class="radio nmd">
                <input id="JobLng1" type="radio" value="EN" name="JobLng" checked="" onclick="changeHeaderLan(1)">
                <span class="outer"><span class="inner"></span></span>English
                </label>
                <!-- <label class="radio nmd bn">
                    <input id="JobLng2" type="radio" value="BN" name="JobLng" onclick="changeHeaderLan(0)">
                    <span class="outer"><span class="inner"></span></span>বাংলা
                </label>  -->
                </div>
            </div>
            <div class="main-wrapper style-1" style="border-radius: 0px 0px 4px 4px; border-top: none;" role="main">
                <!-- Progress bar Steps -->
                <?php
                    include ('cjp-progress-bar.php');
                ?>
                <h3 class="text-blue mb-40" id="pHead">Primary Information</h3>
                <div class="card-content">

                <form action="cjp-primary-info.php?token=<?php echo $cmp_jp_token; ?>" method="POST" enctype="multipart/form-data" name="submit">
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                <span id="hServiceType">Select Company *</span>
                            </label>
                            <div class="col-md-7 mb-3">
                                <select aria-label="Degree Level" class="form-control form-control-s-1 mb-10" name="cjp_cmp_id" required>
                                    <option>Select a company</option>
                                    <?php
                                        $select_query = "SELECT * FROM all_company WHERE ac_author_id = '$cmp_author_id'";
                                        $author_company = mysqli_query($np2con, $select_query);

                                        foreach ($author_company as $company_name) {
                                        ?>
                                            <option value="<?=$company_name['ac_id'];?>"><?=$company_name['ac_cmp_name']?></option>
                                        <?php
                                        }
                                    ?>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label">
                                <span id="hServiceType">Job Type&nbsp;</span>
                                <span title="Required" class="required">*</span>
                            </label>
                            <div class="col-md-7 jc-wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="pi_service_type" class="form-control form-control-s-1" required>
                                            <option value="">Select Job Type</option>
                                            <option value="Private Job">Private Job</option>
                                            <option value="Govt Job">Govt Job</option>
                                            <option value="Bank Job">Bank Job</option>
                                            <option value="NGO Job">NGO Job</option>
                                            <option value="News-media Job">News/media Job</option>
                                            <option value="Other Job">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Job Classification -->
                        <div class="form-group row mb-20 has-error">
                            <label class="col-md-3 col-form-label">
                                <span id="HJobTitle">Job Title&nbsp;</span>
                                <span title="Required" class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" id="txtJobTitle" class="form-control form-control-s-1 popTips" name="pi_job_title" value="<?= $cjp_info['pi_job_title']; ?>" placeholder="Write Job Title" maxlength="150">
                            </div>
                        </div>
                        <div class="form-group row mb-20 has-error">
                            <label class="col-md-3 col-form-label">
                                <span id="HNoOfVac">No. of Vacancies&nbsp;</span>
                                <span title="Required" class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <div class="row checkbox-disabled  ">
                                    <div class="col-md-5">
                                        <input type="text" value="<?= $cjp_info['pi_vacancie']; ?>" id="txtVacancies" name="pi_vacancie" maxlength="5" class="form-control form-control-s-1 popTips on-click-disabled " placeholder="Vacancy Number" data-toggle="popover">
                                    </div>
                                    <div class="col-md-7">
                                    <div class="md-checkbox">
                                        <input name="pi_vacancie" value="Not specific" id="chkVacancies" type="checkbox">
                                        <label for="chkVacancies" class=""><span id="HNA">&nbsp;Not Specific</span></label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-20 has-error">
                            <label class="col-md-3 col-form-label"><span id="HjobCategory">Job Category&nbsp;</span><span title="Required" class="required">*</span></label>
                            <div class="col-md-7 jc-wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="pi_job_category" class="form-control form-control-s-1">
                                            <option value="">Select job Category</option>
                                            <?php
                                                $select = "SELECT * FROM job_category";
                                                $job_categories = mysqli_query($np2con, $select);
                                                
                                                foreach ($job_categories as $category){
                                                ?>
                                                <label class="radio">
                                                    <option value="<?=$category['jb_id']?>"><?=$category['jb_cat_name']?></option>
                                                </label>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-20 has-error">
                            <label class="col-md-3 col-form-label"><span id="HjobCategory">Job Sub-Category&nbsp;</span><span title="Required" class="required">*</span></label>
                            <div class="col-md-7 jc-wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="pi_sub_category" class="form-control form-control-s-1">
                                            <option value="">Select job Sub-Category</option>
                                            <?php
                                                $select = "SELECT * FROM sub_category";
                                                $sub_categories = mysqli_query($np2con, $select);
                                                
                                                foreach ($sub_categories as $sub_category){
                                                ?>
                                                <label class="radio">
                                                    <option value="<?=$sub_category['id']?>"><?=$sub_category['sub_cat_name']?></option>
                                                </label>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-20 has-error">
                            <label class="col-md-3 col-form-label">
                                <span>Employment Status&nbsp;</span>
                                <span title="Required" class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <fieldset>
                                    <legend class="sr-only">Employment Status</legend>
                                    <label id="employe-status1" class="radio nmd"><input id="employe-status1" value="Full Time" type="radio" name="pi_employe_status" autocomplete="off" checked="checked" <?php echo ($cjp_info['pi_employe_status'] == "Full Time" ? "checked='checked'" : "")?> ><span class="outer"><span class="inner"></span></span><span id="HBasicListing">Full Time</span></label>
                                    <label id="employe-status2" class="radio nmd" style="display:inline-block"><input id="employe-status2" value="Part Time" type="radio" name="pi_employe_status" autocomplete="off" <?php echo ($cjp_info['pi_employe_status'] == "Part Time" ? "checked='checked'" : "")?> ><span class="outer"><span class="inner"></span></span><span id="HStandOut">Part Time</span></label>
                                    <label id="employe-status3" class="radio nmd" style="display:inline-block"><input id="employe-status3" value="Contractual" type="radio" name="pi_employe_status" autocomplete="off" <?php echo ($cjp_info['pi_employe_status'] == "Contractual" ? "checked='checked'" : "")?> ><span class="outer"><span class="inner"></span></span><span id="HStandOut">Contractual</span></label>
                                    <label id="employe-status4" class="radio nmd" style="display:inline-block"><input id="employe-status4" value="Internship" type="radio" name="pi_employe_status" autocomplete="off" <?php echo ($cjp_info['pi_employe_status'] == "Internship" ? "checked='checked'" : "")?> ><span class="outer"><span class="inner"></span></span><span id="HStandOut">Internship</span></label>
                                    <label id="employe-status5" class="radio nmd" style="display:inline-block"><input id="employe-status5" value="Freelance" type="radio" name="pi_employe_status" autocomplete="off" <?php echo ($cjp_info['pi_employe_status'] == "Freelance" ? "checked='checked'" : "")?> ><span class="outer"><span class="inner"></span></span><span id="HStandOut">Freelance</span></label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label"><span id="HAppDeadLine">Application Deadline&nbsp;</span>
                                <span title="Required" class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input aria-label="Application Deadline" type="date" class="form-control form-control-s-1" id="txtDeadline" name="pi_apply_deadline" value="<?=$cjp_info['pi_apply_deadline'];?>" style="min-width: 7em;">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="alert alert-warning mb-0" role="alert"><i class="icon-info"></i>
                                            <span id="HAppDeadLineMsg">&nbsp;You can select a deadline within next 30 days</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------->
                        <div class="form-group row mb-20 has-error">
                            <label class="col-md-3 col-form-label">
                                <span id="HResRecOpt">Resume Receiving Option&nbsp;</span>
                                <span title="Required" class="required">*</span>
                            </label>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="resume-receve">
                                            <div class="md-checkbox wp">
                                                <input id="online" name="pi_cv_receve_option[]" value="Apply" type="checkbox">
                                                <label for="online" class="">&nbsp;Apply Online</label>
                                            </div>
                                            <div class="md-checkbox wp">
                                                <input id="Email" name="pi_cv_receve_option[]" value="Email" type="checkbox">
                                                <label for="Email" class="">&nbsp;Email</label>
                                            </div>
                                            <div class="md-checkbox wp">
                                                <input id="interview" name="pi_cv_receve_option[]" value="Walk" type="checkbox">
                                                <label for="interview" class="">&nbsp;Walk in Interview</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label" id="HSpJobSeek">Resume Receiving Email *</label>
                            <div class="col-md-4">
                                <input type="email" value="<?=$cjp_info['pi_cv_receve_email']?>" id="cv-receve-email" name="pi_cv_receve_email" class="form-control form-control-s-1 popTips on-click-disabled " placeholder="Enter Receiving Email">
                            </div>
                        </div>
                        <!---------------------------------------------------------->
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label" id="HSpJobSeek">Special Instruction for Job Seekers *</label>
                            <div class="col-md-7">
                                <textarea style="border: 1px solid #c62828;" class="form-control" name="pi_instraction_job_seeker" id="" cols="20" rows="10"><?=$cjp_info['pi_instraction_job_seeker']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label" id="HPhotoRes">
                            Photograph (Enclose with resume)
                            </label>
                            <div class="col-md-7">
                                <label class="switch" id="PhotographLB" for="Photograph">
                                    <span class="sr-only">switch button of Photograph (Enclose with resume)</span>
                                    <input id="Photograph" value="1" type="checkbox" class="switch-input" name="pi_photo_enclose_cv">
                                    <span class="switch-label" data-on="Yes" data-off="No"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="divider s-2 mb-30 mt-20"></div>
                                </div>
                                <div class="col-md-8 col-md-push-4">
                                    <div class="btn-group-right">
                                    <button class="btn btn-info btn-lg jp1stDrft" name="submit" type="submit" actionval="1"> Save & Continue </button>
                                    <!-- <button style="background: #b1318e; color: white;" class="btn btn-lg jp1stDrftCont" type="submit" name="submit" actionval="0">Continue</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    
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