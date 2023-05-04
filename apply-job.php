<?php 
include('header.php');
if(isset($_SESSION['ejob_signed_in']) AND $_SESSION['ejob_signed_in'] == true)
{
	
}else {
echo reloader('login.php',100);
die();	
}
$page = "cvpage";
	
	$jp_id = $_GET['jp_id'];
	// Total Job Post infomation 
  	$select_query = "SELECT * FROM company_jp INNER JOIN all_company on all_company.ac_id = company_jp.cjp_cmp_id WHERE id = $jp_id";
  	$jobpost_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

  	$auth_user_id = $_SESSION['snm_ejob_user_id'];
	// all job post show query 
	$select_query = "SELECT * FROM users INNER JOIN user_cv on user_cv.ucv_user_id = users.user_id WHERE user_id = '$auth_user_id'";
	$user_all_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

	// insert information for CV droped
	$job_post_id = $jobpost_info['id'];
	$cmp_author_id = $jobpost_info['cmp_author_id'];
	$cmp_id = $jobpost_info['ac_id'];



?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>Apply Here</h3>
  </div>
</div>
<!--inner heading end--> 

<!--Inner Content start-->
<div class="inner-content loginWrp resumeWrp">
  	<div class="container"> 
    
    	<!--Latest Resumes Start-->
    	<div class="row">
      		<div class="col-md-9 col-sm-8">

	        	<div class="boxed-s" id="main">
				   <div class="row">
				      <div class="col-sm-12">
				         <div class="b-cont-wrap">
				            <div class="b-left">
				               <div class="b-left-content">
				                  <div class="row">
				                     <div id="fromAdvance">
				                        <div class="col-sm-12">
				                           <div class="apply-wrap" id="main">
				                              <form action="" method="POST">

				                                 <div class="soapp-wrap bn">
				                                    <div class="h-title" role="main">Submit application online</div>
				                                    
				                                    
				                                    <?php
				         		                                    
		
                                                		if(isset($_POST['submit'])){
                                                        $ucv_id = htmlspecialchars($_POST['ucv_id']);
                                                        $expected_salary = htmlspecialchars($_POST['expected_salary']);
                                                        
                                                        $query_notifi = 'SELECT COUNT(ucv_id) as `num` FROM applied_job WHERE job_post_id = "'.$job_post_id.'" AND ucv_user_id = "'.$auth_user_id.'"';
                                                        $row = mysqli_fetch_array(mysqli_query($np2con,$query_notifi));
                                                        $bacckcount = $row['num']; 
                                                        if($bacckcount < 1){
                                                         $insert_query = "INSERT INTO `applied_job` (`job_post_id`, `cmp_author_id`, `cmp_id`, `ucv_user_id`, `ucv_id`, `expected_salary`) VALUES ('$job_post_id', '$cmp_author_id', '$cmp_id', '$auth_user_id', '$ucv_id', '$expected_salary')";
                                                        //$apply_info = mysqli_query($np2con, $insert_query);
                                                        if(mysqli_query($np2con, $insert_query)){
                                                        echo gen_notification('successfully applied.','success');
                                                        echo reloader('apply-confirm.php',1000);
                                                        }else {
                                                         echo gen_notification('Faild To apply.','danger');   
                                                        }
                                                           
                                                        }
                                                        
                                                    }
                                                				                                  
                                                     	$query_notifi = 'SELECT COUNT(ucv_id) as `num` FROM applied_job WHERE job_post_id = "'.$job_post_id.'" AND ucv_user_id = "'.$auth_user_id.'"';
                                                        $row = mysqli_fetch_array(mysqli_query($np2con,$query_notifi));
                                                        $bacck = $row['num'];                 
                         
				                                    ?>
				                                    
				                                    
				                                    <?php 
				                                    
				                                    
				                                    
				                                    if($bacck < 1){   
				                                    ?>
				                                    <div class="content">
				                                       <div class="u-info">
				                                          <div class="row">
				                                             <div class="col-sm-3 col-sm-push-9">
				                                                <div class="com-logo"></div>
				                                             </div>
				                                             <div class="col-sm-9 col-sm-pull-3">
				                                                <div class="row voffset">
				                                                   <div class="col-sm-5 no-pad-r">Account Name:</div>
				                                                   <div class="col-sm-7 no-pad-l">
				                                                      <div class="s-b"><?php echo ($user_all_info['ucv_phone'] == "" ? "আপনার একাউন্ট এ সিভি তৈরী করা নেই । <a class='btn btn-info' href='dashboard/add-cv.php'>সিভি তৈরী করুন ?</a>" : $user_all_info['ucv_phone'])?></div>
				                                                   </div>
				                                                </div>
				                                                <div class="row voffset">
				                                                   <div class="col-sm-5 no-pad-r">Company Name:</div>
				                                                   <div class="col-sm-7 no-pad-l">
				                                                      <div class="s-b"><?=$jobpost_info['ac_cmp_name']?></div>
				                                                   </div>
				                                                </div>
				                                                <div class="row voffset">
				                                                   <div class="col-sm-5 no-pad-r">Select Resume:</div>
				                                                   <div class="col-sm-7 no-pad-l">
				                                                      	<select id="cmbMinExp" class="form-control form-control-s-1 on-click-disabled" name="ucv_id">
				                                                      		<?php
				                                                      			$select_query = "SELECT * FROM user_cv WHERE ucv_user_id = $auth_user_id";
													  																				$user_cv_info = mysqli_query($np2con, $select_query);
													  																				foreach ($user_cv_info as $user_single_cv) {
													  																					?>
													  																					<option class="s-b" value="<?=$user_single_cv['ucv_id']?>"><?=$user_single_cv['ucv_title']?></option>
													  																					<?php
													  																				}
													  																				if($user_single_cv == ""){
													  																					?>
													  																					<option value="Web Design Resume">Please add a CV in your account !</option>
													  																					<?php
													  																				}
				                                                      		?>
								                                    	</select>
				                                                   </div>
				                                                </div>
				                                                <div class="row voffset">
				                                                   <div class="col-sm-5 no-pad-r">Your Expected Salary </div>
				                                                   <div class="col-sm-7 no-pad-l">
				                                                      <div class="exsal">
				                                                      	<input type="text" size="10" maxlength="8" class="form-control" placeholder="ex. 10000" name="expected_salary" required> <span>(Monthly)</span>
				                                                      </div>
				                                                   </div>
				                                                </div>
				                                             </div>
				                                          </div>
				                                          <hr>
				                                          <div class="row">
				                                             <div class="col-sm-12">
				                                                <div class="btn-wrap">
				                                                	<button class="btn app-btn" type="submit" name="submit" style="background-color:#38853A;border-color:#38853A;" aria-label="apply button for submit">Apply Now</button>
				                                                	<a class="btn ccel-btn" href="http://localhost/online-job-portal" aria-label="close button for not inerested">Close</a>
				                                                </div>
				                                             </div>
				                                          </div>
				                                       </div>
				                                    </div>
				                                    
				                                    <?php }
				                                    
				                                    else {
				                                        
				                                    if(isset($_POST['submit'])){}else{    
				                                    echo gen_notification('already applied to job.','danger'); 
				                                    }   
				                                          
				                                    }
				                                    ?>
				                                    
				                               
				                               
				                                    
				                                    
				                                    
				                                 </div>

				                              </form>
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

				<div style="margin-top: 50px;" class="add-show">
					<img width="840px" height="220px;" src="images/add-2.png">
				</div>

      		</div>
    		<div class="col-md-3 col-sm-4">
    			<img src="images/ad.jpg">
     		</div>
     		<div style="margin-top: 20px;" class="col-md-3 col-sm-4">
    			<img width="250px;" height="128px;" src="images/add-4.jpg">
     		</div>
    	</div>
    <!--Latest Resumes End--> 
  	</div>
</div>
<!--Inner Content End--> 
<?php include('footer.php') ?>
