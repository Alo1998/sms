<h2 class="text-primary"><i class="fa fa-users"></i> All Users <small>All Users</small></h2>
            <ol class="breadcrumb">
                <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-user-plus"></i> All Users</li>
             </ol>




             <div class="table-responsive">
            <table id="data" class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                   
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Photo</th>
                  
                </tr>
              </thead>
              <tbody>
                  <?php
                  $sql = "SELECT * FROM `users`";
                  $result = $link->query($sql);
                  $fetch=$result->fetchAll();
                  
                  ?>
                   
                   <?php
                   foreach ($fetch as $key => $value) {?>  
                  
                <tr>
                  <td><?php echo ($value['name']); ?></td>
                  <td><?php echo ($value['email']); ?></td>
                  <td><?php echo ($value['username']); ?></td>

                  
                  <td><img  height="100" width="100" src="images/<?php echo $value['photo']; ?>" alt=""></td>
                  
                </tr>
                <?php
                }

                ?>
                </tbody>
              
            
            </table>
            </div>