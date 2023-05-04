<!--Online Job Portal footer start-->
<div class="footer-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <div class="footer-logo"><a href=""><img width="140px" src="images/footer-logo.png" alt="LOGO"></a></div>
        <p>Online Job Portal featured jobs are shown here, You select the job according to your skill. Apply by clicking on & Apply Now If you have not created your CV at Online Job Portal, create a CV, Online Job Portal featured jobs are shown here, You select the job according to your skill. Apply by clicking on & Apply Now If you have not created your CV at Online Job Portal, create a CV.</p>
       
      </div>
      <div class="col-md-8 col-sm-12">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-6">
            <h3>Quick  LInks</h3>
            <ul class="footer-links">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Career Resources</a></li>
              <li><a href="#">Faq</a></li>
              <li><a href="#">Terms of Service</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Submit Resume</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-6">
            <h3>Online Job Portal in Bangladesh</h3>
            <ul class="footer-links">
              <li><a href="">Dhaka</a></li>
              <li><a href="">Khulna</a></li>
              <li><a href="">Barishal</a></li>
              <li><a href="">Chittagong</a></li>
              <li><a href="">Mymensingh</a></li>
              <li><a href="">Rajshahi</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <h3>Jobs by Categories</h3>
            <ul class="footer-links">

              <?php
                // job category daynamic
                $select = "SELECT * FROM job_category ORDER BY rand() LIMIT 7";
                $categories = mysqli_query($np2con,$select);

                foreach ($categories as $category) {
                  ?>
                    <li>
                      <a href="category-wise-job.php?cat_id=<?=$category['jb_id']?>"><?=$category['jb_cat_name']?></a>
                    </li>
                  <?php 
                }    

              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Online Job Portal footer end--> 

<!--Online Job Portal copyright start-->
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6">
        <div class="copyright">Copyright Software Development-2 Group - 03 (42220100057, 42220100089) - All Rights Reserved.</div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="social">
          <div class="followWrp"> <span>Follow Us</span>
            <ul class="social-wrap">
              <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Online Job Portal javascript section -->
<script src="js/jquery-2.1.4.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.js"></script> 
<script type="text/javascript" src="js/script.js"></script>

<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>
    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "1413597302214120");
      chatbox.setAttribute("attribution", "biz_inbox");
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
<!-- Messenger Chat Plugin Code End -->
</body>
</html>