<?php

include ("database.php");

if(!isset($_SESSION))
{
    session_start();
}

$tutor_id = 0;
$update_tutor = false;
$tutor_avatar ='profile-user.svg';
$tutor_name = "";
$tutor_subject = "";
$tutor_telegram = "";
$tutor_phone = "";

function resizeImage($resourceType, $image_width,$image_height){
    $resizeWidth = 200;
    $resizeHeight = 200;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer, $resourceType,0,0,0,0, $resizeHeight,$resizeWidth,$image_width,$image_height);
    return $imageLayer;
}

if(isset($_POST['save_tutor'])){
    $tutor_name = $_POST['tutor_name'];
    $tutor_subject = $_POST['tutor_subject'];
    $tutor_telegram = $_POST['tutor_telegram'];
    $tutor_phone = $_POST['tutor_phone'];
    $_SESSION['message_tutor'] = "Record has been saved!";
    $_SESSION['msg_type_tutor'] = "success";
    $file = "tutor_avatar";

    if(is_array($_FILES)) {
        $fileName = $_FILES[$file]['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $_FILES[$file]['name'];
        $uploadPath = "./uploads/";
        $fileExt = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagejpeg($imageLayer, $uploadPath . $resizeFileName);
                break;
        }
        $file = $resizeFileName;
    }

    $tutor_avatar = $file;

//    echo $tutor_avatar;

    $mysqli->query("insert into tutors (tutor_name,tutor_subject,tutor_telegram,tutor_phone,tutor_avatar) 
    values ('$tutor_name','$tutor_subject', '$tutor_telegram','$tutor_phone', '$tutor_avatar')") or
    die($mysqli->error);
    header('location: dashboard.php#tutors');
}

if (isset($_GET['edit_tutor']))
{
    $tutor_id = $_GET['edit_tutor'];

    $result = $mysqli->query("select * from tutors where tutor_id=$tutor_id") or die($mysqli->error);
    $update_tutor = true;
//    if((count($result))==1)
//    {
    $row = $result->fetch_assoc();
    $tutor_name = $row['tutor_name'];
    $tutor_subject = $row['tutor_subject'];
    $tutor_telegram = $row['tutor_telegram'];
    $tutor_phone = $row['tutor_phone'];
    $tutor_id = $row['tutor_id'];
    $tutor_avatar = $row['tutor_avatar'];

//    }
}

if (isset($_POST['update_tutor']))
{
    $tutor_id = $_POST['tutor_id'];
    $tutor_name = $_POST['tutor_name'];
    $tutor_subject = $_POST['tutor_subject'];
    $tutor_telegram = $_POST['tutor_telegram'];
    $tutor_phone = $_POST['tutor_phone'];

    $_SESSION['message_tutor'] = "record has been updated!";
    $_SESSION['msg_type_tutor'] = "warning";

    $file = "tutor_avatar";

    if(is_array($_FILES)) {
        $fileName = $_FILES[$file]['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $_FILES[$file]['name'];
        $uploadPath = "./uploads/";
        $fileExt = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagejpeg($imageLayer, $uploadPath . $resizeFileName);
                break;
        }
        $file = $resizeFileName;
    }
    $tutor_avatar = $file;
    $mysqli->query("update tutors set tutor_name='$tutor_name',  tutor_subject='$tutor_subject', tutor_telegram='$tutor_telegram',
 tutor_phone='tutor_phone',  tutor_avatar='$tutor_avatar' where tutor_id=$tutor_id") or
    die($mysqli->error);
    header('location: dashboard.php#tutors');
}
if (isset($_GET['delete_tutor']))   {
    $tutor_id = $_GET['delete_tutor'];

    $query = $mysqli->query("SELECT * FROM tutors where tutor_id=$tutor_id") or die($mysqli->error);
    $after = mysqli_fetch_assoc($query);
    unlink("./uploads/".$after['tutor_avatar']);

    $mysqli->query("delete from tutors where tutor_id=$tutor_id") or die($mysqli->error);
    $_SESSION['message_tutor'] = "record has been deleted!";
    $_SESSION['msg_type_tutor'] = "danger";
    header('location: dashboard.php#tutors');
}
if (isset($_POSt['clear_tutor'])) {
    $_SESSION['message_tutor'] = "Cleared!";
    $_SESSION['msg_type_tutor'] = "warning";
    header('location: dashboard.php#tutors');
}

?>

