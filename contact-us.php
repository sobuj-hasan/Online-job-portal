<?php 
include('header.php');

?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>Contact Us</h3>
  </div>
</div>
<!--inner heading end--> 
<!--Inner Content start-->
<div class="inner-content contact-now"> 
<div class="container">  

  <!--Contact Start-->
  <div class="row">
	      <div class="col-md-4">
        <div class="contact"> <span><i class="fa fa-home"></i></span>
          <div class="information"> <strong>Address:</strong>
            <p>ADDL Tower, 67/B Shankar Busstand, Oposite of IBN SINA Hospital, Dhanmondi-27 Dhaka</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact"> <span><i class="fa fa-phone"></i></span>
          <div class="information"> <strong>Phone No:</strong>
            <p>+88 01302509844</p>
            <p>+88 01986773870</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact"> <span><i class="fa fa-envelope"></i></span>
          <div class="information"> <strong>Email Address:</strong>
            <p>sobujhasan388@gmail.com</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row msg-generet">
      <div style="margin-left: 10px;" class="col-md-5">
        <?php
          if(isset($_POST['submit'])){
            $name = htmlspecialchars($_POST['name']);
            $phone = htmlspecialchars($_POST['phone']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            $insert_query = "INSERT INTO `contact_info`(`name`, `phone`, `email`, `message`) VALUES ('$name', '$phone', '$email', '$message')";
            if (mysqli_query($np2con, $insert_query)) {
              $_SESSION['apply_contact_info'] = "Your information has been successfully submitted. Please wait, we will help you fastly!";
            }
            else{
              echo gen_notification('Something informaton wrong, Please currect information!','danger');
            }

          }
        ?>
      </div>
    </div>
    <div class="row formCont">
      <div class="col-md-6">
        <form action="" method="POST">

          <div class="row">
            <?php
              if(isset($_SESSION['apply_contact_info'])){
              ?>
                  <div class="alert alert-success">
                  <?php
                      echo $_SESSION['apply_contact_info'];
                      unset($_SESSION['apply_contact_info']);
                  ?>
                  </div>
              <?php
              }
            ?>
            <div class="col-sm-6">
              <div class="input-wrap">
                <input type="text" placeholder="Full Name" class="form-control" name="name" required>
                <div class="form-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-wrap">
                <input type="text" placeholder="Your Phone" class="form-control" name="phone" required>
                <div class="form-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
              </div>
            </div>
          </div>
          <div class="input-wrap">
            <input type="text" placeholder="Your Email" class="form-control" name="email" required>
            <div class="form-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
          </div>
          <div class="input-wrap">
            <textarea class="form-control" placeholder="Type Your Message here.." name="message" required></textarea>
            <div class="form-icon"><i class="fa fa-comment" aria-hidden="true"></i></div>
          </div>
          <div class="contact-btn">
            <button class="sub" type="submit" value="submit" name="submit"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Message</button>
          </div>

        </form>
      </div>
      <div class="col-md-6">
      <div class="mapWrp">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9017185495413!2d90.36687101445585!3d23.750883894675955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf97bcd1e88d%3A0xc83cd5c97da4b55d!2sDigital%20IT%20Institute!5e0!3m2!1sen!2sus!4v1623653564364!5m2!1sen!2sus" width="100" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
      </div>
    </div>
    
    
  <!--Contact End--> 
  
  </div>
</div>
<!--Inner Content End-->


<?php include('footer.php') ?>