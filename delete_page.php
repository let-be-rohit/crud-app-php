<?php include("./dbcon.php"); ?>

<?php

if(isset($_GET["id"])){
    $id = $_GET['id'];
}

$getStudent = $conn->prepare("DELETE FROM students WHERE `id` = '$id' ");
$result = $getStudent->execute();

if(!$result){
    die("Query Failed".ERRMODE_EXCEPTION);
}else{
    header('location:index.php?delete_msg=You have deleted the record');
}

?>