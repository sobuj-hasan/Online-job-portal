<?php include('header.php');

include('admin-check.php');
include('super-admin-check.php');
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
                                                Total Expense</div>
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
                                              Expense This Month</div>
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
                   <div class="col-md-9">
                        <div class="card">
                        <div class="card-body">
                 <div class="border-1px p-30 mb-0">
              <h3 class="text-theme-colored mt-0 pt-5">Add new expense</h3>
              <hr>
				<?php

				if(isset($_GET['dlconfrm'])){
				$exp =	$_GET['dlconfrm'];
				$qrt = "DELETE FROM expenses WHERE ex_id = '".$exp."'";
				if(mysqli_query($np2con,$qrt))
				{
				echo ntf('Deleteed!',1000);
				}	
				echo reloader('admin/add-expense.php',0);
				}
				
				
				if(isset($_GET['dl'])){
				echo '<a  class="btn btn-success btn-midium"  href="admin/add-expense.php?dlconfrm='.$_GET['dl'].'">Do you want to delete this expense ?</a>';	
				echo '&nbsp;&nbsp;<a  class="btn btn-danger btn-midium"  href="admin/add-expense.php">Cancel</a>';	
				exit();	
				}
				if(isset($_POST['submitExpense'])){
				
				$Expense_Name = $_POST['Expense_Name'];
				$Expense_Type = $_POST['Expense_Type'];
				$Amount = $_POST['Amount'];
				$Description = $_POST['Description'];
				$Notify_to = $_POST['Notify_to'];	
				
				if($Expense_Type == 'Salary'){
				if(isset($_POST['savings'])){
				$amount_savings = round($Amount*10/100,0);
				$amount_payable = round($Amount-$amount_savings);	
				//amount_savings
						$ntf_text = 'Savings Added Amounts TK.'.$amount_savings.' ('.date("F").')';
						notifier($Notify_to,$ntf_text);		
						$sql = "INSERT INTO expenses (`ex_name`, `ex_amount`, `ex_type`, `ex_save`,`ex_date`, `ex_day`, `ex_month`, `ex_year`, `ex_description`, `ex_for`)
						VALUES ('".$Expense_Name."','".$amount_savings."','".$Expense_Type."','1','".$ctime."','".$day."','".$month."','".$year."','".$ntf_text."','".$Notify_to."')";
						if ($np2con->query($sql) === TRUE) {
						echo ntf($ntf_text,1);
						} 
						//Payable Amount
						$ntf_text = 'Salary withdrawn Amounts TK.'.$amount_payable.' ('.date("F").')';
						notifier($Notify_to,$ntf_text);		
						$sql = "INSERT INTO expenses (`ex_name`, `ex_amount`, `ex_type`, `ex_date`, `ex_day`, `ex_month`, `ex_year`, `ex_description`, `ex_for`)
						VALUES ('".$Expense_Name."','".$amount_payable."','".$Expense_Type."','".$ctime."','".$day."','".$month."','".$year."','".$ntf_text."','".$Notify_to."')";
						if ($np2con->query($sql) === TRUE) {
						echo ntf($ntf_text,1);
						}
					echo reloader();
				}else {
					//without savings
					$ntf_text = 'Salary withdrawn Amounts TK.'.$Amount.' ('.date("F").')';
						notifier($Notify_to,$ntf_text);		
						$sql = "INSERT INTO expenses (`ex_name`, `ex_amount`, `ex_type`, `ex_date`, `ex_day`, `ex_month`, `ex_year`, `ex_description`, `ex_for`)
						VALUES ('".$Expense_Name."','".$Amount."','".$Expense_Type."','".$ctime."','".$day."','".$month."','".$year."','".$ntf_text."','".$Notify_to."')";
						if ($np2con->query($sql) === TRUE) {
						echo ntf($ntf_text,1);
						}
					echo reloader();
				}	
				
							
				}
				else {
				
				
				notifier($Notify_to,$Expense_Name);		
						$sql = "INSERT INTO expenses (`ex_name`, `ex_amount`, `ex_type`, `ex_date`, `ex_day`, `ex_month`, `ex_year`, `ex_description`, `ex_for`)
						VALUES ('".$Expense_Name."','".$Amount."','".$Expense_Type."','".$ctime."','".$day."','".$month."','".$year."','".$Description."','".$Notify_to."')";
						if ($np2con->query($sql) === TRUE) {
						echo ntf('Expense Added!',1);
						echo reloader();
						} 	
					
				}
					
				}
				
				?>
				
				
				
				
				
				
              <form id="job_apply_form" name="job_apply_form" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Expense Name <small>*</small></label>
                      <input name="Expense_Name" type="text" placeholder="Enter Name" required="" class="form-control" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-6">
                   <div class="form-group">
                      <label>Expense Type <small>*</small></label>
                      <select name="Expense_Type" class="form-control required" aria-required="true" required>
                        <option value="">Expense Type</option>
                        <?php
					  
					  foreach ($fnc_expense_type as $key => $value){
					echo '<option value="'.$key.'">'.$value.'</option>';
					}
					  ?>
                      </select>
					  

					  
					  
					  <label>Are you want to add 10% Savings?</label>
					  <input name="savings" type="checkbox" />
                  </div>
                </div>
				</div> 
				 <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Amount<small>*</small></label>
                      <input name="Amount" type="text" placeholder="Enter Name" required="" class="form-control" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Description <small>*</small></label>
                      <input name="Description" class="form-control required email" type="text" placeholder="" aria-required="true">
                    </div>
                  </div>
                </div>
                <div class="row">               
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Notify to <small>*</small></label>
                      <select name="Notify_to" class="form-control required" aria-required="true" required>
                        <option value="">Select Staff Name</option>
                        <?php
			$queryv = mysqli_query($np2con,"
			SELECT * FROM staff ");
			//$cntnum = mysqli_num_rows($queryv);
			while ($rowv = mysqli_fetch_array($queryv)) {
			
			echo '<option value="'.$rowv['stf_id'].'">'.$rowv['stf_name'].'</option>';
			
			}
					  ?>
                      </select>
                    </div>
                  </div>

                </div>
								
				
			
				
             
                <div class="form-group">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" name="submitExpense" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" >Add Expense</button>
                </div>
              </form>
        
            </div>
          
               </div>
               </div>
               </div>
             </div> <!-- end container -->

			 <div class="row">
                   <div class="col-md-10" >
                        <div class="card">
                        <div class="card-body">
     <div data-example-id="simple-form-inline" class="bs-example mb-20"> 
	 <div class="row" style="background: #303549;
    padding-top: 10px;
    padding: 10px;
    margin: 10px;
    box-sizing: border-box;
    border-radius: 10px;">
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
	echo '<option value="'.sprintf('%02d', $x).'"'; if(isset($_POST['serch_day'])){if($_POST['serch_month'] == sprintf('%02d', $x)){echo 'selected';}}echo '>'.date("F", mktime(0, 0, 0, $x, 10)).'</option>';	
	}
	?>
	</select>
	
	<select name="serch_year" class="form-control">
	<option value="2020"> 2020</option>
	<option value="2021"> 2021</option>
	</select>	 
	 
	
	<select name="serch_staff" class="form-control">
	<?php
			$queryv = mysqli_query($np2con,"
			SELECT * FROM staff ");
			//$cntnum = mysqli_num_rows($queryv);
			echo '<option value="">Select Staff</option>';
			while ($rowv = mysqli_fetch_array($queryv)) {
			
			echo '<option value="'.$rowv['stf_id'].'">'.$rowv['stf_name'].'</option>';
			
			}
					  ?>
	</select>	 
	
	<select name="serch_expn_type" class="form-control">
	<option value="">Expense Type</option>
                        <?php
					  
					  foreach ($fnc_expense_type as $key => $value){
					echo '<option value="'.$key.'">'.$value.'</option>';
					}
					  ?>
	</select>	
	
	
	
	
	
	
	 </div> 
	 <input type="submit" name="Searchdate" class="btn btn-success btn-transparent btn-theme-colored btn-sm" value="Search">

	 </form> 
	 </div>
     </div>
   

<div data-example-id="hoverable-table" class="bs-example">

                <table class="table table-hover">
                    <thead style="background:#ccc;">
                        <tr>
                            <th>Expense Type</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Amount</th>
							 <th>Description</th>
							 <th>For</th>
							 <th>Options</th>
                            
                           
                        </tr>
                    </thead>

                    <tbody>

					
					
					<?php
					
					
					if(isset($_POST['serch_day']) AND $_POST['serch_day'] != ''){
				$serch_day_stmnt = "AND ex_day = '".$_POST['serch_day']."'";	
				}else {$serch_day_stmnt = '';}
				
				if(isset($_POST['serch_month']) AND $_POST['serch_month'] != ''){
				$serch_month_stmnt = "AND ex_month = '".$_POST['serch_month']."'";	
				}else {$serch_month_stmnt = '';}
				
				if(isset($_POST['serch_year']) AND $_POST['serch_year'] != ''){
				$serch_year_stmnt = "AND ex_year = '".$_POST['serch_year']."'";	
				}else {$serch_year_stmnt = '';}
				
				if(isset($_POST['serch_expn_type']) AND $_POST['serch_expn_type'] != ''){
				$serch_expn_type_stmnt = "AND ex_type = '".$_POST['serch_expn_type']."'";	
				}else {$serch_expn_type_stmnt = '';}
				
				if(isset($_POST['serch_staff']) AND $_POST['serch_staff'] != ''){
				$serch_staff_stmnt = "AND ex_for = '".$_POST['serch_staff']."'";	
				}else {$serch_staff_stmnt = '';}
					

					
					$qurt = "SELECT * FROM expenses  WHERE ex_id != '0' {$serch_day_stmnt} {$serch_month_stmnt} {$serch_year_stmnt}  {$serch_expn_type_stmnt}  {$serch_staff_stmnt} order by ex_id DESC";
					//echo $qurt;
					$queryv = mysqli_query($np2con,$qurt);	


					$cnt = 0;
					$amount = 0;
					while ($rowc = mysqli_fetch_array($queryv)) { 
					echo '
					<tr>
						
                            <td>'.$rowc['ex_type'].'</td>
                            <th scope="row">'.$rowc['ex_name'].'</th>
						<td>'.substr($rowc['ex_date'], 0, -9).'</td>
                            <td><span class="label label-danger btn-sm">'.number_format($rowc['ex_amount'],2).'</span></td>
                           <td>'.$rowc['ex_description'].'</td>
							<td>'.$rowc['ex_for'].'</td>
                        <td>
						<a href="admin/add-expense.php?dl='.$rowc['ex_id'].'" class="btn btn-dark btn-transparent btn-theme-colored btn-sm" >Delete</a> 
						<a href="admin/add-expense.php" class="btn btn-dark btn-transparent btn-theme-colored btn-sm" >EDIT</a> 
						 </td>
                         </tr>
					';	
						$cnt++;
						$amount = $amount+$rowc['ex_amount'];
					}
					
					
					
					
					echo '
					<tr>
						
                            <td><span class="label label-info btn-sm">#'.$cnt.'</span></td>
                            <th scope="row"></th>
						<td></td>
                            <td><span class="label label-success btn-sm">Total - '.number_format($amount,2).'</span></td>
                           <td></td>
							<td></td>
                        <td></td>
                         </tr>
					';
					
					
					?>
					
                        
                      
                    </tbody>
                </table>
            </div>

               </div>
               </div>
               </div>
             </div> <!-- end container -->
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