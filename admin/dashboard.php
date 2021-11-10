<h2 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>Students Overview</small></h2>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
             </ol>


             <?php 
             $sql = "SELECT * FROM `students info`";
             $student_count = $link->query($sql);
             $total_student = $student_count->rowCount();

             $result = "SELECT * FROM `students info`";
             $user_count = $link->query($result);
             $total_user = $user_count->rowCount();
           
              ?>

            <div class="row">
              <div class="col-sm-4">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-9">
                    <div class="pull-right" style="font-size: 45px"><?php echo $total_student; ?></div>
                    <div class="clearfix"></div>
                    <div class="pull-right">All Students</div>
                  </div>
                </div>
                </div>
               <a href="index.php?page=all-students">
                  <div class="panel-footer">
                    <span class="pull-left">All Students</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                    <div class="clearfix"></div>
                    </div>
               </a>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-9">
                    <div class="pull-right" style="font-size: 45px"><?php echo $total_user; ?></div>
                    <div class="clearfix"></div>
                    <div class="pull-right">All Users</div>
                  </div>
                </div>
                </div>
               <a href="index.php?page=all-users">
                  <div class="panel-footer">
                    <span class="pull-left">All Users</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                    <div class="clearfix"></div>
                    </div>
               </a>
                </div>
              </div>
              
            </div>
                     
            <hr />
            <h3>New Student</h3>
            <div class="table-responsive">
            <table id="data" class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                   <th>ID</th>
                  <th>Name</th>
                  <th>Roll</th>
                  <th>City</th>
                  <th>Contact</th>
                  <th>Photo</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $sql = "SELECT * FROM `students info`";
                  $result = $link->query($sql);
                  $fetch = $result->fetchAll();
                  ?>
                      
                  <?php
                  foreach ($fetch as $key => $value){?>
                <tr>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo ucwords($value['name']); ?></td>
                  <td><?php echo $value['roll']; ?></td>
                  <td><?php echo ucwords($value['city']); ?></td>
                  <td><?php echo $value['pcontact']; ?></td>
                 
                  <td><img style="width: 50px" src="student_images/<?php echo $value['photo']; ?>" alt=""></td>
                </tr>
                  <?php } ?>

              </tbody>
              
            
            </table>
            </div>