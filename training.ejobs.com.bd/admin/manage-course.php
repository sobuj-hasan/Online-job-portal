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
	<div class="row">
	
                   <div class="col-10" style="margin:0 auto;">
				   <h2>MANAGE COURSE</h2>
                        <div class="card">
                 <div class="card-body">
				 
	<div class="row">  
	<div class="col-md-12 p-2 mb-2 bg-dark rounded">
	 <form class="form-inline" method="post" name="searchfrm">
	 <div class="form-group">  
	 <input type="text" placeholder="Short Name" name="short_name" class="form-control m-1" required > 
	 <input type="text" placeholder="Full Name" name="full_name" class="form-control m-1" required >  
	 <input type="text" placeholder="Orginal Fee" name="orginal_fee" class="form-control m-1" required >
	 <input type="text" placeholder="Discunt Fee" name="discunt_fee" class="form-control m-1" required >
	 <select class="form-control m-1" name="Duration" required >
	 <option value="" required >Duration</option>
	 <option value="2w">2 Weeks</option>
	 <option value="1m">1 Month</option>
	 <option value="2m">2 Months</option>
	 <option value="3m">3 Months</option>
	 <option value="6m">6 Months</option>
	 </select>
	 <input type="submit" name="creat_cours" class="btn btn-warning btn-flat m-1" value="Create">
	 </div> 

	 
	 </form> 
	
	 </div>
	 </div>
			 
				 
				 

				 
	<div data-example-id="hoverable-table" class="bs-example"> 
		  
		  <?php
		  


	 if(isset($_POST['creat_cours'])){
	 $full_name =  $_POST['full_name'];
	 $short_name =  $_POST['short_name'];
	 $orginal_fee =  $_POST['orginal_fee'];
	 $discunt_fee =  $_POST['discunt_fee'];
	 $Duration =  $_POST['Duration'];
	 $r = ($discunt_fee*100/$orginal_fee);
	$discunt_percent =  round(100-$r,0);
		 $sql = "INSERT INTO online_courses (`oc_name`, `oc_name_short`,`oc_duration`, `oc_orginal_fee`, `oc_discunt_fee`, `oc_discunt_percent`, `oc_date`)
						VALUES ('".$full_name."','".$short_name."','".$Duration."','".$orginal_fee."','".$discunt_fee."','".$discunt_percent."','".$ctime."')";
						if ($np2con->query($sql) === TRUE) {
						echo ntf('Course Offer Created!',1);
						echo reloader('admin/manage-course.php');	
						} 
	 }

		  
		  
		  if(isset($_GET['cmd'])){
			$cmd = $_GET['cmd'];
			$cid = $_GET['cid'];
			//OnGoing Booked Visible Hidden
			if($cmd != '' AND $cmd != ''){
			if($cmd == 'Visible'){
			$sql = "UPDATE online_courses SET oc_visibility = '1'  WHERE oc_id = '{$cid}'";
			if (mysqli_query($np2con,$sql)){
			echo ntf('Updated!',0);
			echo reloader('admin/manage-course.php');	
			}}
			if($cmd == 'Hidden'){
			$sql = "UPDATE online_courses SET oc_visibility = '0'  WHERE oc_id = '{$cid}'";
			if (mysqli_query($np2con,$sql)){
			echo ntf('Updated!',0);
			echo reloader('admin/manage-course.php');	
			}}
			if($cmd == 'OnGoing'){
			$sql = "UPDATE online_courses SET oc_status = '1'  WHERE oc_id = '{$cid}'";
			if (mysqli_query($np2con,$sql)){
			echo ntf('Updated!',0);
			echo reloader('admin/manage-course.php');	
			}}
			if($cmd == 'Booked'){
			$sql = "UPDATE online_courses SET oc_status = '0'  WHERE oc_id = '{$cid}'";
			if (mysqli_query($np2con,$sql)){
			echo ntf('Updated!',0);
			echo reloader('admin/manage-course.php');	
			}}
			
			
			}
	//oc_visibility oc_status
			
			}
		  ?>
		  

		  
		  
		  
		  
		  
		  <table id="tech-companies-1-clone" class="table  table-striped">
                                            <thead class="thead-dark">
		  <tr> <th>ID</th> <th>Short Name</th> <th>Full Name</th>
		  <th>Status</th>
		  <th>Visibility</th>
		  <th>Orginal</th>
		  <th>Discunt</th>
		  <th>Percent</th> 
		  <th>Duration</th> 
		  <th>View Details</th></tr> </thead> 
		  
		  <tbody>
		  
		  
		<?php

		//echo $Serch_setment;
		

		
		   $query = mysqli_query($np2con,"SELECT * FROM online_courses order by oc_id DESC limit 10");
