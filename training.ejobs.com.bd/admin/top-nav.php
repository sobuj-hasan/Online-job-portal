  <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo" style="background-color: #dda25b;">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="index.html">
                            <img class="img-fluid" style="    max-width: 95%;    height: auto;    padding-right: 41px;" src="assets/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                             <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="<?php echo $de_user_profile?>" style="border-radius: 50%;" class="img-radius" alt="User-Profile-Image">
                                    <span><?php echo $di_stf_name?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                   
            
                                    <li>
                                        <a href="profile.php">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
									 <li>
                                        <a href="notifications.php">
                                            <i class="ti-comments"></i> Notifications
                                        </a>
                                    </li>
									<li>
                                        <a href="logout.php">
                                            <i class="ti-face-sad"></i> Logout
                                        </a>
                                    </li>
            
                                   
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
          