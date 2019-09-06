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
        $_SESSION['message_type'] = 'primary';
        header("location: index.php");
    }
?>

<?php include('includes/_header.php'); ?>

<div class="container p-4">
    <div class="card mt-m box-shadow-m">
        <div class="card-header-b">
            <h4 class="card-title">Task created on:</h4>
            <h5 class="card-subtitle"><?php echo $date; ?></h5>
        </div>
        <div class="card-body">
            <form action="edit-task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="">
                    <input type="text" name="title" value="<?php echo $title; ?>" class="form-component" placeholder="New task name" autofocus>
                    <textarea rows="2" name="description" class="form-component form-text" placeholder="New task description"><?php echo $description; ?></textarea>
                </div>
                <button class="btn btn-plaz btn-block-100" name="update">
                    <i class="fas fa-save"></i>
                        Update  
                </button>
            </form>
        </div>
    </div>
</div>

<?php include('includes/_footer.php'); ?>