while ($row = mysqli_fetch_array($query)) {
	echo '<tr> 
		  <th scope="row">'.$row ['oc_id'].'</th> 
		  <td>'.$row ['oc_name_short'].'</td> 
		  <td>'.$row ['oc_name'].'</td> 
		  ';
		  
		  echo'<td>';
		  if($row ['oc_status']== '1'){
			echo '<span class="badge badge-success">OnGoing</span>';  
		  }else {
				  echo '<span class="badge badge-danger">Booked</span>';
			  }   
		  echo'</td>';
		  
		  echo'<td>';
		  if($row ['oc_visibility']== '1'){
			echo '<span class="badge badge-success">Visible</span>';  
		  }else {
				  echo '<span class="badge badge-danger">Hidden</span>';
			  }   
		  echo'</td>';
			  
			 echo '<td>'.$row ['oc_orginal_fee'].'TK</td>';
			 echo '<td>'.$row ['oc_discunt_fee'].'TK</td>';
			 echo '<td>'.$row ['oc_discunt_percent'].'%</td>';
			 echo '<td>'.str_replace('m',' Months',str_replace('w',' Weeks',$row ['oc_duration'])).'</td>';
			 
			  echo'<td>';
		  if($row ['oc_status']== '0'){ 
			  echo '<a href="admin/manage-course.php?cmd=OnGoing&cid='.$row ['oc_id'].'" class="badge badge-success" >OnGoing?</a> ';}
			  
		  else{echo '<a href="admin/manage-course.php?cmd=Booked&cid='.$row ['oc_id'].'" class="badge badge-danger" >Booked?</a> ';}
		echo '<br>';
		  if($row ['oc_visibility']== '0'){
			  echo '<a href="admin/manage-course.php?cmd=Visible&cid='.$row ['oc_id'].'" class="badge badge-info">Visible?</a>';}
			  
		  else{echo '<a href="admin/manage-course.php?cmd=Hidden&cid='.$row ['oc_id'].'" class="badge badge-danger" >Hidden?</a>';}
		  
		  echo '
		  <a href="javascrip:void()" class="badge badge-success" data-toggle="modal" data-target=".bs-example-modal-lg-'.$row ['oc_id'].'">View</a>
		  <a style="display:none;" href="admin/edit-online-student.php?st='.$row ['oc_id'].'" class="badge badge-info" >Edit</a>


<div class="modal fade bs-example-modal-lg-'.$row ['oc_id'].'" tabindex="-1" role="dialog" aria-badgeledby="myLargeModalbadge">
  <div class="modal-dialog modal-lg"  style="width: 585px;">
   
   
   
   <div data-example-id="contextual-table" style="background: #009688;min-width: 588px;
    border-radius: 10px" class="bs-example col-md-8 ">
<h3 style="text-align:center;" class="p-3">IT  Online Course</h3>	

			<br>
			<table class="table"> 
	<tbody>
			<tr class="active"> 
			<th scope="row">Total Students:	</th> 
			<td>'.course_student_count($row ['oc_id'],'all').'</td> 
			<th scope="row">This Month:</th>  
			<td>'.course_student_count($row ['oc_id'],'this_month').'</td> 
			</tr>
			
			
		</tbody> 
		</table> 
		<br>
 </div>
   </div>
</div></td> 
		  </tr> ';
}
		  
		  ?>
		  
		   
		  
		  </tbody> </table> </div>			 
				 

		  
		  
		  </div>
		  

               </div>
               </div>
               </div>	 
		 
		 
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