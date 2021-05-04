<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        table {
            border-radius: 10px;
            border-collapse: collapse;
        }

        thead {
            border-radius: 10px;
        }

        table,
        tr,
        td {
            border: none;
        }

        td {
            position: relative;
            padding: 5px 10px;
        }


        tr.strikeout td:before {
            content: " ";
            position: absolute;
            top: auto;
            left: auto;
            border-bottom: 1px solid #111;
            width: auto;
        }
    </style>
</head>

<body>
    <?php require_once 'process.php'; ?>
    <?php
    if (isset($_SESSION['message'])) : ?>

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
        <div class="container">
            <a class="navbar-brand" href="#">PHP CRUD|To-Do-List</a>
            <button type="button" class="btn btn-outline-light">Trash</button>
        </div>
    </nav>
    <br>
    <div class="container" style="width:40%;">
        <button type="button" class="btn btn-outline-dark" id="btn1" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                <input type="text" name="task" class="form-control" id="inputTask" value="<?php echo $task; ?>">
                            </div>
                            <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" style="width: 40%;">
        <table class="table" style="box-shadow:rgba(0, 0, 0, 1) 0px 3px 10px;">
            <thead class="table-dark">
                <tr>

                    <th></th>
                    <th scope="col">Dave To-Do-List</th>
                    <th></th>
                </tr>
            </thead>
            <?php
            while ($row = $result->fetch_assoc()) :
            ?>
                <tr>
                    <td>
                        <label><input type="checkbox" id="checkbox" name="packersOff" class="strikethrough"></label>
                    </td>

                    <td>
                        <?php echo $row['task']; ?>
                    </td>
                    <td>
                        <a href="edit.php?edit=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="color:red"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    </div>

    <script type="text/javascript">
        $('.strikethrough').change(function() {
            if (this.checked) {
                $(this).parent().parent().addClass("strikeout");
            } else {
                $(this).parent().parent().removeClass("strikeout");
            }
        });
    </script>
</body>

</html>