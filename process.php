<?php


include ("database.php");
if(!isset($_SESSION))
{
    session_start();
}


$name = '';
$id = 0;
$description = '';
$weekly = 0;
$hours = 0;
$fee = '';
$update = false;

if(isset($_POST['save'])){

    $name = $_POST['name'];
    $description = $_POST['description'];
    $weekly = $_POST['weekly'];
    $hours = $_POST['hours'];
    $fee = $_POST['fee'];

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    $mysqli->query("insert into fanlar (sub_name,izoh, weekly, hours,fee ) values ('$name','$description', '$weekly','$hours','$fee')") or
    die($mysqli->error);

    header('location: dashboard.php');

}



if (isset($_GET['delete']))   {
    $id = $_GET['delete'];
    $mysqli->query("delete from fanlar where id=$id") or die($mysqli->error);
    $_SESSION['message'] = "record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header('location: dashboard.php#course');
}


if (isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $result = $mysqli->query("select * from fanlar where id=$id") or die($mysqli->error);
    $update = true;
//    if((count($result))==1)
//    {
        $row = $result->fetch_assoc();
        $name = $row['sub_name'];
        $description = $row['izoh'];
        $weekly = $row['weekly'];
        $hours = $row['hours'];
        $fee = $row['fee'];
        $id = $row['id'];
//    }
}

if (isset($_POST['update_course']))
{
//    echo "djfsdpifsdjs";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $weekly = $_POST['weekly'];
    $hours = $_POST['hours'];
    $fee = $_POST['fee'];

    $_SESSION['message'] = "record has been updated!";
    $_SESSION['msg_type'] = "success";
    echo $id;
    $mysqli->query("update fanlar set sub_name='$name',  izoh='$description', weekly='$weekly', hours='$hours',fee='$fee' where id=$id") or
    die($mysqli->error);

    header('location: dashboard.php');

}
if (isset($_POSt['clear'])) {

    header('location: dashboard.php');
}





?>