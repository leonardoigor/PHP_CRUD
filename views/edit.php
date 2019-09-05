<?php include("../config/db.php"); 

session_start();
if(isset( $_GET['id'])){
    $id = $_GET['id'];

    $query= "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) ==1){
        $row = mysqli_fetch_array($result);
       $title= $row['title'];
       $description = $row['descriptoon'];
    }

}
if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['descriptoon'];

    $query = "UPDATE task set title = '$title',descriptoon ='$description' WHERE id=$id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        $_SESSION['message'] = ' Failed on Update Task';
        $_SESSION['message_type'] = 'danger';
        header("location:../index.php");
    }else{
        $_SESSION['message'] = ' Task Updated Successfully';
        $_SESSION['message_type'] = 'primary';
        header("location:../index.php");
    }

}
?>


<?php include('../includes/header.php'); ?>

<div class="contianer">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="http://localhost/PHP_CRUD/views/edit.php?id=<?php echo $_GET['id']  ?>" method="POST">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" value="<?php echo $title ?>"
                            placeholder="update title">
                    </div>
                    <div class="form-group">
                        <textarea style="margin-top: 0px; margin-bottom: 0px; height: 79px;" name="descriptoon"
                            placeholder="update description" rows="10"><?php echo $description ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>