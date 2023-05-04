<?php include('header.php');

include('admin-check.php');
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
                            <h4 class="page-title">MANGE BATCH</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-12">
                        <div class="card">
                            <div class="card-body">


								    <section>
        <table class="table  table-striped"> 
		  <thead style="background: #2b799cc9;">
		  <tr> 
		  <th>Batch Info</th> 
		  <th>Time</th> 
		  <th>Date </th> 
		  <th>Status</th>
		  <th>Onday</th>
		  <th>Students</th> 
		  <th>Options</th></tr> </thead> 
		  
		  <tbody>
		  
		  
		<?php

		//echo $Serch_setment;
		

		
		   $query = mysqli_query($np2con,"SELECT * FROM batchs Inner Join online_courses on batchs.b_couse = online_courses.oc_id  order by b_id DESC LIMIT {$startpoint}, {$limit}");
while ($row = mysqli_fetch_array($query)) {
	echo '<tr> 
		  <th scope="row">
		  <span class="badge badge-success">Batch - '.$row ['b_name'].'</span><br>
		  '.$row ['oc_name'].'<br>
		  Mentor : '.$row ['b_mentor'].'</th> 
		  <td>
		  START <b>'.$row ['b_day'].'-'.date("F", mktime(0, 0, 0, $row ['b_month'], 10)).'-'.$row ['b_year'].'</b><br>
		  END&nbsp;&nbsp; <b>'.$row ['b_end_day'].'-'.date("F", mktime(0, 0, 0, $row ['b_end_month'], 10)).'-'.$row ['b_end_year'].'</b>
		  </td> 
			<td>
			Weekly: '.$row ['b_class_on_week'].'Days<br>
			Duration: '.$row ['bc_duration'].'<br>
			Time: '.$row ['b_class_time'].' '.$row ['b_class_time_ampm'].'<br>
			</td> 
		  ';
		  
		  echo'<td>';
		  if($row ['b_status']== '1'){
			echo '<span class="badge badge-success">OnGoing</span>';  
		  }else {echo '<span class="badge badge-danger">Booked</span>';}  
			echo '<br>';
			if($row ['b_visibility']== '1'){
			echo '<span class="badge badge-success">Visible</span>';  
		  }else {echo '<span class="badge badge-danger">Hidden</span>';} 	
		  
		  
		  echo'</td>';
		 echo '<td>';
		  if($row ['b_on_day_saturday'] == '1'){echo '<span class="badge badge-info">Saturday</span><br>';}
		  if($row ['b_on_day_sunday'] == '1'){echo '<span class="badge badge-info">Sunday</span><br>';}
		  if($row ['b_on_day_monday'] == '1'){echo '<span class="badge badge-info">Monday</span><br>';}
		  if($row ['b_on_day_tuesday'] == '1'){echo '<span class="badge badge-info">Tuesday</span><br>';}
		  if($row ['b_on_day_wednesday'] == '1'){echo '<span class="badge badge-info">Wednesday</span><br>';}
		  if($row ['b_on_day_thursday'] == '1'){echo '<span class="badge badge-info">Thursday</span><br>';}
		  if($row ['b_on_day_friday'] == '1'){echo '<span class="badge badge-info">Friday</span><br>';}
		   
		  echo'</td>';
			  
			 echo '<td>
			 <span class="badge badge-success">Paid - '.batch_students_count($row ['b_name'],$row ['oc_id'],'paid').'</span><br>
			 <span class="badge badge-danger">Unpaid - '.batch_students_count($row ['b_name'],$row ['oc_id'],'unpaid').'</span><br>
			 <span class="badge badge-info">Terget - '.$row ['b_terget'].'</span><br>
			 </td>';
		
			  echo'<td>';

		  echo '
<a  href="admin/show-batch-students.php?batch='.$row ['b_name'].'&course='.$row ['oc_id'].'&cmd=paid" class="badge badge-success" >Show Paid</a><br>
<a  href="admin/show-batch-students.php?batch='.$row ['b_name'].'&course='.$row ['oc_id'].'&cmd=unpaid" class="badge badge-info" >Show UnPaid</a><br>
</td> 
		  </tr> ';
}
		  
		  ?>
		  
		   
		  
		  </tbody> </table> </div></div>
		  <div class="pagination-filter-container">
         <?php
			$querycnt = mysqli_query($np2con,"SELECT b_id FROM batchs Inner Join online_courses on batchs.b_couse = online_courses.oc_id  order by b_id DESC");
			$countrow = mysqli_num_rows($querycnt);
		  echo pagination_all($countrow,$limit);
		  ?>
              </div>
								</section>

                            
							</div>
                    </div>
                   </div><!--end row-->

              
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