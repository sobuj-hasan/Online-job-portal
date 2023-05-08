<?php
  $cmp_author_id = $_SESSION['snm_ejob_cmp_id'];
    $select_query = "SELECT * FROM company_author WHERE cmp_id = '$cmp_author_id'";
    $user_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

?>
<nav class="navbar horizontal-layout col-lg-12 col-12 p-0" style="background:#666; height:30px;">
      <div class="container d-flex flex-row">
         <p style="line-height:30px; Color:white;">Company Dashboard</p>
      </div>
</nav>
	<!-- this is navbar -->
<nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="container d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top">
          <a class="navbar-brand brand-logo" href="images/logo.png" alt="logo"/></a>
          <!-- <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../images/logo.png" alt="logo"/></a> -->
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
            <li class="nav-item dropdown" >
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="images/profile_image/<?=$user_info['cmp_photo']?>" alt="Profile image">
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom w-100">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center flex-grow-1"><i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i></div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right flex-grow-1"><i class="mdi mdi-account-outline mr-0 text-gray"></i></div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center flex-grow-1"><i class="mdi mdi-alarm-check mr-0 text-gray"></i></div>
                  </div>
                </a>
                  <a class="dropdown-item" href="#">
                    Payment Status
                  </a>
                  <a class="dropdown-item" href="profile.php">
                    Edit Profile
                  </a>
                  <a class="dropdown-item" href="change-password.php">
                    Change Password
                  </a>
                  <a class="dropdown-item" href="#">
                    Support
                  </a>
                  <a class="dropdown-item" href="#">
                    User Management
                  </a>
                  <a href="../company-logout.php" class="dropdown-item">
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
      <div class="nav-bottom" style="background: #114059;">
        <div class="container">
          <ul class="nav page-navigation" style="background: #114059;">
            <li class="nav-item mega-menu">
              <a href="company" class="nav-link"><i class="link-icon mdi mdi-message-outline"></i><span class="menu-title">Add New Company</span></a>
            </li>
            <li class="nav-item">
              <a href="company-panel.php" class="nav-link"><i class="link-icon mdi mdi-home-outline "></i><span class="menu-title">Companie's Panel</span></a>
            </li>
            <li class="nav-item">
              <a href="company-cv-bank.php" class="nav-link"><i class="link-icon mdi mdi-cart-plus"></i><span class="menu-title">CV Bank</span></a>
            </li>
            <li class="nav-item mega-menu">
              <a href="manage-company.php" class="nav-link"><i class="link-icon mdi mdi-heart"></i><span class="menu-title">Manage Company</span></a>
            </li>
            <li class="nav-item">
              <a href="applied-form.php" class="nav-link"><i class="link-icon mdi mdi-basket-fill"></i><span class="menu-title">Apply With Form</span></a>
            </li>
            <li class="nav-item">
              <a href="cjp-manage.php" class="nav-link"><i class="link-icon mdi mdi-basket-fill"></i><span class="menu-title">post a Job</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>