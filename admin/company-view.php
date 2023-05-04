<?php
include ('header.php');

  $ac_id = $_GET['ac_id']; 

	if(isset($_POST['submit'])){
   
    	$update_query = "UPDATE all_company SET ac_cmp_status = 'active' WHERE ac_id = '$ac_id'";
		$profile_update = mysqli_query($np2con, $update_query);
		$_SESSION['company_approved_status'] = "This Company Successfully Updated!";
	}

  // Total Company infomation 
  $select_query = "SELECT * FROM all_company WHERE ac_id = '$ac_id'";
  $company_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

?>
<body>
   <div class="container-scroller">
   		<?php include ('nav.php');?>
   		<!-- partial -->
   		<div class="container-fluid page-body-wrapper">
   			<div class="main-panel">
   				<div class="content-wrapper">
      				<!-- eBazar Left Side profile and menu -->
  					<div class="row">
     					<div class="col-md-12 grid-margin">
        					<div class="col-12">
          						<div class="card">
          							<div class="card-header bg-secondary">
          								<h4 class="card-title">( <?php echo $company_info['ac_cmp_name']; ?> ) Company Profile</h4>
          							</div>
          							<?php
			                          if(isset($_SESSION['company_approved_status'])){
			                          ?>
			                            <div class="alert alert-success mt-2">
			                              <?php
			                                  echo $_SESSION['company_approved_status'];
			                                  unset($_SESSION['company_approved_status']);
			                              ?>
			                            </div>
			                            <?php
			                            }
			                          ?>
            						<div class="card-body">
					                  		<div class="row">
					                            <div class="col-sm-6 mt-2">
					                               <div class="form-group" id="companyname">
					                                  <h6 for="txtCompanyName">Company Name:</h6>
					                                  <span><?= $company_info['ac_cmp_name'] ?></span>
					                               </div>
					                            </div>
					                            <div class="col-sm-6 mt-2">
					                               <div class="form-group">
					                                  <h6 for="txtCompanyBangla" class="bn">কোম্পানির নাম (বাংলায়):</h6>
					                                  <span><?= $company_info['ac_cmp_name_bangla'] ?></span>
					                               </div>
					                            </div>
					                        </div>
					                        <div class="row">
					                            <div class="col-sm-6 mt-2">
					                               <div class="form-group" id="CompanyEstablished">
					                                  <h6 for="txtCompanyEstablished">Year of Establishment:</h6>
					                                  <span><?= $company_info['ac_cmp_establish'] ?></span>
					                               </div>
					                            </div>
					                            <div class="col-sm-6 mt-2">
					                               <div class="form-group">
					                                  <h6 for="ComSize">Company Size:</h6>
					                                  <span><?= $company_info['ac_cmp_size'] ?></span>
					                               </div>
					                            </div>
					                        </div>

					                        <h4 class="company-address">Company Address*</h4>
					                        <div class="address-wrap">
					                            <div class="row">
					                               <div class="col-sm-6 mt-2">
					                                  <div class="form-group">
					                                    <h6 for="Country" class="visuallyhidden">Country Name:</h6>
					                                    <span><?= $company_info['ac_cmp_country'] ?></span>
					                                  </div>
					                               </div>
					                               <div class="col-sm-6 mt-2">
					                                  <div class="form-group">
					                                    <h6 for="Country" class="visuallyhidden">Company Status:</h6>
					                                    <span style="cursor: text;" class="btn btn-info"><?= $company_info['ac_cmp_status'] ?></span>
					                                  </div>
					                               </div>
					                            </div>
					                            <div class="row">
					                               <div class="col-sm-6 select-wrap mt-2">
					                                  <div class="form-group">
					                                     <h6 for="cboCity" class="visuallyhidden">Distrcit Name:</h6>
					                                     <span><?= $company_info['ac_cmp_district'] ?></span>
					                                  </div>
					                               </div>
					                               <div class="col-sm-6 select-wrap mt-2">
					                                  <div class="form-group">
					                                     <h6 for="txtOrganizationName" class="visuallyhidden">Thana Name:</h6>
					                                     <span><?= $company_info['ac_cmp_thana'] ?></span>
					                                  </div>
					                               </div>
					                            </div>
					                            <div class="row">
					                               <div class="col-sm-6 select-wrap mt-2">
					                                  <div class="form-group">
					                                     <h6 for="txtCompanyAddress" class="visuallyhidden">Company address in english</h6>
					                                     <span><?= $company_info['ac_cmp_address'] ?></span>
					                                  </div>
					                               </div>
					                               <div class="col-sm-6 select-wrap mt-2">
					                                  <div class="form-group">
					                                     <h6 for="txtCompanyAddressBng" class="visuallyhidden">Company address in bangla</h6>
					                                     <span><?= $company_info['ac_cmp_address_bangla'] ?></span>
					                                  </div>
					                               </div>
					                            </div>
					                            <!--this is testing html end-->
					                        </div>

					                        <h4 class="industry-type">Industry Type*</h4>
					                        <div class="row">
					                            <div class="col-sm-6 mt-2">
					                               <div class="form-group">
					                                  <h6 for="optIndustryType" class="visuallyhidden">Industry Category:</h6>
					                                  <span><?= $company_info['ac_cmp_category'] ?></span>
					                               </div>
					                            </div>
					                            <div class="col-sm-6 mt-2">
					                               <div class="form-group">
					                                  <h6 for="txtOrganizationName" class="visuallyhidden">Industry Type:</h6>
					                                  <span><?= $company_info['ac_cmp_type'] ?></span>
					                               </div>
					                            </div>
					                        </div>

						                    <div class="business">
								                <div class="form-group">
								                	<h6 for="txtDescription">Business Description:</h6>
								                	<span><?= $company_info['ac_cmp_discription'] ?></span>
								                </div>
								                <div class="row">
									                <div class="col-sm-6 mt-2">
										                <div class="form-group">
										                	<h6 for="business_license_no">Business/ Trade License No:</h6>
										                	<span style="cursor: text;" class="btn btn-info"><?= $company_info['ac_cmp_trade_license'] ?></span>
										                </div>
									                </div>
									                <div class="col-sm-6 mt-2">
										                <div class="form-group">
										                	<h6 for="business_license_no">RL No (Only for Recruiting Agency):</h6>
										                	<?php
    										                	if($company_info['ac_cmp_rl_agency']){
    										                	  ?>
    										                	  <span style="cursor: text;" class="btn btn-info"><?= $company_info['ac_cmp_rl_agency'] ?></span>  
    										                	  <?php
    										                	}
										                	?>
										                </div>
									                </div>
									                <div class="col-sm-12 mt-2">
										                <div class="form-group">
										                	<h6 for="website_url">Website Link:</h6>
										                	<a target="blank" href="<?= $company_info['ac_cmp_website_url'] ?>"><?= $company_info['ac_cmp_website_url'] ?></a>
										                </div>
									                </div>
								                </div>
						                    </div>

						                    <h4 class="primary-contact">Primary Contact*</h4>
						                    <div class="row">
							                    <div class="col-sm-6 mt-2">
								                    <div class="form-group">
								                    	<h6 for="txtContactPerson">Contact Person's Name:</h6>
								                    	<span><?= $company_info['ac_cmp_person_name'] ?></span>
								                    </div>
							                    </div>
							                    <div class="col-sm-6 mt-2">
								                    <div class="form-group">
								                    	<h6 for="txtDesignation">Contact Person's Designation:</h6>
								                    	<span><?= $company_info['ac_cmp_person_desig'] ?></span>
								                    </div>
							                    </div>
						                    </div>
						                    <div class="row">
							                    <div class="col-sm-6 mt-2">
							                    	<div class="form-group">
							                    		<h6 for="txtContactEmail">Contact Person's Email:</h6>
							                    		<span><?= $company_info['ac_cmp_person_email'] ?></span>
							                    	</div>
							                    </div>
							                    <div class="col-sm-6 mt-2">
							                    	<div class="form-group">
							                    		<h6 for="txtContactMobile">Contact Person's Mobile:</h6>
							                    		<span><?= $company_info['ac_cmp_phone'] ?></span>
							                    	</div>
							                    </div>
						                    </div>
						                    <form action="" method="POST">
						                    	<div class="text-center">
						                    		<?php
						                    			// Total Company infomation 
														$select_query = "SELECT ac_cmp_status FROM all_company WHERE ac_id = '$ac_id'";
														$company_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));
														if ($company_info['ac_cmp_status'] == "pending") {
															echo '.<button type="submit" name="submit" class="btn btn-success p-3 mt-4 mr-2"> Approved Company </button>.';
														}else{
															echo '.<a href="company-management.php" class="btn btn-success p-3 mt-4"><i class="fa fa-angle-double-left"></i> Back </a>.';
														}
						                    		?>
						                    		<a href="#" class="btn btn-danger p-3 mt-4"> Delete Company <i class="icon-angle-right"></i></a>
						                    	</div>
						                    </form>
									        <div class="row">
									        </div>
	    								</div>
						</div>
					</div>
   				</div>
   			</div>
   		</div>
   </div>
<?php include ('footer.php');?>