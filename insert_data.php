<?php
include("./dbcon.php");

if(isset($_POST["add_students"])){
    
    $fName = $_POST["f_name"];
    $lName = $_POST["l_name"];
    $age = $_POST["age"];

    if($fName == "" || empty($fName)){
        header('location:index.php?message=Fill in the first name!');
    }else{
        $insertStudents = $conn->prepare("INSERT INTO `students` (`id`, `first_name`, `last_name`, `age`) VALUES
        (NULL, '$fName', '$lName', '$age')");
        $result = $insertStudents->execute();
        if(!$result){
            die("Query Failed");
        }else{
            header('location:index.php?inst_msg=Your data has been added successfully');
        }
    }
}

?>