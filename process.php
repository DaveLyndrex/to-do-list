<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'todo') or die(mysqli_error($mysqli));

$id = 0;
$update =false;
$task='';

if (isset($_POST['submit'])){
    $task = $_POST['task'];
   

   
    $mysqli->query("INSERT INTO tasks(task) VALUES 
    ('$task')") or die ($mysqli->error);

    $_SESSION['message'] = '<script>alert("Record has been saved!")</script>';
    $_SESSION['msg_type'] = "Success";
    
    header("location: index.php");

}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM tasks WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = '<script>alert("Record has been deleted!)"</script>';
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update =true;
    $result = $mysqli->query("SELECT * FROM tasks WHERE id=$id")or die ($mysqli->error);
    if (count([$result]) == 1){
        $row = $result->fetch_array();
        $task = $row['task'];
        
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $task= $_POST['task'];
    

    $mysqli->query("UPDATE tasks SET task='$task' WHERE id=$id") 
    or die($mysqli->error);

    $_SESSION['message'] = '<script>alert("Record updated successfully!")</script>';
    

    header("location: index.php");
}
?> 