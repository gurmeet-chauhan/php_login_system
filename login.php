<?php

session_start();

if($_POST)    
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = require "connection.php";

    $statement = $connection->prepare("SELECT * from users WHERE email=:email LIMIT 1");
    $statement->execute([':email' => $email]);
    $data = $statement->fetch();
    if ($data) {
        if( password_verify($password, $data['password'])) {
            $_SESSION['user'] = $data;
            header('Location: /registration');
        } else {
            die("Password is wrong");
        }
    } else {
        die("Email is wrong");
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Please Login</title>
</head>

<body>

    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="p-5">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Enter Email">
                <small id="email" class="form-text text-muted">We do not share your email</small>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password">
            </div>

            <button class="btn btn-outline-primary">Log In</button>
            <a href="/registration/signup.php" class="btn btn-primary">Sign Up</a>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>