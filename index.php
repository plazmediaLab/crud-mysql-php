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

                </div>

                <?php if(isset($_SESSION['message'])){ ?>
                        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show mt-3" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                <?php session_unset(); } ?>

            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo $row['create_id'] ?></td>
                                <td>
                                    <a href="edit-task.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete-task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php include('includes/_footer.php'); ?>