<?php 
$page_title = 'invoice';
include('header.php');
include('admin-check.php');
?>
<style>
.invoice tr td {color:black;}
.invoice (color:black !important;)
.table tr th (color:black;)
body {
    line-height: 1.7;
    color: #bbb;
    font-size: 14px;
    font-family: 'Open Sans', sans-serif;
    background-color: #fff;
}
* {
    /* -webkit-box-sizing: border-box; */
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
/* style sheet for "letter" printing */
@media print {
    #dss {
       display:none;
    }

}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
  <!-- Start main-content -->
  <div class="main-content" style="margin-left: 0px;">
    
    <!-- Section: About -->
    <section>
      <div class="container" style="width: 972px;
    box-shadow: 0 0 4px #0e0e0e80;
    padding: 18px 45px;
    box-sizing: border-box;
    margin-top: 20px;
    border-radius: 5px;">
	 
	
	 
	 <div class="wrapper">
	 <?php
	 if(isset($_GET['st'])){
		 $query = mysqli_query($np2con,"SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id where st_id = '".$_GET['st']."' limit 1");
		$stc = mysqli_num_rows($query);
		if($stc < 1){die('<h1><center>NOT FOUND!</center></h1>');}
while ($row = mysqli_fetch_array($query)) { 
$course_fee = $row ['oc_discunt_fee'];

		$duration = str_replace("m"," Month",$row ['st_course_duration']);
		 $duration = str_replace("d"," Days",$duration);
		 
			$paid = $row ['st_payment_paid'];  
			$unpaid = $course_fee-$row ['st_payment_paid'];  
		if($row ['st_payment_paid'] >= $course_fee){
		$fullpaid = 1;	
		}else {
		$fullpaid = 0;	
		}
	?>
	
	 
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-md-12">
        <h2 class="page-header">
         <img src="images/itvision-logo-web.png" width="350" height="70"/>
          <small class="pull-right" style="float: right;
    font-size: 15px;">Date: <?php echo $row ['st_join_date']?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
	
	<table class="table">
	<tr>
	
	<td>
	<div class="col-md-12 invoice-col" style="color:black;">
        <b>From</b>
        <address style="color:#838383;">
          <strong>Account Department</strong><br>
          2/2 (3rd Floor), Block-A, <br>
		  Opposite of Dhanmondi Boys School, <br>
		  Lalmatia Dhaka, Dhaka Division, <br>
		  Bangladesh 1207 <br>
        </address>
      </div>
	</td>
	
	<td>
	<!-- /.col -->
      <div class="col-md-12 invoice-col" style="color:black;">
       <b> To</b>
        <address style="color:#838383;">
          <strong><?php echo $row ['st_name']?></strong><br>
         <?php if(isset($row ['st_address']) AND $row ['st_address'] !=''){echo $row ['st_address'].'<br>';}?>
         <?php if(isset($row ['st_father_name']) AND $row ['st_father_name'] !=''){echo 'Father\'s name: '.$row ['st_father_name'].'<br>';}?>
         <?php if(isset($row ['st_mother_name']) AND $row ['st_mother_name'] !=''){echo 'Mother\'s name: '.$row ['st_mother_name'].'<br>';}?>
         <?php if(isset($row ['st_db']) AND $row ['st_db'] !=''){echo 'Date of birth: '.$row ['st_db'].'<br>';}?>
         <?php if(isset($row ['st_phone']) AND $row ['st_phone'] !=''){echo 'Phone:  '.$row ['st_phone'].'<br>';}?>
         <?php if(isset($row ['st_email']) AND $row ['st_email'] !=''){echo 'Email:  '.$row ['st_email'].'<br>';}?>
        
        </address>
      </div>
	</td>
	
	
	<td>
	 <!-- /.col -->
      <div class="col-md-12 invoice-col" style="color:black;">
        <b>Invoice </b>##<?php echo $row ['st_id']?><br>
        <b>REG ID:</b> <?php  echo $row ['st_registration_number']?><br>
        <b>Refer Name:</b> <?php echo $row ['st_reference_name']?><br>
        <b>Batch Number:</b> <?php echo $row ['st_batch_number']?><br>
        <b>Course Name:</b> <?php echo $row ['oc_name_short']?>
      </div>
      <!-- /.col -->
	</td>
	
	</tr>
	<table>
	
      
      
     
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-md-12 table-responsive">
        <table class="table table-striped" style="background: aliceblue;">
          <thead style="background: #7d9b06; border-top: 2px solid #252525;">
          <tr>
            <TD><B>SL</B></TD>
            <TD><B>Course Name</B></TD>
            <TD><B>Duration</B></TD>
            <TD><B>Description</B></TD>
            <TD><B>Subtotal</B></TD>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td><?php echo $row ['oc_name_short']?></td>
            <td><?php echo $duration?></td>
            <td>Course <?php echo $row ['oc_name']?></td>
            <td><?php echo number_format($course_fee,2),''?> TK</td>
          </tr>
         
       
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-md-6">
        <h3>Accepted Payment Methods:</h3>
        <img src="images/pay.jpg" alt="Visa">
       
 <h3>Notice:</h3>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          আপনার স্কলারশীপ অফার টি  কনফার্ম করতে  আপনার কোর্স ফি দ্রুত  পরিশোধ করুন ,  ধন্যবাদ 
        </p>
      </div>
      <!-- /.col -->
      <div class="col-md-6">
      

        <div class="table-responsive">
          <table class="table">
            <tbody><tr>
              <td  style="width:50%"><b>Paid Amount:</b></td>
              <td><?php echo number_format($paid,2),''?> TK</td>
            </tr>
          
            <tr>
              <td><b>Unpaid Amount:</b></td>
              <td><?php echo number_format($unpaid,2),''?> TK</td>
            </tr>
            <tr>
              <td><b>Total:</b></td>
              <td><?php echo number_format($course_fee,2),''?> TK</td>
            </tr>
          </tbody></table>
        </div>
		  <h3>Payment Status : </h3> 
		  <?php
		  if($fullpaid == 1){
			echo '<button type="button" class="btn btn-block btn-success btn-sm" disabled>FULL PAID</button>';  
		  }else {
			if($row ['st_payment_status'] == 0){
			  echo '<button type="button" class="btn btn-block btn-danger btn-sm" disabled>UNPAID</button> ';
		  }
		  if($row ['st_payment_status'] == 1){
			  echo '<button type="button" class="btn btn-block btn-success btn-sm" disabled>ADMITTED (DUE TK.'.$unpaid.')</button>';
		  }  
		  }
		  
		  

		  ?>
		   
		  
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
	   <div class="btn-group">
                      <button type="button" onclick="window.print();" id="dss" class="btn btn-info">Print</button>
                      <button type="button" onclick="window.print();" id="dss" class="btn btn-danger">Download</button>
                      <a href="admin"  id="dss" class="btn btn-success">Dashboard</a>
                      
                    </div>
  </section>
  <!-- /.content -->

		<?php 
} 
}else {
die('<h1><center>NOT FOUND!</center></h1>');
}
	 		  
	 ?>			
					
</div>
	 
	 </div>
	
    </section>
  </div>
  <!-- end main-content -->
  

</div>

</body>
</html>