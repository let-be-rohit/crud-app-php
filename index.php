
<?php include("./header.php"); ?>
<?php include("./dbcon.php"); ?>
    
    <div class="box1">
    <h2>ALL STUDENTS</h2>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
  ADD STUDENTS
</button>
    </div>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $getStudents = $conn->prepare("SELECT * FROM students");
        $getStudents->execute();
        $students = $getStudents->fetchAll();

        foreach($students as $student){
        
        ?>
            <tr>
                <td><?php echo $student["id"]; ?></td>
                <td><?php echo $student["first_name"]; ?></td>
                <td><?php echo $student["last_name"]; ?></td>
                <td><?php echo $student["age"]; ?></td>
                <td><a href="update_page.php?id=<?php echo $student["id"]; ?>" class="btn btn-success">Update</a></td>
                <td><a href="delete_page.php?id=<?php echo $student["id"]; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        }
    
    ?>
        </tbody>
    </table>

    <?php

    if(isset($_GET["message"])){
      echo '<h6>'. $_GET["message"] .'</h6>';
    }
    
    ?>
    <?php

    if(isset($_GET["inst_msg"])){
      echo '<h6>'. $_GET["inst_msg"] .'</h6>';
    }
    
    ?>

    <?php

    if(isset($_POST["update_msg"])){
      echo '<h6>'. $_POST["update_msg"] .'</h6>';
    }
    
    ?>
    <?php

    if(isset($_GET["delete_msg"])){
      echo '<h6>'. $_GET["delete_msg"] .'</h6>';
    }
    
    ?>

    <!-- Modal -->
    <form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">ADD STUDENTS</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" class="form-control">
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" class="form-control">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control">
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success" name="add_students" value="ADD">
          </div>
        </div>
      </div>
    </div>
    </form>
    <?php include("./footer.php"); ?>
   