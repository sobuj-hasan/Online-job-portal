<?php include('header.php');

include('admin-check.php');
//include('super-admin-check.php');
IF($di_stf_desiganation == 11 or $di_stf_desiganation == 5 or $di_stf_desiganation == 7){
include_once('admin-functions.php');    
}else {die();}
    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 50;
    	$startpoint = ($page * $limit) - $limit;
?>

  <body>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

           <?php include('top-nav.php') ?>
		   <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                       <?php include('sidebar.php') ?>

					
					<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                       
<div class="container-fluid">


         <!-- content here -->
		 <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-12" style="margin:0 auto;">
                        <div class="card">
                 <div class="card-body">
		   <div data-example-id="hoverable-table" class="bs-example">

	<h3>Admission Staff's Report</h3>
	 <form class="form-inline" method="post" name="searchfrm">
	 <div class="form-group"> 
	<select name="serch_day" class="form-control">
	<option value=""> Select Day</option>
	<?php
	for ($x = 1; $x <= 31; $x++) {
	echo '<option value="'.sprintf('%02d', $x).'"'; if(isset($_POST['serch_day'])){if($_POST['serch_day'] == sprintf('%02d', $x)){echo 'selected';}}echo '>'.$x.'</option>';	
	}
	?>
	</select>
	<select name="serch_month" class="form-control">
	<option value=""> Select Month</option>
	<?php
	for ($x = 1; $x <= 12; $x++) {
	echo '<option value="'.sprintf('%02d', $x).'"'; if(isset($_POST['serch_month'])){if($_POST['serch_month'] == sprintf('%02d', $x)){echo 'selected';}}echo '>'.date("F", mktime(0, 0, 0, $x, 10)).'</option>';	
	}
	?>
	</select>
	
	<select name="serch_year" class="form-control">
	<option value="2020"> 2020</option>
	<option value="2021"> 2021</option>
	</select>	
	</div>	
	
	<input  class="form-control btn btn-success" type="submit" value="Submit" />
	</form>	
	
	


<?php
				$Selectet_month = date('m');
				if(isset($_POST['serch_month'])){
				$Selectet_month = $_POST['serch_month'];
				$serch_month_stmnt = "AND st_join_month = '".$_POST['serch_month']."' ";	
				}else {
				$serch_month_stmnt = '';
				$Selectet_month = date('m');}
				
				
				$Selectet_day = 'dayunset';
				if(isset($_POST['serch_day'])){
				$Selectet_day = $_POST['serch_day'];
				$serch_day_stmnt = "AND st_join_day = '".$_POST['serch_day']."'  ";	
				}else {
				$serch_day_stmnt = '';
				$Selectet_day = 'dayunset';}
				
				$Selectet_year = '2020';
				if(isset($_POST['serch_year'])){
				$Selectet_year = $_POST['serch_year'];
				$serch_year_stmnt = "AND st_join_year = '".$_POST['serch_year']."'  ";	
				}else {
				$serch_year_stmnt = '';
				$Selectet_year = '2020';}
