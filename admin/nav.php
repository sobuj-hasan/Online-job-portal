<nav class="navbar horizontal-layout col-lg-12 col-12 p-0" style="background:#666; height:30px;">
   <div class="container d-flex flex-row">
      <p style="line-height:30px; Color:white;">Admin Panel</p>
   </div>
</nav>
<!-- this is navbar -->
<nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
  <div class="container d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top">
      <a class="navbar-brand brand-logo" href="<?=http://localhost/online-job-portal?>/"><img src="../images/logo.png" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
      <form class="search-field ml-auto" action="#">
     
      </form>

      <ul class="navbar-nav navbar-nav-right mr-0">
        <li class="nav-item dropdown ml-4">
          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-bell-outline"></i>
            <span class="count bg-warning">4</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="../dashboard/images/profile_image/default.png" alt="Profile-image">
          </a>

          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <a class="dropdown-item p-0">
              <div class="d-flex border-bottom w-100">
                <div class="py-3 px-4 d-flex align-items-center justify-content-center flex-grow-1"><i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i></div>
                <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right flex-grow-1"><i class="mdi mdi-account-outline mr-0 text-gray"></i></div>
                <div class="py-3 px-4 d-flex align-items-center justify-content-center flex-grow-1"><i class="mdi mdi-alarm-check mr-0 text-gray"></i></div>
              </div>
            </a>
            
              <a class="dropdown-item" href="payment.php">
                Payment Statement
              </a>
              <a class="dropdown-item" href="change-password.php">
                Change Password
              </a>
              <a class="dropdown-item" href="../logout.php">
                Sign Out
              </a>
          </div>
        </li>
      </ul>

      <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </div>
  
  <div class="nav-bottom" style="background:
    background: rgb(63,76,107); /* Old browsers */
    background: -moz-linear-gradient(top,  rgba(63,76,107,1) 0%, rgba(63,76,107,1) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top,  rgba(63,76,107,1) 0%,rgba(63,76,107,1) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom,  rgba(63,76,107,1) 0%,rgba(63,76,107,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3f4c6b', endColorstr='#3f4c6b',GradientType=0 ); /* IE6-9 */
    ;">
    <div class="container">
       <ul class="nav page-navigation" style="background:
          background: rgb(63,76,107); /* Old browsers */
          background: -moz-linear-gradient(top,  rgba(63,76,107,1) 0%, rgba(63,76,107,1) 100%); /* FF3.6-15 */
          background: -webkit-linear-gradient(top,  rgba(63,76,107,1) 0%,rgba(63,76,107,1) 100%); /* Chrome10-25,Safari5.1-6 */
          background: linear-gradient(to bottom,  rgba(63,76,107,1) 0%,rgba(63,76,107,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3f4c6b', endColorstr='#3f4c6b',GradientType=0 ); /* IE6-9 */
          ">
          <li class="nav-item">
             <a href="<?=http://localhost/online-job-portal?>/admin/" class="nav-link"><i class="link-icon mdi mdi-home-outline "></i><span class="menu-title">eJobs</span></a>
          </li>
          <li class="nav-item mega-menu">
             <a href="total-users.php" class="nav-link"><i class="link-icon mdi mdi-heart"></i><span class="menu-title">User  Manage</span></a>
          </li>
          <li class="nav-item">
             <a href="company-management.php" class="nav-link"><i class="link-icon mdi mdi-cart-plus"></i><span class="menu-title">Company Manage</span></a>
          </li>
          <li class="nav-item mega-menu">
             <a href="job-management.php" class="nav-link"><i class="link-icon mdi mdi-message-outline"></i><span class="menu-title">Post Job Manage</span></a>
          </li>
          <li class="nav-item">
             <a href="#" class="nav-link"><i class="link-icon mdi mdi-basket-fill"></i><span class="menu-title">Help & Support</span></a>
          </li>
          <li class="nav-item">
             <a href="payment.php" class="nav-link"><i class="link-icon mdi mdi-bank"></i><span class="menu-title">Payments</span></a>
          </li>
       </ul>
    </div>
  </div>
</nav>