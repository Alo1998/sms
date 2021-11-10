<?php
  include_once 'dbcon.php';
  session_start();

  

if(isset($_POST['registration'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $c_password = $_POST['c_password'];
     
     $photo = explode('.',$_FILES['photo']['name']);
     $photo = end($photo);
     $photo_name = $username.'.'.$photo;

     $input_error = array();

      if(empty($name)){
        $input_error['name']="The name field is required";
      }

      if(empty($email)){
        $input_error['email']="The email field is required";
      }

      if(empty($username)){
        $input_error['username']="The username field is required";
      }

      if(empty($password)){
        $input_error['password']="The password field is required";
      }

      if(empty($c_password)){
        $input_error['c_password']="The confirm password field is required";
      }

    if(count($input_error)==0){
      $email_check = "SELECT * FROM `users` WHERE 'email' = '$email'";
      $email_result = $link->query($email_check);

      if($email_result->rowCount()==0){
        $username_check = "SELECT * FROM `users` WHERE 'username' = '$username'";
        $username_result = $link->query($username_check);

        if($username_result->rowCount()==0){
           if(strlen($username)>3){
            if(strlen($password)>3){
             if($password==$c_password){
              $password = md5($password);
                $sql = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES('$name', '$email', '$username', '$password', '$photo_name', '$inactive')";
               
               try{
                $result = $link->query($sql);
               }catch(Throwable $e){
                 var_dump($e->getMessage());
                $input_error['username']="exist";
               }

  
                 if($result){
                      $_SESSION['data_insert_success']="data insert successs";
                      move_uploaded_file($_FILES['photo']['tmp_name'], __DIR__.'./images/'.$photo_name);

                      header('location: registration.php');
                 }else{
                      $_SESSION['data_insert_error']="data insert error";
                 }
              }else{
               $password_not_match = "Confirm password not match";
             }
            }else{
              $password_l = "Password more than 3 characters";
            }
           }else{
                 $username_l = "username more than 3 characters";
           } 
          } else{
          $username_error = "This username already exists";
          }
        }else{
        $email_error = "This email address already exists";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration</title>

    <!-- Bootstrap -->
    <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="style.css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container mt-5">
<div class="row">
<div class="col-md-6 offset-md-3">
<div class="card" style="background: #70a1ff">
<div class="card-header">
    <h2 class="text-center text-dark">User Registration Form</h2>
    <?php if(isset($_SESSION['data_insert_success'])){ echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} unset($_SESSION['data_insert_success']); ?>
    <?php if(isset($_SESSION['data_insert_error'])){ echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';} unset($_SESSION['data_insert_error']); ?>
<!-- <hr /> -->
<div class="card-body">
<form action="" method="POST" enctype="multipart/form-data">
            <div class="">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="enter name">
            </div>

            <label class="error"> <?php if(isset($input_error['name'])){ echo $input_error['name']; } ?> </label>
                <div class="">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" placeholder="enter email">
                </div>
                <label class="error"> <?php if(isset($email_error['email'])){ echo $email_error; } ?> </label>
                <label class="error"> <?php if(isset($input_error['email'])){ echo $input_error['email']; } ?> </label>

                  <div class="">
                  <label for="">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="enter username">
                  </div>
            <label class="error"> <?php if(isset($input_error['username'])){ echo $input_error['username']; } ?> </label>
            <label class="error"> <?php if(isset($username_error)){ echo $username_error; } ?> </label>
            <label class="error"> <?php if(isset($username_l)){ echo $username_l; } ?> </label>
            
              <div class="">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" placeholder="enter password">
              </div>
              <label class="error"> <?php if(isset($input_error['password'])){ echo $input_error['password']; } ?> </label>
              <label class="error"> <?php if(isset($password_l)){ echo $password_l; } ?> </label>

                  <div class="">
                  <label for="">confirm Password</label>
                  <input type="password" name="c_password" class="form-control" placeholder="enter confirm password">
                  </div>
                  <label class="error"> <?php if(isset($input_error['c_password'])){ echo $input_error['c_password']; } ?> </label>
                  <label class="error"> <?php if(isset($password_not_match)){ echo $password_not_match; } ?> </label>

                  <div class="">
                  <label for="">Photo</label>
                  <input type="file" name="photo" class="form-control" placeholder="enter photo">
                  </div><br>
                    <div>
                    <input type="submit" value="Registration" name="registration" class="btn btn-primary btn-block">
                    </div>
    </form>
    </div>
    </div>
  </div>
  </div>
</div>
<br/>
    <p class="text-center">If you have an account? then please <a href="login.php">Login</a></p>
    <hr/>
    <br/>
    <footer>
      <p class="text-center">copyright &copy: 2019-2020<?php date('Y') ?> Students Management System.All Rights Reserved.</p>
    </footer>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>