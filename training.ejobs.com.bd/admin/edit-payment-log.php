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
                            <h4 class="page-title">EDIT PAYMNET</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-12">
                        <div class="card">
                            <div class="card-body">


								    <section>
       <form class="form" method="post" name="searchfrm">
	 
	 <?php
	  $plid = $_GET['plid'];
		$query = mysqli_query($np2con,"SELECT * FROM pay_log Inner join online_students ON online_students.st_id = pay_log.pl_student Inner Join online_courses on online_courses.oc_id = online_students.st_course_name Where pl_id = '".$plid."'");
		if(mysqli_num_rows($query) < 1){die();}
		while ($rowe = mysqli_fetch_array($query)) {
		$oc_name = $rowe['oc_name'];
		$st_name = $rowe['st_name'];
		$pl_amount = $rowe['pl_amount'];
		$st_payment_paid = $rowe['st_payment_paid'];
		}


		if(isset($_POST['editamountdate'])){
		$editamount = $_POST['editamount'];
			
		$query = mysqli_query($np2con,"SELECT * FROM pay_log Inner join online_students ON online_students.st_id = pay_log.pl_student Inner Join online_courses on online_courses.oc_id = online_students.st_course_name Where pl_id = '".$plid."'");
		if(mysqli_num_rows($query) < 1){die();}
		while ($rowe = mysqli_fetch_array($query)) {
		$st_id = $rowe['st_id'];	
		$st_payment_paid = $rowe['st_payment_paid'];	
		$pl_amount = $rowe['pl_amount'];	
			
		}

		if($st_payment_paid >= $pl_amount)	{
		$newamount = $st_payment_paid-$pl_amount;
		$newamount = $newamount+$editamount;
		if(mysqli_query($np2con,"UPDATE `online_students` SET `st_payment_paid` = '".$newamount."' WHERE `online_students`.`st_id` = '".$st_id."'")){
		if(mysqli_query($np2con,"UPDATE `pay_log` SET `pl_amount` = '".$newamount."' WHERE `pay_log`.`pl_id` = '".$plid."'")){
		echo ntf('Updated!',1);	
		echo reloader('"admin/edit-payment-log.php?plid='.$plid.'"',1000);
		}
		}
		
		}
		}
	 ?>
	 
	 
	 
	 <h3><?php echo $st_name;?></h3><br>
	 <h4><?php echo $oc_name;?> Paid - (<?php echo $st_payment_paid;?>)</h4><br>
	 <h5> For Update ? - (<?php echo $pl_amount;?>)</h5><br>
	 <div class="form-group"> <br>
	<input type="text" placeholder="New Amounts" name="editamount" value="" class="form-control"> 
	</div> <br>
	 <input type="submit" name="editamountdate" class="btn btn-success"
	 value="Update">

	 </form> 

               
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