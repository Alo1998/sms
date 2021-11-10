<h2 class="text-primary"><i class="fa fa-users"></i> All Students <small>All Students</small></h2>
            <ol class="breadcrumb">
                <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-user-plus"></i> All Students</li>
             </ol>




             <div class="table-responsive">
            <table id="data" class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                   <th>ID</th>
                  <th>Name</th>
                  <th>Roll</th>
                  <th>Class</th>
                  <th>City</th>
                  <th>Contact</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $sql = "SELECT * FROM `students info`";
                  $result = $link->query($sql);
                  $fetch=$result->fetchAll();
                  
                  ?>
                   
                   <?php
                   foreach ($fetch as $key => $value) {?>  
                  
                <tr>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo ucwords($value['name']); ?></td>
                  <td><?php echo $value['roll']; ?></td>
                  <td><?php echo $value['class']; ?></td>
                  <td><?php echo ucwords($value['city']); ?></td>
                  <td><?php echo $value['pcontact']; ?></td>
                 
                  <td><img style="width: 50px" src="student_images/<?php echo $value['photo']; ?>" alt=""></td>
                  <td>
                    <a href="index.php?page=update-student&id=<?php echo base64_encode($value['id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                   
                    <a href="delete_student.php?id=<?php echo base64_encode($value['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
                <?php
                }

                ?>
                </tbody>
              
            
            </table>
            </div>