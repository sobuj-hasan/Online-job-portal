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
		 
		 
		 <div class="col-xl-6">
					<div class="row"> 
         
					    <div class="col-xl-12">
                  
				  
				   <div class="card">
                            <div class="card-body new-user">
                                <h5 class="header-title mb-4 mt-0">Staff Attandance (<?php echo $cctime?>)</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Img</th>
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0">Punch.In</th>
                                                <th class="border-top-0">Punch.Out</th>
                                                <th class="border-top-0">Form</th>
                                          
                                            </tr>
                                        </thead>
										
										
										<?php
					$queryv = mysqli_query($np2con,"SELECT * FROM login_tracker INNER JOIN staff on staff.stf_id = login_tracker.lt_user
					Where lt_day = '".$day."'  AND lt_month = '".$month."'  AND lt_year = '".$year."' order by lt_id DESC");	
					while ($rowc = mysqli_fetch_array($queryv)) { 
					//echo '<p class="text-secondary mb-2">'.$rowc['lt_day'].'/'.$rowc['lt_month'].'/'.$rowc['lt_year'].'  at '.$rowc['lt_time'].'</p>';
					
					 $rer = '<tbody>
                                            <tr>
                                                <td>
                                                    <img class="rounded-circle" src="https://img.icons8.com/bubbles/50/000000/user-male.png" alt="user" width="30"/> </td>
                                                <td>
                                                    <a href="javascript:void(0);">'.$rowc['stf_id'].'</a>
                                                </td>
                                                <td style="color:green;">                                                                
                                                    11.00AM
                                                </td>                           
                                                <td  style="color:red;">
                                                    
													11.00PM
                                                </td>
                                                <td>
                                                 '.student_count_author($rowc['stf_id'],'today_form').'
                                                </td>
												
                                            </tr>
                                         
                                         
                                        </tbody>';
					
					}
					?>
										
										<?php
										
										
										
										
							  $queryv = mysqli_query($np2con,"SELECT * FROM staff  ORDER BY stf_user_id asc");	
							  //$montawd = array();
							  while ($rowc = mysqli_fetch_array($queryv)) { 
							  
							  echo '<tbody>
                                            <tr> 
                                                <td>
                                                    <img class="rounded-circle" src="https://img.icons8.com/bubbles/50/000000/user-male.png" 
													alt="user" width="30"> </td>
                                                <td>
                                                    <a href="javascript:void(0);">'.$rowc['stf_id'].'</a>
                                                </td>
                                                <td style="color:green;">';                                                                
                                                 $queryvm = mysqli_query($np2con,"SELECT * FROM login_tracker Where lt_user= '".$rowc['stf_id']."'
												AND lt_day = '".$day."'  AND lt_month = '".$month."'  AND lt_year = '".$year."' AND (lt_type = '1' OR lt_type = '0') order by lt_id DESC limit 1");	
												while ($rowcn = mysqli_fetch_array($queryvm)) {   
												echo ''.$rowcn['lt_day'].'/'.$rowcn['lt_month'].'/'.$rowcn['lt_year'].' '.$rowcn['lt_time'].'';
												}	
												echo' </td>                           
                                                <td style="color:red;">';                                                                
                                                $queryvm = mysqli_query($np2con,"SELECT * FROM login_tracker Where lt_user= '".$rowc['stf_id']."'
												AND lt_day = '".$day."'  AND lt_month = '".$month."'  AND lt_year = '".$year."' AND (lt_type = '2') order by lt_id DESC limit 1");	
												while ($rowcn = mysqli_fetch_array($queryvm)) {   
												echo ''.$rowcn['lt_day'].'/'.$rowcn['lt_month'].'/'.$rowcn['lt_year'].' '.$rowcn['lt_time'].'';
												}	
												echo' </td> 
                                                <td>
                                                 '.student_count_author($rowc['stf_id'],'today_form').'
                                                </td>
												
                                            </tr>
                                         
                                         
                                        </tbody>';
							  }?>
										
										
                                        
                                    </table>                                                
                                </div>
                            </div><!--end card-body-->
                        </div>
                    </div><!--end col-->
                    </div><!--end col-->
                    </div>
		 
		 
		  <!-- content here -->
		
		
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