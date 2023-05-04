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
												   </div>            <!-- Page-Title -->
              
 
         <!-- content here -->
	<div class="row">
                   <div class="col-12">
                  <div class="card">
                 <div class="card-body">
   <div class="pt-30 pl-60 pr-60">
   <?php
	$gyear = 2021;
	if(isset($_GET['year'])){
	$gyear = $_GET['year'];	
	}
   ?>
	<h3>Statement <span class="label label-success btn-sm"><?php echo $gyear?></span>  | <a href="income-statement.php">Back</a> | <a href="income-statement.php?year=2020">2020</a> | <a href="income-statement.php?year=2021">2021</a> | <a href="income-statement.php?year=2022">2022</a></h3>


<div data-example-id="hoverable-table" class="bs-example">

<?php 
if(isset($_GET['incomefrom'])){}

elseif(isset($_GET['expenses'])){
$expense_month = $_GET['expenses'];	


///// GET TOTAL EXPANSE
$query = mysqli_query($np2con,"SELECT ex_amount FROM expenses where ex_id != '0' AND ex_month = '".$expense_month."' AND ex_year = '".$gyear."'");	
$get_total_expanse = 0;
while ($rowv = mysqli_fetch_array($query)) { 
$get_total_expanse = $get_total_expanse+intval($rowv['ex_amount']);
}
///// GET TOTAL EXPANSE


echo '<table class="table table-hover">
<thead style="background:#00BCD4;"><th colspan="5"><center>'.date("F", mktime(0, 0, 0, $_GET['expenses'], 10)).'</center></th></thead>
                    <thead style="background:#ccc;">
                        <tr>
                           <th>SL</th>
                           <th>Type</th>
                            <th>Count</th>
                            <th>Amount</th>
                            <th>Percent</th>
						</tr>
                    </thead>
<tbody>';	

$sd = 1;
$total_ex_count = 0;
$total_ex_amount = 0;
foreach ($fnc_expense_type as $key => $value){
/////////////////////////////
$amount_exv = 0;
$amount = 0;



	$query = mysqli_query($np2con,"SELECT ex_amount FROM expenses where ex_id != '0' AND ex_month = '".$expense_month."' AND ex_year = '".$gyear."' AND ex_type = '".$value."'");	
	$count_e = mysqli_num_rows($query );
	$total_ex_count = $total_ex_count+$count_e;
	while ($row = mysqli_fetch_array($query)) { 
	$amount = $amount+intval($row['ex_amount']);
	}
	/////////////////////////////	
	$total_ex_amount = $total_ex_amount+$amount;
	$get_persent = $amount*100/$get_total_expanse;
	
echo '
	
	<tr style="background: ;">
	<th scope="row">'.$sd.'</th>
	<th scope="row">'.$value.'</th>
    <td><span class="label label-info btn-sm">'.number_format($count_e,0).'</span></td>
    <td><span class="label label-danger btn-sm">'.number_format($amount,0).'</span></td>
    <td><span class="label label-info btn-sm">'.number_format($get_persent,0).'%</span></td>
    </tr>';
$sd++;
}
echo '
<thead style="background:#ccc;">
                        <tr>
                           <th></th>
                           <th></th>
                            <th>'.number_format($total_ex_count,0).'</th>
                            <th>'.number_format($total_ex_amount,0).'</th>
                            <th></th>
						</tr>
                    </thead>';
	
	
	
echo '
</tbody>
                </table>
';	
}
else{ ?>
<table class="table table-hover">
                    <thead style="background:#ccc;">
                        <tr>
                           <th>Month</th>
                            <th>Total Income</th>
                            <th>Total Expense</th>
							 <th>Net Profit/Loss</th>
							 <th>Gross Percent</th>
						</tr>
                    </thead>

                    <tbody>


					<?php
					
	$total_amount_ex = 0;
	$total_amount_incm = 0;
	$total_net_incom = 0;
	for ($x = 1; $x <= 12; $x++) {
	//echo '<option value="'.sprintf('%02d', $x).'"'; if(isset($_POST['serch_day'])){if($_POST['serch_month'] == sprintf('%02d', $x)){echo 'selected';}}echo '>'.date("F", mktime(0, 0, 0, $x, 10)).'</option>';	

	
	$month = sprintf('%02d', $x);
	$amount_ex = 0;
	$amount_incm = 0;
	
	
	/////////////////////////////
	$query = mysqli_query($np2con,"SELECT ex_amount FROM expenses where ex_id != '0' AND ex_month = '".$month."' AND ex_year = '".$gyear."'");	
	while ($row = mysqli_fetch_array($query)) { 
	$amount_ex = $amount_ex+intval($row['ex_amount']);
	}
	$total_amount_ex = $total_amount_ex+$amount_ex;
	/////////////////////////////
	/////////////////////////////
	$query = mysqli_query($np2con,"SELECT pl_amount FROM pay_log where pl_id != '0' AND  pl_month = '".$month."' AND pl_year = '".$gyear."'");	
	while ($row = mysqli_fetch_array($query)) { 
	$amount_incm = $amount_incm+intval($row['pl_amount']);
	}
	$total_amount_incm = $total_amount_incm+$amount_incm;
	/////////////////////////////
	$net_incom = $amount_incm-$amount_ex;
	
	
	
	
	$percent = '0';
	if($net_incom != '' AND $amount_incm != ''){$percent = intval($net_incom)*100/intval($amount_incm);}
	
	
	
	echo '
	<tr>
						
						 <th scope="row">'.date("F", mktime(0, 0, 0, $x, 10)).'</th>
                          
                       <td><a  href="income-statement.php?incomefrom='.sprintf('%02d', $x).'&year='.$gyear.'" class="label label-info btn-sm">৳'.number_format($amount_incm,0).'/-</a></td>
                       <td><a href="income-statement.php?expenses='.sprintf('%02d', $x).'&year='.$gyear.'" class="label label-danger btn-sm">৳'.number_format($amount_ex,0).'/-</a></td>
                       <td><span class="label label-success btn-sm">৳'.number_format($net_incom,0).'/-</span></td>
                       <td><span class="label label-warning btn-sm">'.number_format($percent).'%</span>
					     </td>
                         
                        
                         
	';
	
	$total_net_incom = $total_net_incom+$net_incom;
	}
	
	echo '
	<tr style="background: #FFC107;">
						
						 <th scope="row">Yearly Statement</th>
                          
                       <td><span class="label label-info btn-sm">৳'.number_format($total_amount_incm,0).'/-</span></td>
                       <td><span class="label label-danger btn-sm">৳'.number_format($total_amount_ex,0).'/-</span></td>
                       <td><span class="label label-success btn-sm">৳'.number_format($total_net_incom,0).'/-</span></td>
                       <td><span class="label label-success btn-sm"></span></td>
                         </tr>';
						 
						 

						 
	?>


                        
                      
                    </tbody>
                </table>

<?php } ?>
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
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>

   <?php include('footer.php') ?>