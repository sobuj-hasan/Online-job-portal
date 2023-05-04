<?php include('header.php');

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
                            
						<?php
						//ref admin to author
						echo "SELECT * FROM pay_log Inner join online_students ON online_students.st_id = pay_log.pl_student Inner Join online_courses on online_courses.oc_id = online_students.st_course_name Where pl_author = 'Ejob-Admin' ";
				$query = mysqli_query($np2con,"SELECT * FROM pay_log Inner join online_students ON online_students.st_id = pay_log.pl_student Inner Join online_courses on online_courses.oc_id = online_students.st_course_name Where pl_author = 'Ejob-Admin' ");
				while ($rowe = mysqli_fetch_array($query)) {
				echo $pl_student = $rowe['pl_student'];	
				$pl_id = $rowe['pl_id'];	
				$queryc = mysqli_query($np2con,"SELECT * FROM online_students WHERE st_id = {$pl_student}");
				while ($row = mysqli_fetch_array($queryc)) {
			echo	$st_reference_name = $row['st_reference_name'];
				}

				
					
				/* $stmt2 = $np2con->prepare("UPDATE `pay_log` SET pl_author = ? Where pl_id = ?");
				$stmt2->bind_param('ss',$st_reference_name,$pl_id);
				if ($stmt2->execute()) {
				echo $pl_student.'~'.$st_reference_name.'<br>';	
				} */
			
			
				}
						
						?>


							</div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>

   <?php include('footer.php') ?>