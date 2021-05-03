<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php include_once('process.php')?>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Edit Task</a>
            <button type="button" class="btn btn-outline-light">Go back</button>
        </div>
    </nav>
    <div class="container mt-5" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;border-radius:10px; width:30%;">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <br>
            <div class="mb-3">
                <label for="InputTask" class="form-label">Task:</label>
                <input type="text" name="task" class="form-control" id="inputTask" placeholder="Task" value="<?php echo $task;?>">
            </div>
            <?php 
                if ($update == true):
            ?>
            <button type="submit" name="update" class="btn btn-info">Update</button>
            <?php endif;?>
        </form>
    </div>
</body>

</html>