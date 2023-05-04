
<nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                
								
								
								
						
                            </ul>
                         	
						  <?php 
						$allowed=array('Call Manager', 'General manager', 'Admin', 'Leader', 'Supporter', 'Accounts manager');
						if (in_array($di_stf_desiganation_name,$allowed)){	  
							  
							echo '
							<ul class="pcoded-item pcoded-left-item">	
							<li class="pcoded">
                                    <a href="online-students.php">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext" >Online Students</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                  
                                </li>
                            </ul>
							<ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded ">
                                    <a href="online-due-students.php">
                                        <span class="pcoded-micon"><i class="ti-briefcase"></i><b>M</b></span>
                                        <span class="pcoded-mtext" >Online Due Students</span>
                                      
                                    </a>
                                     </li>
                            </ul>

							';  
						  }
						  
						  
						  ?>
						 
						 <?php 
						$allowed=array('Administrator', 'Admin');
						if (in_array($di_stf_desiganation_name,$allowed)){
							  
							echo '
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-ruler-pencil"></i></span>
                                        <span class="pcoded-mtext"  >BLOG MANAGEMENT</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
									<li class=" ">
                                            <a href="all-blog-post.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">ALL BLOG POST</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="add-new-post.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">ADD NEW BLOG POST</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                           <li class=" ">
                                            <a href="add-catagory.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">ADD Catagory</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
								
								
								
						  </ul>';	
						  }
							?>
							
							
							
							 <?php 
						 
						$allowed=array('Administrator', 'Admin','Leader');
						if (in_array($di_stf_desiganation_name,$allowed)){
						 
							echo '
							
							<ul class="pcoded-item pcoded-left-item">  
                              <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-user"></i></span>
                                        <span class="pcoded-mtext"  >STAFF MANAGEMENT</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
									<li class=" ">
                                            <a href="all-staff.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">ALL STAFF</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="add-new-staff.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">ADD STAFF</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="admission-by-staff.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">ADMISSION BY STAFF</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="staff-attendence.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">STAFF ATTENDENCE</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                            </ul>
							';  
							  
						  }
						  ?>
                            
							
							
							
							 <?php 
						
						
						$allowed=array('Owner');
						if (in_array($di_stf_desiganation_name,$allowed)){
						 
							  
							echo '
							
							<ul class="pcoded-item pcoded-left-item">  
                              <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-money"></i></span>
                                        <span class="pcoded-mtext"  >Accounts</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
									
									
                                        <li class=" ">
                                            <a href="total-reports.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Total Reports</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="monthly-reports.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Monthly Reports</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="income-statement.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Income Statement</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                            </ul>
							';  
							  
						  }
						  ?>
                            
						 
                            
                            <ul class="pcoded-item pcoded-left-item">
							
							
							<?php 
						$allowed=array('Owner','Leader','Administrator','Admin');
						if (in_array($di_stf_desiganation_name,$allowed)){
						
							echo '
							 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-flag-alt-2"></i></span>
                                        <span class="pcoded-mtext"  >Manage Batch</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
									<li class=" ">
                                            <a href="create-batch.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Create Batch</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="manage-batch.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Manage Batch</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    
                                        <li class=" ">
                                            <a href="batch-calender.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Batch Calender</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
							';		
							
							
							echo '
							<li>
                                    <a href="manage-course.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manage Course</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
							';  
							
							
							echo '
							
							';
						  }
						  
						  ?>
                                
                          	<?php 
						$allowed=array('Supporter');
						if (in_array($di_stf_desiganation_name,$allowed)){
						  
						  echo '
						  <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded ">
                                    <a href="manage-batchs-supporter.php">
                                        <span class="pcoded-micon"><i class="ti-comments"></i><b>M</b></span>
                                        <span class="pcoded-mtext" >Manage Batch</span>
                                      
                                    </a>
                                     </li>
                            </ul>
						  ';
						  }    
                            ?>        
                                
                                  
                          			<?php 
						$allowed=array('Admin');
						if (in_array($di_stf_desiganation_name,$allowed)){
						  
						  echo '
						  <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-money"></i></span>
                                        <span class="pcoded-mtext"  >Accounts</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
									<li class=" ">
                                            <a href="add-expense.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add Expense</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="total-reports.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Total Reports</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="monthly-reports.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Monthly Reports</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="income-statement.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Income Statement</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
						  ';
						  }    
                            ?>    
                                
                            </ul>
							  
                           	  <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded ">
                                    <a href="notifications.php">
                                        <span class="pcoded-micon"><i class="ti-comments"></i><b>M</b></span>
                                        <span class="pcoded-mtext" >Notifications</span>
                                      
                                    </a>
                                     </li>
                            </ul>
							
                           	  <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded ">
                                    <a href="profile.php">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>M</b></span>
                                        <span class="pcoded-mtext" >Profile</span>
                                      
                                    </a>
                                     </li>
                            </ul>
 <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded ">
                                    <a href="lesson.php">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>M</b></span>
                                        <span class="pcoded-mtext" >Lesson</span>
                                      
                                    </a>
                                     </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded ">
                                    <a href="logout.php">
                                        <span class="pcoded-micon"><i class="ti-face-sad"></i><b>M</b></span>
                                        <span class="pcoded-mtext" >Logout</span>
                                      
                                    </a>
                                     </li>
                            </ul>
                        </div>
                    </nav>                