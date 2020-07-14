<?php

//Conect Database 
include('./config/db_connect.php');

//write queries for all the subscribers
$sql = 'SELECT id, email, created_at from subscriptions';

//make query 
$results = mysqli_query($conn, $sql);

//fetch the resulting rows as an array 
$users = mysqli_fetch_all($results, MYSQLI_ASSOC);

// free the memory 
mysqli_free_result($results);

// close connection with the DB
mysqli_close($conn);


 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <table class="table table-striped w-75 mx-auto">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Created_at</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user):  ?>
                <tr>
                    <th scope="row">
                        <?php echo htmlspecialchars($user['id']); ?>
                    </th>
                    <td>
                        <?php echo htmlspecialchars($user['email']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($user['created_at']); ?>
                    </td>
                </tr>
            <?php  endforeach; ?>

        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>