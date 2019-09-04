<?php include('db.php'); ?>

<?php include('includes/_header.php'); ?>


    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <form action="save-task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
                        </div>
                        <input type="submit" value="Save Task" class="btn btn-success btn-block" name="save_task">
                    </form>

                    <?php if(isset($_SESSION['message'])){ ?>
                        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-m-8">
            
            </div>
        </div>
    </div>



<?php include('includes/_footer.php'); ?>