<?php
include("../config/db.php");

session_start();
if(isset($_POST['save_task'])){
    $title=$_POST['title'];
    $description=$_POST['description'];



    $query = "INSERT INTO task(title,descriptoon)
    VALUES('$title','$description')";

    $result= mysqli_query($conn,$query);
    if(!$result){
        $_SESSION['message'] = ' Failed on save Task';
        $_SESSION['message_type'] = 'danger';
        header("location:../index.php");
    }else{
        $_SESSION['message'] = 'Task Saved Successfully';
        $_SESSION['message_type'] = 'success';
        header("location:../index.php");
    }


}