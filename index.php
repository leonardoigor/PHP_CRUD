<?php
include("includes/header.php");
include("config/db.php");
session_start();
?>
<link rel="stylesheet" href="public/css/all.css">
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])){ ?>

            <div class="alert alert-<?= $_SESSION['message_type'];?>" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span arial-hidden="true">&times;</span>
                </button>
                <h4 class="alert-heading"><?= $_SESSION['message'] ?></h4>
            </div>

            <?php session_unset();}  ?>
            <div class="card card-body">
                <form action="views/save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" row="2" class="form-control"
                            placeholder="Task Description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" name="save_task"
                        value="Save Task">Save</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_task =  mysqli_query($conn,$query);;

                    while($row=mysqli_fetch_array($result_task)){ ?>
                    <tr>
                        <td> <?php echo $row['title'] ?></td>
                        <td> <?php echo $row['descriptoon'] ?></td>
                        <td> <?php echo $row['created_at'] ?></td>
                        <td class="d-flex">
                            <a title="EDITAR" href="./views/edit.php?id=<?php echo $row['id']?>"
                                class="flex-fill d-flex align-items-center justify-content-center btn btn-secondary">
                                <i class="fas fa-marker"></i>
                            </a>
                            <a title="DELETAR" href="./views/delete_task.php?id=<?php echo $row['id']?>"
                                class="flex-fill d-flex align-items-center justify-content-center btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php }  ?>
                </tbody>

            </table>
        </div>

    </div>
</div>
<script src="public/js/all.js"></script>
<?php
include("includes/footer.php");
?>