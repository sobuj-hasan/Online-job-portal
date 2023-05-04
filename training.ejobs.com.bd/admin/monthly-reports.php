<?php include('header.php');

include('admin-check.php');
//owner panel
if($di_stf_desiganation == 11 ){
include('admin-functions.php');    
}
else{
include('super-admin-check.php');    
}
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
                                                            <div class="col-lg-4 col-xl-3 col-sm-12">
                                                                <div class="badge-box">
                                                                    <div class="sub-title">Total Students

                                                                    </div>

                                                                   
                                                                    <div>
                                                                      <h2>  <label class="badge badge-primary">000</label>
                                                                </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-xl-3 col-sm-6">
                                                                  <div class="badge-box">
                                                                    <div class="sub-title">Admission This Month

                                                                    </div>

                                                                   
                                                                    <div>
                                                                      <h2>  <label class="badge badge-success">000</label>
                                                                </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-xl-3 col-sm-6">
                                                                <div class="badge-box">
                                                                    <div class="sub-title">Pending Students

                                                                    </div>

                                                                   
                                                                    <div>
                                                                      <h2>  <label class="badge badge-danger">000</label>
                                                                </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-xl-3 col-sm-6">
                                                                  <div class="badge-box">
                                                                    <div class="sub-title">Previous Month Students

                                                                    </div>

                                                                   
                                                                    <div>
                                                                      <h2>  <label class="badge badge-primary">000</label>
                                                                </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                     
                                                         
                                                        </div>
                                                    </div>

         <!-- content here -->
		 
		 
		 
		 
		 
		  <!-- content here -->
		
		
		</div>



									   </div>
                                    </div>


                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>

   <?php include('footer.php') ?>