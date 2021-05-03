<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">
    <title>Product Entry</title>

    <style>
        body {
            font-family: 'Pangolin', cursive;
        }
        .selector-for-some-widget {
            box-sizing: content-box;
        }

        #btn1 {
            float: right;
        }
      
    </style>
</head>

<body>
<?php require_once 'process.php';?>
<?php
    if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
</div>
<?php endif ?>

<?php
    $mysqli = new mysqli('localhost', 'root', '', 'todo') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM tasks") or die($mysqli->error);
?>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHP CRUD|To-Do-List</a>
        </div>
    </nav>
    <br>
    <div class="container">
        <button type="button" class="btn btn-outline-dark" id="btn1" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Add New Task
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="process.php" method="POST">
                                <div class="mb-3">
                                    <label for="inputTask" class="form-label">Task</label>
                                    <input type="text" name="task" class="form-control" id="inputTask" value="<?php echo $task;?>">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    <div class="container">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th></th>
                    <th scope="col">Task Number</th>
                    <th scope="col">Tasks</th>
                    <th scope="action">Action</th>
                </tr>
            </thead>
           <?php    
                while ($row =   $result->fetch_assoc()):
           ?>
          <tr>        
                    <td>
                      <label><input type="checkbox" name="packersOff" class="strikethrough"></label>
                    </td>
					<td>
						<?php echo $row['id']; ?>
					</td>
					<td>
						<?php echo $row['task']; ?>
					</td>
					<td>
                    <a href="edit.php?edit=<?php echo $row['id'];?>"
                        class="btn btn-info">Edit</a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>"
                        class="btn btn-danger">Delete</a>
					</td>		
				</tr>
            <?php endwhile;?>
        </table>
    </div>
</div>

<script type="text/javascript">
        function check() {
          if($("#checked").is(":checked")){
             alert("Thanks for Attending");
            $(this).attr('disabled','disabled');
            }
       
          }
        
    </script>
</body>
</html>