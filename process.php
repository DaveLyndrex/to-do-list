<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'todo') or die(mysqli_error($mysqli));
$sql = new mysqli('localhost', 'root', '', 'todo') or die(mysqli_error($sql));

$id = 0;
$update = false;
$task = '';

if (isset($_POST['submit'])) {
    $task = $_POST['task'];



    $mysqli->query("INSERT INTO tasks(task) VALUES 
    ('$task')") or die($mysqli->error);

    $_SESSION['message'] = '<script>alert("Record has been saved!")</script>';
    $_SESSION['msg_type'] = "Success";

    header("location: index.php");
}
#softdelete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql->query ("INSERT INTO trash(trash_task) SELECT task FROM tasks WHERE id='" .$_GET["delete"]. "'") or die($sql->error);
    $mysqli->query("DELETE FROM tasks WHERE id=$id") or die($mysqli->error);

 
    header("location: trash.php");
}

#
if(isset($_GET['harddelete'])){
    $id = $_GET['harddelete'];
    $mysqli->query("DELETE FROM trash WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = '<script>alert("Removed from trash!)"</script>';
    $_SESSION['msg_type'] = "danger";

    header("location: trash.php");
    
}
#edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM tasks WHERE id=$id") or die($mysqli->error);
    if (count([$result]) == 1) {
        $row = $result->fetch_array();
        $task = $row['task'];
    }
}
#update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];


    $mysqli->query("UPDATE tasks SET task='$task' WHERE id=$id")
        or die($mysqli->error);

    $_SESSION['message'] = '<script>alert("Record updated successfully!")</script>';


    header("location: index.php");
}
