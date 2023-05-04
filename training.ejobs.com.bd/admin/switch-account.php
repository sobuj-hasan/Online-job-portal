<?php include('header.php');

include('admin-check.php');
require('super-admin-check.php');
$get_batch_id = $_GET['batch'];
$get_course_id = $_GET['course'];
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

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                               
                            </div>
                            <h4 class="page-title">Switch</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-12">
                        <div class="card">
                 <div class="card-body">
 <?php
			 $id = $_GET['id'];
			 $query = mysqli_query($np2con,"SELECT * FROM staff where stf_id = '".$id."'");	
				$cnt = mysqli_num_rows($query);
				while ($row = mysqli_fetch_array($query)) {
				$stf_id = $row['stf_id'];
				}
				if($cnt > 0){
				$_SESSION['ejb_signed_in'] = NULL;
				$_SESSION['ejb_signed_in'] = true;
				$_SESSION['ejb_user_id'] 	=  NULL;	
				$_SESSION['ejb_user_id'] 	=  $stf_id;	
				echo ntf('Logged Successfull! ('.$stf_id.')',1);
				echo reloader('admin',1000);
				}
			 ?>

               </div>
               </div>
               </div>
             </div> <!-- end container -->
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