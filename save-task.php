<?php 

    include('db.php');

    if(isset($_POST['save_task'])){
        if(!empty($_POST['title']) && !empty($_POST['description'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
    
            $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
            $result = mysqli_query($conn, $query);
    
            echo $title . " " . $description;
    
            if(!$result){
                die("Query failed");
            }
    
            $_SESSION['message'] = "Task saved succesfully";
            $_SESSION['message_type'] = "success";
    
            header("Location: index.php");
        } else{
            $_SESSION['message'] = "The fields cannot be empty";
            $_SESSION['message_type'] = "warning";
            header("Location: index.php");
        }
    }

?>