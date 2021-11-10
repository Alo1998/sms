<?php
include_once 'dbcon.php';
session_start();

if(isset($_SESSION['user_login'])){
  header('location: index.php');
}

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];



  $sql = "SELECT * FROM `users` WHERE username = '$username'";
  $username_check = $link->query($sql);

  
  if($username_check->rowCount()>0){
     $row = $username_check->fetch();
     if($row['password']==md5($password)){
       if($row['status']=='active'){
         $_SESSION['user_login'] = $username;
          header('location: index.php');
       }else{
         $status_inactive = "your status inactive";
       }
      } else{
      $wrong_password = "This password is wrong";
     }
    }else{
    $username_not_found = "This username not found";
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
    <title>login</title>

    <!-- Bootstrap -->
    <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
    <h2 class="text-center">Students Management System</h2>
        <br/>
    <div class="row">
    <div class="col-md-4 offset-md-4">
      <div class="card bg-dark">
      <h3 class="text-center text-white mt-2">Admin Login Form</h3>
        <div class="card-body">
        <form action="login.php" method="POST">
       <div class="form-group">
       <input type="text" placeholder="username" name="username" required="" class="form-control" />
       </div>
       <div class="form-group">
       <input type="password" placeholder="password" name="password" required="" class="form-control" />
       </div>
          <br/>
       <div>
           <input class="btn btn-primary float-right" type="submit" name="login" value="Login" />
           <div><a class="btn btn-danger" href="../">Back</a></div>
       </div>
       </form>
        </div>
      </div>
    </div>
    </div>
    <br>
    <?php if(isset($username_not_found)){echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$username_not_found.'</div>';} ?>
    <?php if(isset($wrong_password)){echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$wrong_password.'</div>';} ?>
    <?php if(isset($status_inactive)){echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$status_inactive.'</div>';} ?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>