<?php include('../get-ejb-conn.php'); ?>
<!doctype html>
<html lang="en">
<head>
<!--site title-->
<title>Ejobs</title>
<!-- Description, Keywords and Author -->
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Ovi Sheikh">

<!-- for mobile devices -->
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--icon-->
<link rel="shortcut icon" href="img/page/icon.png" type="image/x-icon" />
<link rel="icon" href="img/page/icon.png" type="image/x-icon" />

<!--page style-->
<link href="../css/page-style.css" rel="stylesheet" type="text/css" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--bootstrap css-->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />

<!--font awesome-->
<link href="../fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />

<!--animations-
<link rel="stylesheet" type="text/css" href="css/animate.css">->

<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="../js/owl-carousel/owl.carousel.css"/>
<!-- Default Theme -->
<link rel="stylesheet" href="../js/owl-carousel/owl.theme.css"/>

<!--incremental counter-->
<link href="../css/jquery.incremental-counter.css" rel="stylesheet" type="text/css">

<!--nice select-->
<link href="../css/nice-select.css" rel="stylesheet">

</head>

<body>


<!--/.slider-->
<!--courses-->
<div id="row">
<div id="col-md-6">
   <section id="register">
    <div class="container">
<div id="regForm">
<div class="heading-section">


 <?php





				if(isset($_SESSION['ejb_signed_in']) AND $_SESSION['ejb_signed_in'] == true)
				{
			
					echo '<h4><a href="admin"><center>Go to Dashboard?</center></a></h4>';	
					 if($di_stf_desiganation == 4){
						//include('part-award.php');    
					echo reloader('admin',500);
					 }
					 else{
					echo reloader('admin',500);	 
					 }
					  	


 
				}
				
				if(isset($_SESSION['ejb_signed_in_offline']) AND $_SESSION['ejb_signed_in_offline'] == true)
				{
			
					echo '<h4><a href="admin"><center>Go to Dashboard?</center></a></h4>';	
					 if($di_stf_desiganation == 4){
						//include('part-award.php');    
					echo reloader('admin',5000);
					 }
					 else{
					echo reloader('admin-offline',500);	 
					 }
					  	


 
				}
				
				
				


			  if(isset($_POST['submit'])){
				
				$form_name = preg_replace('/\s/', '', $_POST['form_name']);
				$form_name = preg_replace('/[^A-Za-z0-9\-]/', '', $form_name);
				$form_pass = preg_replace('/\s/', '', $_POST['form_pass']);
				$type = $_POST['type'];
				
				
			if(isset($_POST['form_name']) AND isset($_POST['form_pass']) AND $_POST['form_name'] != ''  AND $_POST['form_pass'] != ''){

				$query = mysqli_query($np2con,"SELECT * FROM staff where stf_id = '".$form_name."'  AND (stf_pass = '".$form_pass."' OR stf_pass = '".sha1($form_pass)."')");	
				$cnt = mysqli_num_rows($query);
				while ($row = mysqli_fetch_array($query)) {
				$stf_id = $row['stf_id'];
				}
				if($cnt > 0){
				
			
				$_SESSION['ejb_signed_in'] = true;
				$_SESSION['ejb_user_id'] 	=  $stf_id;	
				logtracer($stf_id);
				echo ntf('Logged Successfull! ('.$stf_id.')',1);
				echo reloader('admin',100);
					
			


						
				
				
				
				}else{
					echo ntf('Something is wrong!',0);	
				}
				
			}
				
			
			  }
			  
			  ?>

</div><!--/.heading section-->
<form id="job_apply_form" name="job_apply_form" action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                <div class="row">
                <div class="col-md-4" style="margin: 0 auto;  float: none;">
				<br>
<center><img src="../img/ejobs-logo.png" alt="img" width="250" class="img-responsive"></center>
<h3>Login</h3>

				
				
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Name  <small>*</small></label>
                      <input name="form_name" type="text" placeholder="Enter Name" required="" class="form-control" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Password <small></small></label>
                      <input name="form_pass" class="form-control email" type="password" placeholder="Password" aria-required="true">
                    </div>
                  </div>
                </div>
				<div class="form-group" style="display:none;">
				<label>Stuff Type <small></small></label>
                  <select name="type" class="form-control required" required="">
                            <option value="Online">Online </option>
                            <option value="Offline">Offline </option>		
                          </select>
                </div>
				
				<div class="form-group">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" name="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">SUBMIT</button>
                </div>
              </div>
              </div>
      </form>
<div class="submit-ct">


</div>

<div class="already-exist">

</div><!--/.already exist-->

</div>
</div>  <!--/.container-->
   </section>
   <!--/.container-->
</div>
</div>
<!--/.courses-->
<!--classes-->
<!--our brands-->

<!--/.our brands-->
<?php //include('../footer.php')?>

