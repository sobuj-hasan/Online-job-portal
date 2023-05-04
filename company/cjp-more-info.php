<?php
include ('header.php');
$cmp_author_id = $_SESSION['snm_ejob_cmp_id'];
$cmp_jp_token = $_GET['token'];

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
                    $mi_job_level = htmlspecialchars($_POST['mi_job_level']);
                    $mi_job_context = htmlspecialchars($_POST['mi_job_context']);
                    $mi_job_response = htmlspecialchars($_POST['mi_job_response']);
                    $mi_workplace = htmlspecialchars($_POST['mi_workplace']);
                    $mi_job_location = htmlspecialchars($_POST['mi_job_location']);
                    $mi_min_salary = htmlspecialchars($_POST['mi_min_salary']);
                    $mi_max_salary = htmlspecialchars($_POST['mi_max_salary']);
                    $mi_show_salary = htmlspecialchars($_POST['mi_show_salary']);
                    $mi_additional_salary = htmlspecialchars($_POST['mi_additional_salary']);
                    $mi_other_benefits = htmlspecialchars($_POST['mi_other_benefits']);
                    $mi_other_benefits_option = $_POST['mi_other_benefits_option'];
                    foreach ($mi_other_benefits_option as $benefits_option) {
                        $benefits_option_receve_value .= $benefits_option.",";
                    }
                    $mi_lunch_facility = htmlspecialchars($_POST['mi_lunch_facility']);
                    $mi_salary_review = $_POST['mi_salary_review'];
                    $mi_festival_bonus = $_POST['mi_festival_bonus'];
                    $mi_others_benefits_name = $_POST['mi_others_benefits_name'];
            
                    $update_cjp = "UPDATE `company_jp` SET `mi_job_level`='$mi_job_level',`mi_job_context`='$mi_job_context',`mi_job_response`= '$mi_job_response',`mi_workplace`='$mi_workplace',`mi_job_location`='$mi_job_location',`mi_min_salary`='$mi_min_salary',`mi_max_salary`='$mi_max_salary',`mi_show_salary`='$mi_show_salary',`mi_additional_salary`='$mi_additional_salary',`mi_other_benefits`='$mi_other_benefits',`mi_other_benefits_option`='$benefits_option_receve_value',`mi_lunch_facility`= '$mi_lunch_facility',`mi_salary_review`='$mi_salary_review', mi_festival_bonus = '$mi_festival_bonus', mi_others_benefits_name = '$mi_others_benefits_name' WHERE cjp_token = '$cmp_jp_token'";
                    if(mysqli_query($np2con, $update_cjp)){
                        echo gen_notification('Successfully Save This information Please fillup next form', 'success');
                        echo reloader('company/cjp-require-info.php?token='.$cmp_jp_token.'',2500);
                        
                    }
                    else {
                        echo gen_notification('This information save failed, Send currect information tray again','danger');
                    }
                }
            ?>
            
            <div style="text-align: left;" class="language-selection">
                More Information
            </div>
            <div class="main-wrapper style-1" style="border-radius: 0px 0px 4px 4px; border-top: none;" role="main">
                <div class="alert-warning bg-transparent text-right pt-10 mb-10" role="alert" style="" id="HideDivForBang">
                </div>
                <!-- Progress bar Steps -->
                <?php
                    include ('cjp-progress-bar.php');
                ?>

                <h3 class="text-blue mb-40" id="pHead">More Job Information</h3>
                <div class="card-content">
                
                    <div class="card-content">
					<form action="" method="POST" enctype="">
						<!--<input value=",9" name="changedFields" id="changedFields" type="hidden" />-->
						<div class="form-group row mb-20" id="job_level">
							<label class="col-md-3 col-form-label">Job Level&nbsp;<span title="Required" class="required">*</span></label>
							<div class="col-md-7">
								<fieldset>
                                    <legend class="sr-only">Job Level</legend>
                                    <label id="ServiceTypeLebel1" class="radio nmd">
                                        <input id="ServiceType1" value="Fresher" type="radio" name="mi_job_level" autocomplete="off" checked="checked" <?php echo ($cjp_info['mi_job_level'] == "Fresher" ? "checked='checked'" : "")?> ><span class="outer"><span class="inner"></span></span><span id="fresher">Fresher</span>
                                    </label>
                                    <label id="ServiceTypeLebel2" class="radio nmd" style="display:inline-block">
                                        <input id="ServiceType2" value="Mid level" type="radio" name="mi_job_level" autocomplete="off" <?php echo ($cjp_info['mi_job_level'] == "Mid level" ? "checked='checked'" : "")?> ><span class="outer"><span class="inner"></span></span><span id="midlevel">Mid level</span>
                                    </label>
                                    <label id="ServiceTypeLebel3" class="radio nmd" style="display:inline-block">
                                        <input id="ServiceType3" value="Top level" type="radio" name="mi_job_level" autocomplete="off" <?php echo ($cjp_info['mi_job_level'] == "Top level" ? "checked='checked'" : "")?> ><span class="outer"><span class="inner"></span></span><span id="toplevel">Top level</span>
                                    </label>
								</fieldset>
							</div>
						</div>
						
						
						<div class="form-group row mb-20">
						  <label class="col-md-3 col-form-label">Job Context</label>
						  <div class="col-md-7">
							<textarea style="border: 1px solid #c62828;" class="form-control" name="mi_job_context" id="" cols="30" rows="4"><?=$cjp_info['mi_job_context']?></textarea>
						  </div>
							
						</div>
						
						
		
						<div class="form-group row mb-20">
						  <label class="col-md-3 col-form-label">Job Responsibilities&nbsp;<span title="Required" class="required">*</span></label>
						  <div class="col-md-7">
							<textarea style="border: 1px solid #c62828;" class="form-control" name="mi_job_response" id="" cols="30" rows="6"><?=$cjp_info['mi_job_response']?></textarea>
						  </div>
							
						</div>
						<div class="form-group row mb-20">
							<label class="col-md-3 col-form-label">Workplace</label>
							<div class="col-md-9">
								<div class="wplace">
									<div class="md-checkbox wp">
										<input id="office" name="mi_workplace" value="Work at office" type="checkbox">
										<label for="office" class="">Work at office</label>
									</div>
									<div class="md-checkbox wp">
										<input id="home" name="mi_workplace" value="Work from home" type="checkbox">
										<label for="home" class="">Work from home</label>
									</div>
								</div>
							</div>
						</div>

						
						<div class="form-group row mb-20" id="job_location">
							<label class="col-md-3 col-form-label">Job Location&nbsp;<span title="Required" class="required">*</span></label>
							
							<div class="col-md-7">
	                            <input type="text" id="txtJobTitle" class="form-control form-control-s-1 popTips" name="mi_job_location" value="<?= $cjp_info['mi_job_location']; ?>" placeholder="Job Location" maxlength="150">
	                        </div>

							</div>
		                	<!------------------------------------------------>
                        
						<div class="form-group row mb-20" id="job_salary">
							<label class="col-md-3 col-form-label">Salary&nbsp;<span title="Required" class="required">*</span></label>
							<div class="col-md-9">
								<div class="row checkbox-disabled">

									<div class="col-md-3 salary-min">
										<input type="text" id="MinSalary" maxlength="7" name="mi_min_salary" value="<?=$cjp_info['mi_min_salary']?>" class="form-control form-control-s-1 on-click-disabled" placeholder="Minimum Salary"><span id="errmsg"></span>
									</div>
									<div class="col-md-3 salary-max">
										<input type="text" id="MaxSalary" maxlength="7" name="mi_max_salary" value="<?=$cjp_info['mi_max_salary']?>" class="form-control form-control-s-1 on-click-disabled" placeholder="Maximum Salary"><span id="errmsg2"></span>
									</div>
									<div class="col-md-3 salary-month">
										<span id="salaryMonthly">Monthly</span>
									</div>
								</div>
							</div>


							<div class="col-md-offset-3 col-md-9">
								<div class="sal-info">
									<div class="e-info-txt">What do you want to show for salary in Job Detail?</div>
									<div class="vopt">
										<fieldset>
											<legend class="sr-only">Options for Showing salary</legend>
											<label class="radio showSalary">
												<input id="showsalary" value="Show salary" type="radio" name="mi_show_salary" autocomplete="off" <?php echo ($cjp_info['mi_show_salary'] == "Show salary" ? "checked='checked'" : "")?> >
												<span class="outer"><span class="inner"></span></span>
												<span id="showsalary2">Show salary</span>
											</label>
											
											<label class="radio showSalary">
												<input id="shownothing" value="Show nothing" type="radio" name="mi_show_salary" autocomplete="off" <?php echo ($cjp_info['mi_show_salary'] == "Show nothing" ? "checked='checked'" : "")?> >
												<span class="outer"><span class="inner"></span></span>
												<span id="shownothing2">Show nothing</span>
											</label>
											<label class="radio showSalary">
												<input id="negotiable" value="Negotiable" type="radio" name="mi_show_salary" autocomplete="off" <?php echo ($cjp_info['mi_show_salary'] == "Negotiable" ? "checked='checked'" : "")?> >
												<span class="outer"><span class="inner"></span></span>
												<span id="negotiable2">Show '<strong>Negotiable</strong>' instead of given salary range</span>
											</label>
										</fieldset>
									</div>
								</div>
							</div>
                        </div>
						<!-------------------salary portion----------------------------->
						<div class="form-group row mb-20">
							<label class="col-md-3 col-form-label">Additional Salary Info.</label>
							<div class="col-md-7">
								<textarea style="border: 1px solid #c62828;" class="form-control" name="mi_additional_salary" id="" cols="30" rows="4"><?=$cjp_info['mi_additional_salary']?></textarea>
							</div>
						</div>
                        <!------------------------------------------------>
		
						
						<div class="form-group row mb-20 compensation">
						  <label class="col-md-3 col-form-label">Compensation &amp; other benefits</label>
				
						  <div class="col-md-7">
							<div class="row">
								<div class="col-md-12">
                                    <div class="btn-group btn-toggle-s-1" data-toggle="buttons">
                                        <fieldset>
                                            <legend class="sr-only">Compensation &amp; other benefits not applicable or select option</legend>  
                                            <label class="radio showSalary">
												<input id="salaryshowingoptions1" value="yes" type="radio" name="mi_other_benefits" autocomplete="off">
												<span class="outer"><span class="inner"></span></span>
												<span id="SShowYes"> N A</span>
											</label>
                                        </fieldset>
                                    </div>
                                    </div>
                                </div>
							  
							    <div class="row row-enabled">
                                    <div class="col-md-12 mt-10">
                                        <fieldset>
                                            <legend class="sr-only">"Compensation &amp; other benefits not applicable or select option"</legend>
                                                <div class="wplace">
                                                    <div class="md-checkbox wp">
                                                        <input id="teacoffee" name="mi_other_benefits_option[]" value="Unlimited Tea/Coffee" type="checkbox">
                                                        <label for="teacoffee" class="">Unlimited Tea/Coffee</label>
                                                    </div>
                                                    <div class="md-checkbox wp">
                                                        <input id="mobilebill" name="mi_other_benefits_option[]" value="Mobile Bill" type="checkbox">
                                                        <label for="mobilebill" class="">Mobile Bill</label>
                                                    </div>
                                                    <div class="md-checkbox wp">
                                                        <input id="pension" name="mi_other_benefits_option[]" value="Pension Policy" type="checkbox">
                                                        <label for="pension" class="">Pension Policy</label>
                                                    </div>
                                                    <div class="md-checkbox wp">
                                                        <input id="tourallowance" name="mi_other_benefits_option[]" value="Tour allowance" type="checkbox">
                                                        <label for="tourallowance" class="">Tour allowance</label>
                                                    </div>
                                                    <div class="md-checkbox wp">
                                                        <input id="madical" name="mi_other_benefits_option[]" value="Medical allowance" type="checkbox">
                                                        <label for="madical" class="">Medical allowance</label>
                                                    </div>
                                                    <div class="md-checkbox wp">
                                                        <input id="Performancebonus" name="mi_other_benefits_option[]" value="Performance bonus" type="checkbox">
                                                        <label for="Performancebonus" class="">Performance bonus</label>
                                                    </div>
                                                    <div class="md-checkbox wp">
                                                        <input id="profit" name="mi_other_benefits_option[]" value="Profit share" type="checkbox">
                                                        <label for="profit" class="">Profit share</label>
                                                    </div>
                                                    <div class="md-checkbox wp">
                                                        <input id="provident" name="mi_other_benefits_option[]" value="Provident fund" type="checkbox">
                                                        <label for="provident" class="">Provident fund</label>
                                                    </div>
                                                    <div class="md-checkbox wp">
                                                        <input id="holidays" name="mi_other_benefits_option[]" value="Weekly 2 holidays" type="checkbox">
                                                        <label for="holidays" class="">Weekly 2 holidays</label>
                                                    </div>
                                                    <div class="md-checkbox wp">
                                                        <input id="overtime" name="mi_other_benefits_option[]" value="Over time allowance" type="checkbox">
                                                        <label for="overtime" class="">Over time allowance</label>
                                                    </div>
                                                    <div class="md-checkbox wp">
                                                        <input id="insurance" name="mi_other_benefits_option[]" value="Insurance" type="checkbox">
                                                        <label for="insurance" class="">Insurance</label>
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row row-enabled">
                                    <fieldset>
                                        <legend class="sr-only">"Compensation &amp; other benefits not applicable or select option"</legend>
                                        <div class="col-md-6">
                                            <div class="com-sub-title">Lunch Facilities</div>
                                            <div class="checkbox-toggle-group">
                                                <label class="radio showSalary">
                                                    <input id="lunchoptions1" value="Partially Subsidize" type="radio" name="mi_lunch_facility" autocomplete="off" <?php echo ($cjp_info['mi_lunch_facility'] == "Partially Subsidize" ? "checked='checked'" : "")?> >
                                                    <span class="outer"><span class="inner"></span></span>
                                                    <span id="LShowYes">Partially Subsidize</span>
                                                </label>
                                                
                                                <label class="radio showSalary">
                                                    <input id="lunchoptions2" value="Full Subsidize" type="radio" name="mi_lunch_facility" autocomplete="off" <?php echo ($cjp_info['mi_lunch_facility'] == "Full Subsidize" ? "checked='checked'" : "")?> >
                                                    <span class="outer"><span class="inner"></span></span>
                                                    <span id="LShowNo">Full Subsidize</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="com-sub-title">Salary Review</div>
                                        <div class="checkbox-toggle-group">
                                            <label class="radio showSalary">
                                                <input id="lunchoptions1" value="Half yearly" type="radio" name="mi_salary_review" autocomplete="off" <?php echo ($cjp_info['mi_salary_review'] == "Half yearly" ? "checked='checked'" : "")?> >
                                                <span class="outer"><span class="inner"></span></span>
                                                <span id="LShowYes">Half yearly</span>
                                            </label>
                                            
                                            <label class="radio showSalary">
                                                <input id="lunchoptions2" value="Yearly" type="radio" name="mi_salary_review" autocomplete="off" <?php echo ($cjp_info['mi_salary_review'] == "Yearly" ? "checked='checked'" : "")?> >
                                                <span class="outer"><span class="inner"></span></span>
                                                <span id="LShowNo">Yearly</span>
                                            </label>
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="com-sub-title">Festival Bonus</div>
                                        <select name="mi_festival_bonus" id="txtFestivalBonus" class="form-control form-control-s-1" data-value="16" data-id="" aria-label="Festival Bonus">
                                            <option value="">Select number of festival bonus</option>
                                            <option <?php echo ($cjp_info['mi_festival_bonus'] == "1" ? "selected='selected'" : "")?> value="1">1</option> 
                                            <option <?php echo ($cjp_info['mi_festival_bonus'] == "2" ? "selected='selected'" : "")?> value="2">2</option>
                                            <option <?php echo ($cjp_info['mi_festival_bonus'] == "3" ? "selected='selected'" : "")?> value="3">3</option>
                                            <option <?php echo ($cjp_info['mi_festival_bonus'] == "4" ? "selected='selected'" : "")?> value="4">4</option>
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="com-sub-title">Others</div>
                                            <textarea id="txtOthers" name="mi_others_benefits_name" maxlength="900" class="form-control form-control-s-1 popTips " rows="4" cols="30" placeholder="Write Other Benefits" data-toggle="popover" data-trigger="focus" ><?=$cjp_info['mi_others_benefits_name']?></textarea>
                                        </div>
                                    </fieldset>
                                </div>
						    </div>
						</div>
						<div class="card-footer">
						    <div class="row">
				
                                <div class="col-md-12">
                                    <div class="divider s-2 mb-30 mt-20"></div>
                                </div>

                                <div class="col-md-4 col-md-pull-8">
                                    <div class="btn-left">
                                        <a href="cjp-primary-info.php" class="btn btn-danger btn-lg"> Back </a>
                                    </div>
                                </div>
                    
                                <div class="col-md-8 col-md-push-4">
                                    <div class="btn-group-right">
                                        <button type="submit" name="submit" class="btn btn-info btn-lg step2draft" actionval="1"> Save & Continue </button>
                                        <!-- <button type="submit" name="submit" style="background: #b1318e; color: white;" class="btn btn-lg step2" actionval="0">&nbsp;Continue<i class="icon-angle-right icon-small"><span style="display:none;">Continue</span></i></button> -->
                                    </div>
                                </div>
						    </div>
					</form>
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
</div>
<?php include ('footer.php');?>