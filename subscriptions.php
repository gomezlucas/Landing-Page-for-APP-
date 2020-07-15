<?php

//Conect Database 
include('./db_connect.php');

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
    <!--Favicon-->
    <link rel="shortcut icon" href="./assets/images/mobileLogo.svg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title> RescueCall | Subscriptions</title>
</head>

<body>
    <h1 class="text-center my-5">  Subscription to RescueCall</h1>
    <table class="table table-striped w-75 mx-auto">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Created_at</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) :  ?>
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
            <?php endforeach; ?>

        </tbody>
    </table>
</body>

</html>