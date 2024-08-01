<?php include("./header.php"); ?>
<?php include("./dbcon.php"); ?>

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $getStudent = $conn->prepare("SELECT * FROM students WHERE `id` = '$id' ");
        $getStudent->execute();
        $student = $getStudent->fetchAll();

        $fname = $student[0]['first_name'];
        $lname = $student[0]['last_name'];
        $age = $student[0]['age'];

}

?>

<?php

if(isset($_POST['update_students'])){
    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }
    
    $id = $_POST['update_students'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $age = $_POST['age'];  

    include("./dbcon.php");

    $updateStudent = $conn->prepare("UPDATE students SET 
    `first_name` = '$f_name',
    `last_name` = '$l_name',
    `age` = '$age'
    WHERE id='$idnew'");
    $updateStudent->execute();

    if(!$updateStudent){
        die("Query Failed".ERRMODE_EXCEPTION);
    }else{
        header('location:index.php?update_msg=You have successfully updated');
    }
}

?>

<form action="update_page.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $fname ?>">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo $lname ?>">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $age ?>">
    </div>
    <br>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>







<?php include("./footer.php"); ?>