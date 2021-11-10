<?php 
require_once 'dbcon.php';
$id  = $_GET['id'];
$sql = "SELECT * FROM `users` WHERE id='$id'";
$sql_result = $link->query($sql);
$result = $sql_result->fetch();

if(isset($_POST['profile'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

$sql1 = "UPDATE `users` SET `id`='$id',`name`='$name',`email`='$email',`username`='$username' WHERE id = '$id'";
$res = $link->query($sql1);

if($res){
    echo "Data Update Successful";

header("location: index.php?page=all-users");
}else{
    echo "Error";
}
    
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>userUpadate</title>
  </head>
  <body>
  <div class="container mt-5">
  <div class="row">
  <div class="col-md-6 offset-md-3">
 <div class="card">
 <div class="card-header text-center text-info">
     <h2>User Update</h2>
 </div>
 <div class="card-body">
 <form action="" method="POST">
     <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="enter name" value="<?php echo $result['name']; ?>">
            </div>
            <div class="form-group">
            <label for="">UserName</label>
           <input type="text" name="username" class="form-control" placeholder="enter username" value="<?php echo $result['username']; ?>">
           </div>
           <div class="form-group">
           <label for="">Email</label>
           <input type="text" name="email" class="form-control" placeholder="enter email" value="<?php echo $result['email']; ?>">
           </div>
           <div class="">
               <input type="submit" name="profile" value="Update Profile" class="btn btn-info btn-sm float-right">
           </div>
 </form>
 </div>
 </div>
 </div>
  </div>
  </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>