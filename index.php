<?php include("config/db.php");
include("includes/header.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <form action="views/save_task.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Task Title" autofocus>
                </div>
                <div class="form-group">
                    <textarea name="description" row="2" class="form-control" placeholder="Task Description"></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">Save</button>
            </form>
        </div>

        <div class="col-md-8"></div>

    </div>
</div>

<?php
include("includes/footer.php");
?>