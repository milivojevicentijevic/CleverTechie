<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- bootsrap 5.0.0 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>PHP CRUD</title>
</head>
<body>
    <?php require_once 'process.php'; ?>

    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>

    <!-- read - table -->
    <div class="container">
        <div class="row">
            <table class="table caption-top">
                <caption>Names and locations</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $results->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td>
                                <a href="index.php?edit=<?php echo $row['id']; ?>"
                                    class="btn btn-success">Edit</a>
                                <a href="process.php?delete=<?php echo $row['id']; ?>" onClick="return confirm_delete()"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile;  ?>
                </tbody>       
            </table>
        </div>

        <?php
            // function pre_r($array) {
            //     echo '<pre>';
            //     print_r($array);
            //     echo '</pre>';
            // }
        ?>

        <!-- insert - form -->
        <div class="row">
            <div class="container col-md-6 offset-md-3">
                <form action="process.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter your location">
                    </div>
                    <div class="mb-3">
                        <?php if($update == true): ?>
                            <button type="submit" class="btn btn-success" name="update">Update</button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary" name="save">Save</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        function confirm_delete() {
            return confirm('Are you sure?');
        }
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function() {
          $(".alert").remove();
        }, 3000);
      })
    </script>
    <!-- bootsrap 5.0.0 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>