<?php include('header.php') ?>
<!--Inner Content start-->
<div class="inner-content loginWrp">
  <div class="container"> 
    <!--Register Start-->
    <div class="row">
      <div class="col-md-3 col-sm-2"></div>
      <div class="col-md-6 col-sm-8">
	  
	  
        <div class="login" style="border-radius: 10px;">
          <h1><center><div class="contctxt">Scholarship form</div></center></h1>
		  
			
          <div class="formint conForm">
            <form method="post" action="">

<hr>
     				  <?php
					  
									  $msgntf = "Congratulations!!
Welcome To Pixel IT
Reg:1111
Pass:121212";
					//sendSMS('8809612737373','01911059426',$msgntf);
				  if(isset($_POST['submitf'])){
					  $errors = array();
					$student_name = $_POST['student_name'];
					$father_name = $_POST['father_name'];
					//$mother_name = $_POST['mother_name'];
					$mobile = $_POST['mobile'];
					//$Address = $_POST['Address'];
					$Facebook = $_POST['Facebook'];
					$paymethod = $_POST['paymethod'];
					$education = $_POST['education'];
					$course = $_POST['course'];
					$st_sex = $_POST['gender'];
					$st_pass = rand(1111,9999);
					
					$snd_sms_num = convert_bangla_number($mobile);
					$snd_sms_num = preg_replace('/[+]88/', "", $snd_sms_num);
					$snd_sms_num = preg_replace('/[+]8/', "", $snd_sms_num);
					$snd_sms_num = preg_replace('/[+]/', "", $snd_sms_num);
					$count_num = strlen($snd_sms_num);
					
					//$bath_number = $_POST['bath_number'];
					$bath_number = 00;
					//$certificat_recive_by = $_POST['certificat_recive_by'];
					$Reffrance_name = $_POST['Reffrance_name'];
					//$db = $_POST['db_year'].'-'. sprintf("%02d", $_POST['db_month']).'-'.sprintf("%02d", $_POST['db_day']);
					
					$db = $_POST['db'];
					//$registration_number = rand(111111111,999999999);
					
					
					if($count_num == 11)
					{}else {
						$errors[] = 'আপনার মোবাইল নাম্বারটি সঠিক নয় ';
					}
					if($student_name > 4)
					{$errors[] = 'আপনার নামটি  সঠিক নয় ';
					}
	
					
					$st_id = 0;
					$sqlus = "SELECT st_id FROM online_students Order by st_id DESC limit 1";
					$resultus = mysqli_query($np2con,$sqlus);
					while($row = mysqli_fetch_assoc($resultus)){
					$st_id = $row['st_id'];	
					}
					$registration_number = $st_id + 2920;
					
					
					$sdas = '';
					if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
					{
					foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
					{
						$sdas .= '' . $value . '<br>'; /* this generates a nice error list */
					}	
						echo gen_notifi($sdas,'alert-danger');	
					}
					
					else{
					$query = 'SELECT COUNT(*) as `num` FROM online_students WHERE st_course_name = "'.$course.'" 
					AND st_phone = "'.$snd_sms_num.'" AND st_batch_number = "'.$bath_number.'"  AND st_name = "'.$student_name.'" ';
						$row = mysqli_fetch_array(mysqli_query($np2con,$query));
							$submitted = $row['num'];
					//if($submitted == $submitted ){
					if($submitted < 1){
					$sql = "INSERT INTO online_students (`st_name`, `st_father_name`, `st_phone`, `st_pass`, `st_join_date`, `st_join_day`, `st_join_month`, `st_join_year`, `st_db`, `st_course_name`,`st_course_duration`,  `st_sex`, `st_batch_number`, `st_facebook`, `st_payment_method`, `st_education`, `st_registration_number`, `st_reference_name`)
						VALUES ('".$student_name."','".$father_name."','".$snd_sms_num."','".$st_pass."','".$cctime."','".$day."','".$month."','".$year."','".$db."','".$course."','2m','".$st_sex."','".$bath_number."','".$Facebook."','".$paymethod."','".$education."','".$registration_number."','".$Reffrance_name."')";
						//echo $sql;
						
						if ($np2con->query($sql) === TRUE) {
						
						///upadete reg
						$last_id = $np2con->insert_id;
						if(isset($last_id) AND $last_id > 0){
						$new_reg = $last_id + 2920;
						$sql = "UPDATE online_students SET st_registration_number = '{$new_reg}' WHERE st_id = {$last_id}";
						if (mysqli_query($np2con,$sql)){}
						$registration_number = $new_reg;		
						}
			
					$_SESSION['pix_student_signed_in'] = true;
					$_SESSION['pix_student_user_id'] 	=  $last_id;		
					$_SESSION['pix_student_reg_no'] 	=  $registration_number;		
						
					echo alert('Form Successfully Submitted!!');	
/* $msgntf = "Congratulations!!
Welcome To Ejobs
Reg:".$registration_number."
Pass:".$st_pass."";
					sendSMS('8809612737373',$snd_sms_num,$msgntf); */
					echo '<script>
					setTimeout(function(){window.location = "success.php?token='.bin2hex($registration_number).'&tkt='.bin2hex($st_pass).'"},1000);
					</script>';
						}else{echo ntf('Something is Wrong!',0);	}	
					}else {
					echo alert('Form Already Submitted!!');		
					}
					
					}
				  
				  }
				  
				  ?>

