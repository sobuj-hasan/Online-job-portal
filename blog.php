<?php include('header.php') ?>

<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>Job Details</h3>
  </div>
</div>
<!--inner heading end--> 

<?php
$bid = $_GET['bid'];

$query = "SELECT 
			*
			FROM 
			blog
			inner join users
			on blog.b_writer =  users.user_id
			inner join blog_category
			on blog.b_category =  blog_category.bc_id
			where b_status = '1' AND b_permalink = '{$bid}'
			ORDER BY b_id desc
			limit 15
			
			"; 

$result = mysqli_query($np2con,$query) or die(mysqli_error());
// Print out the contents of each row into a table 
while($row = mysqli_fetch_array($result)){
$b_title = $row['b_title'];	
$b_content = $row['b_content'];	
$bc_name = $row['bc_name'];	
$b_thumb = $row['b_thumb'];	
$b_tags = $row['b_tags'];	
$b_date = $row['b_date'];	
$user_name = $row['user_name'];	

if($row['b_thumb'] !== ''){
$pimg = 'upload/image/'.$row['b_thumb'] .'';	
}else {
$pimg = 'img/post-em.jpg	';			
}
$yrdata= strtotime($row['b_date']);
$pdat = date('d-M-Y', $yrdata);	
	
}
?>

<!--Inner Content start-->
<div class="inner-content listing detail">
  <div class="container"> 
    
    <!--Detail page start-->
    <div class="inner-wrap">
      <div class="row">
        <div class="col-md-8">
          <div class="listWrpService jobdetail">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <h3><?php echo $b_title ?></h3>
                <p><?php echo $bc_name ?></p>
                <ul class="featureInfo">
                  <li><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user_name ?></li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $pdat  ?> </li>
                </ul>
              </div>
            </div>
			<center><img src="<?php echo $pimg?>" /></center>
          
            <p> 
			<?php echo $b_content ?>
              <br/>
            </p>
			
			<?php
			if($b_tags != ''){
			echo '<div class="clearfix"></div>
            <h2>Tags</h2>
            <ul class="featureLinks benefits">';	
				
			$myArray = explode(',', $b_tags);
			foreach($myArray as $value){
			echo ' <a href="blog-topic/'.$value.'"><li>'.$value.'</li></a>';	
			}
			echo '</ul>
            <div class="clearfix"></div>';	
			}
			?>
			 			
			
          </div>
        </div>
        <div class="col-md-4">
          <div class="sidebarWrp listWrpService jobdetail">
            <h3>About Company</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut velit eget leo mollis gravida non quis mauris. Maecenas vestibulum, nunc congue aliquam tincidunt, orci metus cursus magna, a vulputate nisl arcu sed elit. Maecenas convallis auctor sodales. Donec non blandit neque.</p>
            <div class="companyInfo">Industry</div>
            <p>Design Communication Studio</p>
            <div class="companyInfo">No. of Employees</div>
            <p>99</p>
            <div class="companyInfo">Location</div>
            <p>New York</p>
            <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.30593401584!2d-74.25986539089548!3d40.69714941954754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2sus!4v1506615745397" width="100" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <form>
              <div class="contactWrp">
                <h3>Contact Now</h3>
                <div class="input-wrap">
                  <input type="text" name="" placeholder="Name:" class="form-control">
                </div>
                <div class="input-wrap">
                  <input type="text" name="" placeholder="Name:" class="form-control">
                </div>
                <div class="input-wrap">
                  <input type="text" name="" placeholder="Your Email" class="form-control">
                </div>
                <div class="input-wrap">
                  <textarea class="form-control" placeholder="Type Your Message here.."></textarea>
                </div>
                <div class="contact-btn">
                  <button class="sub" type="submit" value="submit" name="submitted"> Submit Now</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Detail page end--> 
    
  </div>
</div>
<!--Inner Content end--> 

<?php include('footer.php') ?>
