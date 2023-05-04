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

<div class="card-block">
        			   </div>            <!-- Page-Title -->
              
 
         <!-- content here -->
		 
	<div class="row justify-content-md-center">
                   <div class="col-9">
                        <div class="card">
                <div class="card-body">
    <table class="table table-hover table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Notifications</th>
                            <th>Date</th>
                            <th>Status</th>
							 </tr>
                    </thead>

                    <tbody>

					
					
					<?php
					$author = $_SESSION['ejb_user_id'];
					mysqli_query($np2con,"UPDATE `notification` SET `nt_status` = '1' WHERE `nt_for_user` = '".$author."' AND  `nt_status` = '0'");
		
					$query = mysqli_query($np2con,"SELECT * FROM notification where nt_for_user = '".$_SESSION['ejb_user_id']."' order by nt_id desc limit 100");
				if(mysqli_num_rows($query) < 1){echo ntf('not found!',0);}
				while ($row = mysqli_fetch_array($query)) {
				//'.$row['nt_status'].'	
				echo '
				 <tr>
						
                            <th scope="row">'.$row['nt_msg'].'</th>
						<td>'.substr($row['nt_date'], 0, -9).'</td>
                            <td><span class="badge badge-success">Read</span></span></td>
                       
						
                        </tr>
				';	
				}
					?>
                       
                      
                    </tbody>
                </table>
           

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
        </div>

   <?php include('footer.php') ?>