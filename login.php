<?php
//session_start();

//include ('code.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/login.css">

</head>
<body>

<div class="container pt-5">

    <div class="row justify-content-center mt-5">
            <div class="col-4 mt-5">
                <div class="card">
                    <form action="code.php" method="post">
                        <div class="card-header text-center text-secondary">
                            <h1>Login</h1>
                        </div>
                        <div class="card-body">
                            <input type="text" name="username" class="rounded-pill input-group-append login w-100" placeholder="username">
                            <input type="text" name="password" class="rounded-pill input-group-append login w-100" placeholder="password">
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="login" value="Kirish" class="btn btn-info rounded-pill">
                        </div>
                    </form>

                </div>
            </div>

    </div>

</div>

</body>
</html>
