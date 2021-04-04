<?php

include ('security.php');

include ('database.php');

if (isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

//    $query = "select * from users where username='$username' and password='$password'";
    $query = $mysqli->query("select * from users where username='$username' and password='$password'") or die($mysqli->error);

    echo 'successful';


    if (mysqli_fetch_array($query))
    {
        echo 'successful';
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
}
    else{
        $_SESSION['status'] = "Usernam or password is invalid";
        header('Location: login.php');
    }
}