?>
<h4> DAY: <b><?php echo $Selectet_day?></b> | MONTH: <b><?php echo date("F", mktime(0, 0, 0, $Selectet_month, 10))?> (<?php echo $Selectet_month?>)</b> | YEAR: <b><?php echo $Selectet_year?></b></h4>
                <table class="table table-hover">
                    <thead style="background:#ccc;">
                        <tr>
                            <th>COUNS. NAME</th>
                           <!--<th>VIEW DETAILS</th>-->
							 <th>TOTAL AD</th>
                            <th style="background: aquamarine;"><?php echo date("F", mktime(0, 0, 0, $Selectet_month, 10))?> (ADM)</th>
                            <th style="background: aquamarine;"><?php echo date("F", mktime(0, 0, 0, $Selectet_month, 10))?> (FORM) </th>
                            <th>TODAY AD</th>
							 <th>TODAY FORM</th>
							 <th>SUCCESS RATE</th>
							 <th>FAILURE RATE</th>
							 
							 <th>Collection This Month</th>
							 <th>Collection Prev Month</th>
                        </tr>
                    </thead>

					
					
					<?php
					
				
					
					
							  $queryv = mysqli_query($np2con,"SELECT * FROM staff where stf_type ='1'");	
							  $montawd = array();
							  while ($rowc = mysqli_fetch_array($queryv)) { 
							  
						  
					  
							  
							  if($rowc['stf_type'] != '0'){
							$mntly_admited = student_count_author($rowc['stf_id'],'admission_this_month');
							 $montawd[''.$rowc['stf_id'].''] = $mntly_admited;  
							  }}
							  
							  
							  arsort($montawd);
							  $cnt =1;
							  $total_collection_this_month = 0;
							  $total_collection_prev_month = 0; 
							  foreach ($montawd as $key => $value){
								  
								  
						/* if($Selectet_day == 'dayunset'){
						  $form_this_month = student_count_author($key,'form_this_month');
						}	else {	
						 $form_this_month = student_count_author($key,'Month',$Selectet_day,$Selectet_month);	
						} */
						
						
	$admission_this_month = student_count_author($key,'Month','dayunset',$Selectet_month);
	 $form_this_month = student_count_author($key,'form_this_month');					 
	if($Selectet_day != 'dayunset' AND $Selectet_day != '' ){
	$admission_this_month = student_count_author($key,'search_day_admission',$Selectet_day,$Selectet_month,$Selectet_year);	
	$form_this_month = student_count_author($key,'search_day_form',$Selectet_day,$Selectet_month,$Selectet_year);	
	}else{
	
	}

 
	if($admission_this_month < 1 ){
	$success_rate	= 0;
	}else {
	$success_rate = round(($admission_this_month)/($form_this_month)*(100),0);	
		
	}
	$failure_rate = 100-$success_rate;
	
	//$success_rate = round($admission_this_month/$form_this_month*100,0);
	//$admission_this_month = student_count_author($key,'admission_this_month');
	//$previous_month = student_count_author($key,'previous_month');
	//$progress_rate = round($admission_this_month/$previous_month*100,0);				  
								  
								
								$this_month_Collection = get_counselor_amount_collection($key,'this_month_Collection');
								  $stdn_this = $this_month_Collection/1000;
								 $total_collection_this_month = $total_collection_this_month+$this_month_Collection;
								   
								   
								  
								$prev_month_Collection = get_counselor_amount_collection($key,'prev_month_Collection');
								  $stdn_prev = $prev_month_Collection/1000;
								 $total_collection_prev_month = $total_collection_prev_month+$prev_month_Collection;
								 
								 
							echo '
							  <tbody>

                        <tr>
                            
                            <td><a href="staff-statement.php?stf='.$key.'">'.$key.'</a></td>
                         
                            <td><span class="label label-success btn-sm">'.student_count_author($key,'all').'</span></td>
                            <td><span class="label label-success btn-sm">'.$admission_this_month.'</span></td>
                            <td><span class="label label-success btn-sm">'.$form_this_month.'</span></td>
							<td><span class="label label-success btn-sm">'.student_count_author($key,'today_admission').'</span></td>
                            <td><span class="label label-warning btn-sm">'.student_count_author($key,'today_form').'</span></td>
                            <td><span class="label label-info btn-sm">'.$success_rate.'%</span></td>
                             <td><span class="label label-danger btn-sm">'.$failure_rate.'%</span></td>
							<td>
							
							<span class="label label-success btn-sm">TK.'.$this_month_Collection.'</span>   
							<span class="label label-success btn-sm">ST.'.$stdn_this.'</span>
							
							</td>
							<td>
							
							<span class="label label-info btn-sm">TK.'.$prev_month_Collection.'</span>
							<span class="label label-info btn-sm">ST.'.$stdn_prev.'</span>
							</td>
                           
                           
                         </tr>
                      
                    </tbody>
							  ';
								$cnt++; 
							  }
							  
							  
				//  <td><button type="button" class="btn btn-dark btn-transparent btn-theme-colored btn-sm" data-toggle="modal" 
							//data-target=".bs-example-modal-lg-68358">View</button> <button type="button" class="btn btn-dark btn-transparent btn-theme-colored btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg-68358">EDIT</button></td>
                        			  
							  
							 
							echo '
							  <tbody>

                        <tr style="background: #795548;">
                            
                            <td></td>
                         
                            <td></td>
                            <td></td>
                            <td></td>
							<td></td>
                            <td></td>
                            <td></td>
                             <td></td>
							<td><span class="label label-success btn-sm">TK.'.number_format($total_collection_this_month,2).'</span></td>
							<td><span class="label label-success btn-sm">TK.'.number_format($total_collection_prev_month,2).'</span></td>
                           </tr> </tbody>
							  ';  
							  
							  ?>
					
					
					
                    
                </table>

            </div>
        
				
				

  </div>
               </div>
               </div>
             </div> <!-- end container -->
       
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

   <?php include('footer.php') ?>