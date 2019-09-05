<?php include('db.php') ?>

<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
            $date = $row['create_id'];
        }
    }


    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        echo $title;
        echo $description;

        $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Task update successfully';
        $_SESSION['message_type'] = 'info';
        header("location: index.php");
    }
?>

<?php include('includes/_header.php'); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <h6 class="card-title">Task created on:</h6>
                <h6 class="card-subtitle mb-3 ml-3 mt-1 text-muted"><?php echo $date; ?></h6>
                <form action="edit-task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="New task name">
                    </div>
                    <div class="form-group">
                        <textarea rows="2" name="description" class="form-control" placeholder="New task description"><?php echo $description; ?></textarea>
                    </div>
                    <div class="from-group">
                        <button class="btn btn-success btn-block" name="update">
                            <i class="fas fa-save"></i>
                             Update  
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/_footer.php'); ?>