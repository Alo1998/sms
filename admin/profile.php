<h2 class="text-primary"><i class="fa fa-user"></i> User-Profile <small>My Profile</small></h2>
            <ol class="breadcrumb">
                <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-user"></i> Profile</li>
             </ol>

             <?php
             $session_user =  $_SESSION['user_login'];
             
             $sql = "SELECT * FROM `users` WHERE username='$session_user'";
             $user_data = $link->query($sql);
             $result = $user_data->fetch();
             
             ?>

             <div class="row">
                 <div class="col-sm-6">
                  <table class="table table-bordered">
                      <tr>
                          <td>User Id</td>
                          <td><?php echo $result['id']; ?></td>
                      </tr>
                      <tr>
                          <td>Name</td>
                          <td><?php echo ucwords($result['name']); ?></td>
                      </tr>
                      <tr>
                          <td>Username</td>
                          <td><?php echo $result['username']; ?></td>
                      </tr>
                      <tr>
                          <td>Email</td>
                          <td><?php echo $result['email']; ?></td>
                      </tr>
                      <tr>
                          <td>status</td>
                          <td><?php echo ucwords($result['status']); ?></td>
                      </tr>
                      <tr>
                          <td>Signup Date</td>
                          <td><?php echo $result['datetime']; ?></td>
                      </tr>
                  </table>
                  
                 </div>
                 <div class="col-sm-6">
                     <a href="">
                         <img width="170" height="170" class="img-thumbnail" src="images/<?php echo $result['photo']; ?>" alt="">
                     </a>
                     <br>
                     
                        <?php
                        $session_user =  $_SESSION['user_login'];
                        if(isset($_POST['upload'])){
                            $photo = explode('.',$_FILES['photo']['name']);
                            $photo = end($photo);
                            $photo_name = $session_user.'.'.$photo;

                            $sql = "UPDATE `users` SET `photo`= '$photo_name' WHERE username='$session_user'";
                            $upload = $link->query($sql);
                            if($sql){
                                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
                            }
                        }
                        ?>

                     <form action="" method="POST" enctype="multipart/form-data">
                         <label for="photo">Profile Picture</label>
                         
                        </form>
                 </div>
             </div>