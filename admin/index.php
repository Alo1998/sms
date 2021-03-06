<?php
session_start();
include_once 'dbcon.php';
if(!isset($_SESSION['user_login'])){
   header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMS</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="footer.css" rel="stylesheet">
    



    <script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="index.php">Students Management System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
    
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?page=profile"><i class="fa fa-user"></i> Welcome to <?php echo ucwords($_SESSION['user_login']); ?></a></li>
        <li><a href="registration.php"><i class="fa fa-user-plus"></i> Add User</a></li>
        <li><a href="index.php?page=user-profile"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <div class="container-fluid">
     <div class="row">
       <div class="col-sm-3">
       <div class="list-group">
      <a href="index.php?page=dashboard" class="list-group-item active">
       <i class="fa fa-dashboard"></i> Dashboard
      </a>
          <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-user-plus"></i> Add Student</a>
          <a href="index.php?page=all-students" class="list-group-item"><i class="fa fa-users"></i> All Students</a>
          <a href="index.php?page=all-users" class="list-group-item"><i class="fa fa-users"></i> All Users</a>
      
        </div>
       </div>
       <div class="col-sm-9">
         <div class="content">

        <?php 
       
        if(isset($_GET['page'])){
          $page = $_GET['page'].'.php';
        }else{
          $page = "dashboard.php";
        }
         
        if(file_exists($page)){
          include_once $page;
        }else{
          include_once '404.php';
        }
      
        ?>
         


         </div>
       </div>
     </div>
  </div>
   <footer class="footer-area">
     <p>copyright &copy: Students Management System.All rights are reserved</p>
   </footer>
  </body>
</html>