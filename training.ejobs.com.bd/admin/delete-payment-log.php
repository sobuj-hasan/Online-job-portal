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
                            <h4 class="page-title">ONLINE STUDENTS</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-12">
                        <div class="card">
                            <div class="card-body">


								    <section>
       <form  method="post" name="searchfrm">
	 
	 <?php
	  $plid = $_GET['plid'];
		$query = mysqli_query($np2con,"SELECT * FROM pay_log Inner join online_students ON online_students.st_id = pay_log.pl_student Inner Join online_courses on online_courses.oc_id = online_students.st_course_name Where pl_id = '".$plid."'");
		if(mysqli_num_rows($query) < 1){echo ntf('NOT FOUND!',0);die();}
		while ($rowe = mysqli_fetch_array($query)) {
		$oc_name = $rowe['oc_name'];
		$st_name = $rowe['st_name'];
		$pl_amount = $rowe['pl_amount'];
		$st_payment_paid = $rowe['st_payment_paid'];
		}


		if(isset($_POST['delamountdate'])){
		$query = mysqli_query($np2con,"SELECT * FROM pay_log Inner join online_students ON online_students.st_id = pay_log.pl_student Inner Join online_courses on online_courses.oc_id = online_students.st_course_name Where pl_id = '".$plid."'");
		if(mysqli_num_rows($query) < 1){echo ntf('NOT FOUND!',0);	die();}
		while ($rowe = mysqli_fetch_array($query)) {
		$st_id = $rowe['st_id'];	
		$st_payment_paid = $rowe['st_payment_paid'];	
		$pl_amount = $rowe['pl_amount'];	
		//	
		}
		
		//cut amount form student payment-log
		
		if($st_payment_paid >= $pl_amount)	{
		$newamount = $st_payment_paid-$pl_amount;
		if($newamount > 99){
		$st_payment_status = '1';	
		}else {$st_payment_status = '0';}
		//$newamount = $newamount+$editamount;
		if(mysqli_query($np2con,"UPDATE `online_students` SET `st_payment_paid` = '".$newamount."',`st_payment_status` = '".$st_payment_status."' WHERE `online_students`.`st_id` = '".$st_id."'"))
		{
		if(mysqli_query($np2con,"DELETE FROM `pay_log` WHERE `pay_log`.`pl_id` = '".$plid."'"))
		{
		echo ntf('Updated!',1);	
		echo reloader('"admin/edit-payment-log.php?plid='.$plid.'"',1000);	
		del_log('pay_log-pl_id('.$plid.')-amount('.$pl_amount.')st_id('.$st_id.')-st_name('.$st_name.')');
		}
		}
		//if(mysqli_query($np2con,"UPDATE `pay_log` SET `pl_amount` = '".$newamount."' WHERE `pay_log`.`pl_id` = '".$plid."'")){
		//echo ntf('Updated!',1);	
		//echo reloader('"admin/edit-payment-log.php?plid='.$plid.'"',1000);
		}
		}
		
		//}
		//}
	 //	del_log('11')
	 ?>
	 
	 
	 <h4><?php echo $st_name;?></h4><br>
	 <h4> Paid - (<?php echo $st_payment_paid;?>TK) <br>For Course <?php echo $oc_name;?></h4><br>
	 <h4> Are you sure want to delete ? - PayLog- (<?php echo $pl_amount;?>)TK</h4><br>
	 <input type="submit" name="delamountdate" class="btn btn-danger btn-lg btn-flat"
	 value="Delete">

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