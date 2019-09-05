<?php
include("../config/db.php");
session_start();
if(isset( $_GET['id'])){
    $id = $_GET['id'];

    $query= "DELETE FROM task WHERE id=$id";
    $result = mysqli_query($conn,$query);

    if(!$result){
        $_SESSION['message'] = ' Failed on delete Task';
        $_SESSION['message_type'] = 'danger';
        header("location:../index.php");
    }else{
        $_SESSION['message'] = ' Task Deleted Successfully';
        $_SESSION['message_type'] = 'warning';
        header("location:../index.php");
    }
}

?>