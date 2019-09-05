<?php
include("../config/db.php");

if(isset($_POST['save_task'])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    echo $title,$description;
}



function Consulta($title,$description){
    $query = 'INSERT INT task('.$title.','.$description.')';
    echo $query;
}