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

<div class="card-block">
                                                 <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Staff</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              Total Teacher</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                     

                    </div>
												   </div>            <!-- Page-Title -->
              
 
         <!-- content here -->
		 
		 <div class="row">
                   <div class="col-12">
                        <div class="card">
                 <div class="card-body">
<div data-example-id="hoverable-table" class="bs-example">

                <table class="table table-hover table-dark table-striped">
                    <thead class="thead-dark ">
                        <tr>
                            <th>NAME</th>
                           <!--<th>VIEW DETAILS</th>-->
							 <th>Phone</th>
                            <th>Email</th>
                            <th>Joining date</th>
                            <th>Desiganation</th>
							 <th>Address</th>
							 <th>Notes</th>
							 <th>Option</th>
                        </tr>
                    </thead>

					
					
					<?php
							  $queryv = mysqli_query($np2con,"SELECT * FROM staff 
							  inner join 
							  desiganation 
							  on  
							  staff.stf_desiganation = desiganation.d_id 
							  order by stf_user_id ASC");	
							  $montawd = array();
							  while ($rowc = mysqli_fetch_array($queryv)) { 
							  
						  
					  echo '
							  <tbody>

                        <tr>
                            
                            <td>'.$rowc['stf_name'].'</td>
                            <td>'.$rowc['stf_phone'].'</td>
                            <td>'.$rowc['stf_email'].'</td>
							<td>'.$rowc['stf_joining_date'].'</td>
                            <td>'.$rowc['d_name'].'</td>
                            <td>'.$rowc['stf_address'].'</td>
                            <td>'.$rowc['stf_notes'].'</td>
                           <td><a href="switch-account.php?id='.$rowc['stf_id'].'" class="btn btn-success btn-sm">Login</a></td>
                         
                         </tr>
                      
                    </tbody>
							  ';
							  
							  
							  }
							  
							  
							  
				//  <td><button type="button" class="btn btn-dark btn-transparent btn-theme-colored btn-sm" data-toggle="modal" 
							//data-target=".bs-example-modal-lg-68358">View</button> <button type="button" class="btn btn-dark btn-transparent btn-theme-colored btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg-68358">EDIT</button></td>
                        			  
							  
							 
							  
							  
							  ?>
					
					
					
                    
                </table>
         
            </div>

               </div>
               </div>
               </div>
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