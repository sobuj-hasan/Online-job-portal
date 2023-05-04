<?php
include ('header.php');

  $cmp_author_id = $_SESSION['snm_ejob_cmp_id'];

?>
</head>
<body>
  <div class="container-scroller">
    <?php include ('nav.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel bg-light">
        <!--Latest Resumes Start-->
        <div class="row">
          <div class="col-md-12 col-sm-12 m-auto">

            <div class="card text-white mb-3 my-4">
              <div class="card-header bg-info h6">
                Candidates applying With form
              </div>
              <div class="card-body">

                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">SI NO</th>
                      <th scope="col">Name</th>
                      <th scope="col">Phone NO</th>
                      <th scope="col">Email Address</th>
                      <th scope="col">Message</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="text-gray">
                    <?php
                       if(isset($_SESSION['delete_applied_form'])){
                       ?>
                       <div class="alert alert-success mb-2">
                       <?php
                          echo $_SESSION['delete_applied_form'];
                          unset($_SESSION['delete_applied_form']);
                          ?>
                       </div>
                       <?php
                      }
                    ?>

                    <?php
                      // applied with form show query 
                      $select = "SELECT * FROM guest_apply";
                      $form_applyed = mysqli_query($np2con, $select);
                      $serial_no = 1;
                      foreach ($form_applyed as $single_apply) {
                        ?>
                          <tr>
                            <th scope="row"><?php echo $serial_no++ ?></th>
                            <td><?=$single_apply['name']?></td>
                            <td><?=$single_apply['phone']?></td>
                            <td><?=$single_apply['email']?></td>
                            <td><?=$single_apply['message']?></td>
                            <td>
                              <a target="blank" class="btn btn-sm btn-outline-info mt-1" href="http://www.gmail.com"><i class="fa fa-paper-plane-o"></i></a>
                              <a class="btn btn-sm btn-outline-danger mt-1" href="applied-form-delete.php?apply_id=<?=$single_apply['id']?>"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                        <?php
                        if($single_apply == ""){
                          ?>
                            <tr>
                              <td colspan="60">Nothig to Show</td>
                            </tr>
                          <?php
                        }
                      }
                    ?>
                  </tbody>
              </table>

              </div>
            </div>

          </div>
        </div>
        <!--Latest Resumes End-->
        <div class="row">

        </div>
      </div>
    </div>
  </div>
</body>
<?php include ('footer.php');?>