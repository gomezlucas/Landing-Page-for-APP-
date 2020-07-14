<?php


//Conect Database 
include('./config/db_connect.php');


$errors = array('email' => '');
$email = '';
$ok =  '';

if (isset($_POST['submit'])) {
    //check that the input is not empty 
    if (empty($_POST['email'])) {
        $errors['email'] = "the field can not be empty";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Please provide a valid email.";
        } else {
            $errors['email'] = '';
            //Create query
            $sql = "INSERT INTO subscriptions (email) VALUES ('$email')";
            // Save to DB 
            if (!mysqli_query($conn, $sql)) {
                echo "Query error:" .  mysqli_error($conn);
            } else {
                $ok = "Your email has been saved succesfully";
             }
        }
    }
}


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

    <form action="form.php" method="POST">
        <div class="row p-5 ">
            <div class="col-6 mx-auto">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control  
                    <?php
                    if ($errors['email']) {
                        echo "is-invalid";
                    } elseif ($ok) {
                        echo "is-valid";
                    }
                    ?>" id="email" name="email" aria-describedby="emailHelp" value="<?php echo htmlspecialchars($email); ?>">
                    <div class="invalid-feedback"> <?php echo $errors['email'];  ?>
                    </div>
                    <div class="valid-feedback"> <?php echo $ok;  ?>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary"> Submit</button>
    </form>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>