<div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                     <label for="">Name:</label>
                          <input name="student_name" value="<?php if(isset($student_name)){echo $student_name;}?>" type="text" placeholder=" " required="" class="form-control" >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Father's Name: </label>
                          <input name="father_name" value="<?php if(isset($father_name)){echo $father_name;}?>"  class="form-control required" type="text" placeholder=" ">
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                     <label for="">Mobile Number:</label>
                          <input name="mobile" value="<?php if(isset($mobile)){echo $mobile;}?>"  type="text" placeholder=" " required="" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Gender:</label>
                               <select name="gender" class="form-control required" required="">
                            <option value="" selected="">select </option>
                            <option value="1"   <?php if(isset($st_sex) AND $st_sex =='1') {echo 'selected';}?>>Male </option>
                            <option value="0"  <?php if(isset($st_sex) AND $st_sex =='0') {echo 'selected';}?>>Female </option>		
                          </select>
                       
						 
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Course: </label>
                       <select name="course" class="form-control required" required="">
						  <option value="" selected>Select Course</option>
                          
					
							<?php
			$query = mysqli_query($np2con,"
			SELECT * FROM online_courses ");
			$cntnum = mysqli_num_rows($query );
			while ($row = mysqli_fetch_array($query)) {
			if($row['oc_status'] == 0){$status = 'disabled';$boostatus = ' (Booked)';}else{$status = '';$boostatus = '';}	
			if($row['oc_visibility'] == 1){
			echo '<option value="'.$row['oc_id'].'" '.$status.'>'.$row['oc_name'].''.$boostatus.'</option>';}
			}
					  ?>
                          </select>
                        </div>
                      </div>
					      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Facebook ID Name:  </label>
                          <input name="Facebook" value="<?php if(isset($Facebook)){echo $Facebook;}?>"  class="form-control required" type="text" placeholder=" ">
                        </div>
                      </div>
                    </div>	

		<div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                     <label for="">Date of birth: </label>
                            <input name="db" value="<?php if(isset($db)){echo $db;}?>"  class="form-control required" 
							type="date" placeholder=" ">
                        
						</div>
                      </div>
					  
					  <div class="col-sm-6">
                        <div class="form-group">
                       <label>Reference: </label>
                               <select name="Reffrance_name" class="form-control required" required="">
                            <option value="" selected>Select</option>	
							
							<?php
			$queryv = mysqli_query($np2con,"
			SELECT * FROM staff ");
			//$cntnum = mysqli_num_rows($queryv);
			while ($rowv = mysqli_fetch_array($queryv)) {
			if($rowv['stf_type'] == 1){
			echo '<option value="'.$rowv['stf_id'].'">'.$rowv['stf_name'].'</option>';
			}
			}
					  ?>
							
						  
						  </select>
                        </div>
                      </div>
                  
                    </div>	
							<div class="row">
                
                      <!--<div class="col-sm-6">
                        <div class="form-group">
                          <label>Batch Number:</label>
                          <input name="bath_number" value="<?php if(isset($bath_number)){echo $bath_number;}?>"  class="form-control required" type="text" placeholder=" ">
                        </div>
                      </div>-->
					  
					        
                    </div>	
							<div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                     <label for="">Payment Method:</label>
                          <select name="paymethod" class="form-control required" required="">
                            <option value="" selected="">সিলেক্ট করুন </option>
                            <option value="" selected="">Select </option>
                            <option value="bkash">বিকাশ </option>
                            <option value="rocket">রকেট </option>	
                            <option value="nexus">নেক্সাস পে  </option>	
                            <option value="nagad">নগদ  </option>	
                            <option value="dbbl">ডাচ বাংলা ব্যাংক   </option>		
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Education: </label>
                          <select name="education" class="form-control required" required="">
                            <option value="">Select </option>
                            <option value="jsc"  <?php if(isset($education) AND $education =='jsc') {echo 'selected';}?>>JSC</option>
                            <option value="ssc"  <?php if(isset($education) AND $education =='ssc') {echo 'selected';}?>>SSC</option>
                            <option value="hsc"  <?php if(isset($education) AND $education =='hsc') {echo 'selected';}?>>HSC</option>	
                            <option value="honours"  <?php if(isset($education) AND $education =='honours') {echo 'selected';}?>>Honours</option>	
                            <option value="masters"  <?php if(isset($education) AND $education =='masters') {echo 'selected';}?>>Masters</option>	
                            <option value="degree"  <?php if(isset($education) AND $education =='degree') {echo 'selected';}?>>Degree</option>	
							<option value="ba"  <?php if(isset($education) AND $education =='ba') {echo 'selected';}?>>B.A</option>
								<option value="barch"  <?php if(isset($education) AND $education =='barch') {echo 'selected';}?>>BArch</option>
								<option value="bm"  <?php if(isset($education) AND $education =='bm') {echo 'selected';}?>>BM</option>
								<option value="bfa"  <?php if(isset($education) AND $education =='bfa') {echo 'selected';}?>>BFA</option>
								<option value="bsc"  <?php if(isset($education) AND $education =='bsc') {echo 'selected';}?>>B.Sc.</option>
								<option value="ma"  <?php if(isset($education) AND $education =='ma') {echo 'selected';}?>>M.A.</option>
								<option value="mba"  <?php if(isset($education) AND $education =='mba') {echo 'selected';}?>>M.B.A.</option>
								<option value="mfa"  <?php if(isset($education) AND $education =='mfa') {echo 'selected';}?>>MFA</option>
								<option value="msc"  <?php if(isset($education) AND $education =='msc') {echo 'selected';}?>>M.Sc.</option>
								<option value="jd"  <?php if(isset($education) AND $education =='jd') {echo 'selected';}?>>J.D.</option>
								<option value="md"  <?php if(isset($education) AND $education =='md') {echo 'selected';}?>>M.D.</option>
								<option value="phd"  <?php if(isset($education) AND $education =='phd') {echo 'selected';}?>>Ph.D</option>
								<option value="llb"  <?php if(isset($education) AND $education =='llb') {echo 'selected';}?>>LLB</option>
								<option value="llm"  <?php if(isset($education) AND $education =='llm') {echo 'selected';}?>>LLM</option>
								<option value="diploma"  <?php if(isset($education) AND $education =='diploma') {echo 'selected';}?>>Diploma</option>
								<option value="other"  <?php if(isset($education) AND $education =='other') {echo 'selected';}?>>Other</option>
                          </select>
						</div>
                      </div>
                    </div>	

<div class="">
<label> 
<input type="checkbox" checked required> Course fees are not refundable after admission.

</label>
</div>
<input  type="submit"  name="submitf" class="btn btn-block btn-success btn-sm mt-20 pt-10 pb-10"  value="SUBMIT"></button>
</form>
<br><br>
          </div>
        </div>
      
	
	  </div>
      <div class="col-md-3 col-sm-2"></div>
    </div>
    
    <!--Register End--> 
</div>
</div>
<!--Inner Content End--> 
<?php include('footer.php') ?>