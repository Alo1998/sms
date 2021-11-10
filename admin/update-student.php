<h2 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small>Update Student</small></h2>
            <ol class="breadcrumb">
                <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="index.php?page=all-students"><i class="fa fa-users"></i> All Student</a></li>
                <li class="active"><i class="fa fa-pencil-square-o"></i> Update Student</li>
             </ol>
    <?php 
    $id = base64_decode($_GET['id']);
    $sql = "SELECT * FROM `students info` WHERE id = '$id'";
    $stmt = $link->query($sql);
    $result = $stmt->fetch();



    if(isset($_POST['update-student'])){

        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $city = $_POST['city'];
        $pcontact = $_POST['pcontact'];
        $class = $_POST['class'];
       
        


        $sql = "UPDATE `students info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE id='$id'";
        $result = $link->query($sql);
       
        if($result){
            header('location: index.php?page=all-students');
        }else{
            echo "error";
        }
       }

    ?>


<div class="row">
    <?php if(isset($success)){ echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';} ?>
    <?php if(isset($error)){ echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>';} ?>

</div>
<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="name">Student Name</label>
              <input type="text" name="name" placeholder="student name" id="name" class="form-control" required="" value="<?php echo $result['name']; ?>">
          </div>
          <div class="form-group">
              <label for="roll">Student Roll</label>
              <input type="text" name="roll" placeholder="student Roll" id="roll" class="form-control" required="" value="<?php echo $result['roll']; ?>">
          </div>
          <div class="form-group">
              <label for="city">City</label>
              <input type="text" name="city" placeholder="City" id="city" class="form-control" required="" value="<?php echo $result['city']; ?>">
          </div>
          <div class="form-group">
              <label for="pcontact">PContact</label>
              <input type="text" name="pcontact" placeholder="01*******" id="pcontact" class="form-control" required="" value="<?php echo $result['pcontact']; ?>">
          </div>
          <div class="form-group">
              <label for="class">Class</label>
             <select id="class" class="form-control" name="class" required="">
                 
                 <option selected></><?php echo $result['class']; ?></option>
                 <option value="1st">1st</option>
                 <option value="2nd">2nd</option>
                 <option value="3rd">3rd</option>
                 <option value="4th">4th</option>
                 <option value="5th">5th</option>
             </select>
          </div>

          <div class="form-group">
           <input type="submit" value="Update Student" name="update-student" class="btn btn-primary btn-sm pull-right"><br><br>
          </div>
        </form>
    </div>
</div>